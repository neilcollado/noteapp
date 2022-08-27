<?php

class userController extends scheme {

    public function __construct(){
        if($this->getSession('userId')){
            $this->redirect("taskController");
        }

        $this->userModel = $this->model('userModel');
    }

    public function index(){
        $this->view("signup");
    }

    public function loginForm(){
        $this->view("login");
    }

    public function createUser(){

        $userData = [
            'firstName' => $this->input('firstName'),
            'lastName'  => $this->input('lastName'),
            'email'     => $this->input('email'),
            'password'  => $this->input('password'),
            'emailError' => '',
            'passwordError' => ''
        ];

        if($this->userModel->checkEmail($userData['email'])){

            $userData['emailError'] = "Sorry this email already exist.";
            $this->setFlash("emailError", $userData['emailError']);

        }if(strlen($userData['password']) < 5){

            $userData['passwordError'] = "Password must be 5 characters long";
            $this->setFlash("passwordError", $userData['passwordError']);

        }if(empty($userData['emailError']) && empty($userData['passwordError'])){

            $password = password_hash($userData['password'], PASSWORD_DEFAULT);
            $user = [$userData['firstName'], $userData['lastName'], $userData['email'], $password];
            if($this->userModel->createUser($user)){

                $this->setFlash("accountCreated", "Your account has been created successfully.");
                $this->redirect("userController/loginForm");
            }

        }else{

            $this->view("signup",$userData);

        }

    }

    public function userLogin(){
        $userData = [
            'email'     => $this->input('email'),
            'password'  => $this->input('password')
        ];
        
        $result = $this->userModel->userLogin($userData['email'],$userData['password']);
        if($result['status'] === "ok"){
            $this->setSession("userId", $result['data']);
            $this->redirect("task");
        }else if($result['status'] === "passwordNotMatched!"){
            $userData['passwordError'] = "Sorry invalid password";
            $this->setFlash("passwordError", $userData['passwordError']);
            $this->view("login", $userData);
        }else if($result['status'] == "emailNotFound!"){
            $userData['emailError'] = "Sorry invalid email";
            $this->setFlash("emailError", $userData['emailError']);
            $this->view("login", $userData);
        }
    }

    
}

?>