<?php

require_once 'models/post.php';

class postController {

    public function index(){
        return $posts = post::all();
    }
}