<?php
require_once 'config/connection.php';

class user
{
    protected $id;
    private $connection = null;

    public function __construct(){
        $this->connection = connection::connect();
    }

    public function login($username, $password, $remember_me){
        $login = $this->connection->query("select * from usuarios where nombreUsuario = '{$this->connection->real_escape_string($username)}'");
        if($row = $login->fetch_assoc()){
            if(password_verify($password, $row['password'])){
                if($remember_me){
                    $query = $this->connection->prepare('update usuarios set remember_token = ? where id = ?');
                    $token = md5(microtime());
                    $query->bind_param('si', $token,$row['id']);
                    $query->execute();
                    $row['remember_token'] = $token;
                }
                $_SESSION['user'] = $row;
                return json_encode(array('code' => 200, 'message' => $row));
            } else {
                return json_encode(array('code' => 500, 'message' => 'Contraseña incorrecta'));
            }
        }
        return json_encode(array('code' => 500, 'message' => 'Este usuario no existe'));
    }

    public function user_activity_posts($user_id){
        if($query = $this->connection->query("call actividad_posts_usuario($user_id)")){
            $data = [];
            while ($row = $query->fetch_assoc()){
                $data[] = $row;
            }
            return json_encode($data);
        }
    }

    public function like_post($post_id, $user_id){
        $query = $this->connection->prepare('insert into user_like_post(post_id, user_id) values (?,?)');
        $query->bind_param('ii', $post_id, $user_id);
        if($query->execute()){
            return json_encode(array('status' => 200, 'message' => 'Te ha gustado este post 😁'));
        }
    }

    public function dislike_post($post_id, $user_id){
        $query = $this->connection->prepare('insert into user_dislike_post(post_id, user_id) values (?,?)');
        $query->bind_param('ii', $post_id, $user_id);
        if($query->execute()){
            return json_encode(array('status' => 200, 'message' => 'Te ha disgustado este post 😞'));
        }
    }

    public function delete_activity_post($post_id, $user_id, $table){
        $query = $this->connection->prepare('delete from ? where post_id = ? and user_id = ?');
        $query->bind_param('sii', $table, $post_id, $user_id);
        if(!$query->execute()){
            return json_encode(array('status' => 200, 'message' => 'Ha ocurrido un error 😞'));
        }
    }
}