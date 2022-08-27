<?php

class database {
    public $host        = HOST;
    public $user        = USER;
    public $database    = DATABASE;
    public $password    = PASSWORD;
    public $con;
    public $result;

    public function __construct(){

        try{

            return $this->con = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->database,$this->user,$this->password);

        }catch(PDOException $e){
            
            echo "Database connection error: " . $e->getMessage();
        }

    }

    //QUERY FROM note_app
    public function Query($sql , $params = []){
        
        if(empty($params)){

            $this->result = $this->con->prepare($sql);
            return $this->result->execute();

        }else{

            $this->result = $this->con->prepare($sql);
            return $this->result->execute($params);
        }

    }

    //returns number of rows
    public function rowCount(){

        return $this->result->rowCount();

    }

    public function fetchAll(){

        return $this->result->fetchAll(PDO::FETCH_OBJ);


    }

    public function fetch(){
        
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

}

?>