<?php
include_once 'Database.php';

class User extends Database{

    public function isExistUserWithEmail($email){
        $st = $this->db->prepare("SELECT * FROM user WHERE email=:email");
        $st->bindParam(':email',$email);
        $st->execute();
        if($st->rowCount()){
            return true;
        }
        return false;
    }
    public function addUser($fullname,$email,$password,$image,$token,$created_at){
        $st = $this->db->prepare("INSERT INTO user(fullname,email,password,image,token,created_at) VALUES (:fullname,:email,:password,:image,:token,:created_at)");
        $st->bindParam(':fullname',$fullname);
        $st->bindParam(':email',$email);
        $st->bindParam(':password',$password);
        $st->bindParam(':image',$image);
        $st->bindParam(':token',$token);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return $this->db->lastInsertId();
    }
    public function getUserById($id){
        $st = $this->db->prepare("SELECT * FROM user WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getUserProfileCompletion($id){
        $st = $this->db->prepare("SELECT fullname,email,phone,image,profession,dob,sex,bio FROM user WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        $count = 0;
        foreach ($resultSet as $result){
            if(is_null($result) || $result == ''){
                $count++;
            }
        }
        $final = 8-$count;
        $final = $final/8 * 100;
        $final = number_format((float)$final, 2, '.', '');
        return $final.'%';
    }
    public function getUserByEmail($email){
        $st = $this->db->prepare("SELECT * FROM user WHERE email=:email");
        $st->bindParam(':email',$email);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function updateUser($fullname,$phone,$profession,$dob,$sex,$bio,$updated_at,$id){
        $st = $this->db->prepare("UPDATE user SET fullname=:fullname, phone=:phone, profession=:profession, dob=:dob, sex=:sex, bio=:bio, updated_at=:updated_at WHERE id=:id");
        $st->bindParam(':fullname',$fullname);
        $st->bindParam(':phone',$phone);
        $st->bindParam(':profession',$profession);
        $st->bindParam(':dob',$dob);
        $st->bindParam(':sex',$sex);
        $st->bindParam(':bio',$bio);
        $st->bindParam(':updated_at',$updated_at);
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function getUsers(){
        $st = $this->db->prepare('SELECT * FROM user');
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteUser($id){
        $st = $this->db->prepare('DELETE FROM user WHERE id=:id');
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function updatePassword($password,$updated_at,$id){
        $st = $this->db->prepare("UPDATE user SET password=:password, updated_at=:updated_at WHERE id=:id");
        $st->bindParam('password',$password);
        $st->bindParam('updated_at',$updated_at);
        $st->bindParam('id',$id);
        $st->execute();
        return true;
    }
    public function setUserVerify($updated_at,$id){
        $st = $this->db->prepare("UPDATE user SET is_active=1, updated_at=:updated_at WHERE id=:id");
        $st->bindParam('updated_at',$updated_at);
        $st->bindParam('id',$id);
        $st->execute();
        return true;
    }

}