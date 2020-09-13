<?php
include_once 'Database.php';

class UserTask extends Database{

    public function addUserTask($user_id,$task_id,$details,$start_dt,$created_at){
        $st = $this->db->prepare("INSERT INTO user_task(user_id,task_id,details,start_dt,created_at) VALUES (:user_id,:task_id,:details,:start_dt,:created_at)");
        $st->bindParam(':user_id',$user_id);
        $st->bindParam(':task_id',$task_id);
        $st->bindParam(':details',$details);
        $st->bindParam(':start_dt',$start_dt);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return true;
    }
    public function getTaskUserById($id){
        $st = $this->db->prepare("SELECT * FROM user_task WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getTaskUserByUserId($user_id){
        $st = $this->db->prepare("SELECT * FROM user_task WHERE user_id=:user_id");
        $st->bindParam(':user_id',$user_id);
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getSortedTaskUserByUserId($user_id){
        $st = $this->db->prepare("SELECT * FROM user_task WHERE user_id=:user_id ORDER BY start_dt DESC");
        $st->bindParam(':user_id',$user_id);
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function updateUserTask($start_dt,$updated_at,$id){
        $st = $this->db->prepare("UPDATE user_task SET start_dt=:start_dt, updated_at=:updated_at WHERE id=:id");
        $st->bindParam(':start_dt',$start_dt);
        $st->bindParam(':updated_at',$updated_at);
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function getTasks(){
        $st = $this->db->prepare('SELECT * FROM task');
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteUserTask($id){
        $st = $this->db->prepare('DELETE FROM user_task WHERE id=:id');
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }

}
