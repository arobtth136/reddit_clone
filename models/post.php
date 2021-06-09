<?php

require_once 'config/connection.php';

class post {

    protected $id,$usuario;
    protected mysqli|null $connection;

    public function __construct(){
        $this->connection = connection::connect();
    }

    protected static function getTable()
    {
        return 'posts';
    }

    protected static function fields(): array
    {
        return ['id','fechaPost','imagenes','texto','usuario','comunidad','likes'];
    }

    public function posts(){
        if($query = $this->connection->query("select * from vista_posts")){
            $data = [];
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
            return json_encode($data);
        }
    }
}