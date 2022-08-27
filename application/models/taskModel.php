<?php

class taskModel extends database{
    public function checkTask($taskName){
        if($this->Query("SELECT taskName FROM tasks WHERE taskName = ?", [$taskName])){
            if($this->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }

    public function getData($userId){
        if($this->Query("SELECT * FROM tasks WHERE author = ? ",[$userId])){
            $data = $this->fetchAll();
            return $data;
        }

    }

    public function addTask($data){
        if($this->Query("INSERT INTO tasks (taskName,taskDesc,author) VALUES (?,?,?)" , $data)){
            return true;
        }
    }

    public function getTask($id){
        if($this->Query("SELECT * FROM tasks WHERE id = ? ",[$id])){
            $row = $this->fetch();
            return $row;
        }

    }
    public function getUser($id){
        if($this->Query("SELECT * FROM users WHERE id = ? ",[$id])){
            $row = $this->fetch();
            return $row;
        }

    }
    
    public function editTask($id, $userId){

        if($this->Query("SELECT * FROM tasks WHERE id = ? && author = ? ", [$id, $userId])){
            $row = $this->fetch();
            return [
                'taskName' => $row->taskName,
                'taskDesc' => $row->taskDesc,
                'hiddenId' =>$row->id
            ];
        }

    }

    public function updateTask($updatedTask){

        if($this->Query("UPDATE tasks SET taskName = ? , taskDesc = ? WHERE id = ? AND author = ? ", $updatedTask)){
            return true;
        }

    }


    
    public function deleteTask($id){

        if($this->Query("DELETE FROM tasks WHERE id = ? ", [$id])){
            return true;
        }

    }

}


?>