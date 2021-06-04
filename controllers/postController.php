<?php

require_once 'models/post.php';

class postController {

    use Gates;

    public function index(){
        //TODO Cambiar el ID usuario por $_SESSION['user']->id :)
        return $posts = (new post)->where('usuario',1);
    }

    public function edit(){
        if($this->user_signed_in() || $this->can_edit_post()){

        }
    }

    public function create(){
        (new post)->create(['usuario' => 1,
            'comunidad' => 1,
            'likes' => 0]);
        echo "hola";
    }
}