<?php
require_once 'models/community.php';

class communityController
{

    public function index(){
        echo json_encode((new community())->all());
    }

}