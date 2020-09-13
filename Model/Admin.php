<?php
include_once 'Database.php';

class Admin extends Database{

    public function isExistAdminWithEmail($email){
        $st = $this->db->prepare("SELECT * FROM admin WHERE email=:email");
        $st->bindParam(':email',$email);
        $st->execute();
        if($st->rowCount()){
            return true;
        }
        return false;
    }
    public function addAdmin($email,$password,$created_at){
        $st = $this->db->prepare("INSERT INTO admin(email,password,created_at) VALUES (:email,:password,:created_at)");
        $st->bindParam(':email',$email);
        $st->bindParam(':password',$password);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return $this->db->lastInsertId();
    }
    public function getAdminById($id){
        $st = $this->db->prepare("SELECT * FROM admin WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getAdminByEmail($email){
        $st = $this->db->prepare("SELECT * FROM admin WHERE email=:email");
        $st->bindParam(':email',$email);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function updatePassword($password,$updated_at,$id){
        $st = $this->db->prepare("UPDATE admin SET password=:password, updated_at=:updated_at WHERE id=:id");
        $st->bindParam('password',$password);
        $st->bindParam('updated_at',$updated_at);
        $st->bindParam('id',$id);
        $st->execute();
        return true;
    }

}
