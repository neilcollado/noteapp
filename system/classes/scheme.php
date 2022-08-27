<?php

error_reporting(0);

class scheme{

    public function view($viewName , $data = []){
        if(file_exists("../application/views/" . $viewName . ".php")){
            
            require_once "../application/views/$viewName.php";

        }else{
            echo "<div style='margin:0;padding: 10px;background-color:silver;'>Sorry $viewName.php not found</div>"; 
        }
    }

    public function model($modelName){
        if(file_exists("../application/models/" . $modelName . ".php")){
            
            require_once "../application/models/$modelName.php";
            // instantiate the model
            return new $modelName;

        }else{
            echo "<div style='margin:0;padding: 10px;background-color:silver;'>Sorry $modelName is not found</div>"; 
        }
    }

    public function input($inputName){

        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){

            return trim(strip_tags($_POST[$inputName]));

        } else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get"){

            return trim(strip_tags($_GET[$inputName]));
            
        } 

    }

   
    //set session
    public function setSession($sessionName , $sessionValue){
        if(!empty($sessionName) && (!empty($sessionValue))){
            $_SESSION[$sessionName] = $sessionValue;
        }
    }
    //get session
    public function getSession($sessionName){
        if(!empty($sessionName)){
            return $_SESSION[$sessionName];
        }
    }
     // Unset session
    public function unsetSession($sessionName){
        if(!empty($sessionName)){
        unset($_SESSION[$sessionName]);
        }
    }
    // Destroy whole sessions
    public function destroy(){
        session_destroy();
    }
    // Set flash message
    public function setFlash($sessionName, $msg){

        if(!empty($sessionName) && !empty($msg)){

        $_SESSION[$sessionName] = $msg;

        }

    }

 //Show flash message
    public function flash($sessionName, $className){

        if(!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])){
        
        $msg = $_SESSION[$sessionName];
        
        echo "<div class='". $className ."'>".$msg."</div>";
        unset($_SESSION[$sessionName]);

        }
    }

    public function redirect($path){

        header("location:" . BASEURL . "/".$path);
     
        }

 }




?>