<?php
class Database{
    public $db;
    public function __construct()
    {
        $con=new PDO("mysql:host=localhost;dbname=bujobud","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!isset($this->db)){
            $this->db = $con;
        }
    }
    public function filter($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function imageUpload($dir,$imageArr){
        $target_dir = $dir."/"; // uploads/
        $target_file = $target_dir . basename($imageArr["name"]);
        //initially permission is 1
        $uploadOk = 1;
        $message = '';
        if(!getimagesize($imageArr["tmp_name"])){
            $uploadOk = 0;
            $message .= 'File is not an image';
        }
        //check file size
        if ($imageArr["size"] > 500000) {
            $message .= "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        //accepted file type
        $accepted_file_type = array('jpg','jpeg','png','gif');
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(!in_array($imageFileType,$accepted_file_type)){
            $uploadOk = 0;
            $message .= 'This type of file is not accepted';
        }
        //if uploadOk 1 then proceed else show error
        if($uploadOk == 1){
            move_uploaded_file($imageArr['tmp_name'], $target_file);
            return array('result' => true, 'data' => $target_file);
        }else{
            return array('result' => false, 'data' => $message);
        }
    }
    public function getLogs(){
        $st = $this->db->prepare('SELECT * FROM log ORDER BY created_at DESC');
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getLogsByUserId($user_id){
        $st = $this->db->prepare('SELECT * FROM log WHERE user_id=:user_id ORDER BY created_at DESC');
        $st->bindParam(':user_id',$user_id);
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getLogById($id){
        $st = $this->db->prepare('SELECT * FROM log WHERE id=:id');
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteLog($id){
        $st = $this->db->prepare('DELETE FROM log WHERE id=:id');
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function addLog($details,$user_id,$created_at){
        $st = $this->db->prepare("INSERT INTO log(details,user_id,created_at) VALUES (:details,:user_id,:created_at)");
        $st->bindParam(':details',$details);
        $st->bindParam(':user_id',$user_id);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return true;
    }
}