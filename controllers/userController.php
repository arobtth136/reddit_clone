<?php
require_once 'models/user.php';

class userController
{
    public function login(){
        if(isset($_POST)){
            $user = new user();
            echo $user->login($_POST['usuario'],$_POST['password']);
        }
    }
}