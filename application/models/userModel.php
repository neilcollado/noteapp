<?php

class userModel extends database{

    public function checkEmail($email){
        if($this->Query("SELECT email FROM users WHERE email = ?", [$email])){
            if($this->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }

    public function createUser($data){
        if($this->Query("INSERT INTO users (firstName,lastName,email,password) VALUES (?,?,?,?)" , $data)){
            return true;
        }else{
            return false;
        }
    }

    public function userLogin($email,$password){
        if($this->Query("SELECT * FROM users WHERE email = ?", [$email])){
            if($this->rowCount() > 0){
                $row = $this->fetch();
                $dbpassword = $row->password;
                $userId = $row->id;
                if(password_verify($password, $dbpassword)){
                    return [
                        'status' => 'ok',
                        'data' => $userId
                    ];
                }else{
                    return [
                        'status' => 'passwordNotMatched!'
                    ];
                }
            }else{
                return [
                    'status' => 'emailNotFound!'
                ];
            }
        }
    }

   
}

?>