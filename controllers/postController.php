<?php

require_once 'models/post.php';
require_once 'models/user.php';

class postController {

    public function index(){
        echo (new user())->user_activity_posts(1);
    }

    public function edit(){

    }

    public function create(){

    }
}