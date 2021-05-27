<?php

require_once 'models/post.php';

class postController {

    public function index(){
        //TODO Cambiar el ID usuario por $_SESSION['user']->id :)
        return $posts = (new post)->where('usuario',1);
    }
}