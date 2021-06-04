<?php
require_once 'config/connection.php';

class user
{
    protected $id;
    private $connection = null;

    public function __construct(){
        $this->connection = connection::connect();
    }

    public function login($username, $password){
        $login = $this->connection->query("select * from usuarios where nombreUsuario = '{$this->connection->real_escape_string($username)}'");
        if($row = $login->fetch_assoc()){
            if(password_verify($password, $row['password'])){
                $_SESSION['user'] = $row;
                return json_encode(array('code' => 200, 'message' => $row));
            } else {
                return json_encode(array('code' => 500, 'message' => 'Contraseña incorrecta'));
            }
        }
        return json_encode(array('code' => 500, 'message' => 'Este usuario no existe'));
    }
}