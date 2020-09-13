<?php
include_once 'Database.php';

class Task extends Database{

    public function isExistTask($task){
        $st = $this->db->prepare("SELECT * FROM task WHERE task=:task");
        $st->bindParam(':task',$task);
        $st->execute();
        if($st->rowCount()){
            return true;
        }
        return false;
    }
    public function addTask($task,$details,$created_at){
        $st = $this->db->prepare("INSERT INTO task(task,details,created_at) VALUES (:task,:details,:created_at)");
        $st->bindParam(':task',$task);
        $st->bindParam(':details',$details);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return true;
    }
    public function editTask($task,$details,$updated_at,$id){
        $st = $this->db->prepare("UPDATE task SET task=:task, details=:details, updated_at=:updated_at WHERE id=:id");
        $st->bindParam(':task',$task);
        $st->bindParam(':details',$details);
        $st->bindParam(':updated_at',$updated_at);
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function getTaskById($id){
        $st = $this->db->prepare("SELECT * FROM task WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getTasks(){
        $st = $this->db->prepare('SELECT * FROM task');
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteTask($id){
        $st = $this->db->prepare('DELETE FROM task WHERE id=:id');
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }

}
