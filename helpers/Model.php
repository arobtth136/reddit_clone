<?php
require_once 'config/connection.php';

abstract class Model extends connection {

    protected string $query = "";

    protected mysqli|null $connection;

    protected string $table;

    public function __construct(){
        $this->connection = $connection = connection::connect();
        $this->table = static::getTable();
    }

    public function create(array $data){
        if(is_array($data)){
            $keys = array_keys($data);
            $params = ""; $values = "";
            foreach($keys as $key){
                $params .= "$key,";
                $values .= "$data[$key],";
            }
            $this->query = "insert into {$this->table} ($params) values ($values)";
            if($this->connection->query($this->query)){

            }
        }
    }

    public function all(){
        if($query = $this->connection->query("select * from {$this->table}")){
            $data = [];
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function where($column, $value, $operator = '='){
        if(empty($this->query)){
            $this->query .= "select * from {$this->table} where {$column} {$operator} {$value}";
            return $this->get();
        } else {
            $this->query .= "where {$column} {$operator} {$value}";
            return $this;
        }
    }

    public function get($params = null){
        if(is_null($params)){
            if($result = $this->connection->query($this->query)){
                $data = [];
                while($row = $result->fetch_array()){
                    var_dump($row);
                }
            } else {
                return 'error';
            }
        } elseif(is_array($params)) {
            echo '<h1>sexo</h1>';
        }
    }

    public function update(array $array){
        if (empty($this->query)){
            $this->query .= "update {$this->table} set";
                $i = 0;
                foreach ($array as $variable => $valor){
                    if ($i == 0){
                        $this->query .= " {$variable} = {$valor}";
                    } elseif($i >= 1) {
                        $this->query .= " ,{$variable} = {$valor}";
                    }
                    $i++;
                }
            return $this;
        }
    }

    public function delete(){
        if (empty($this->query)){
            $this->query .= "update {$this->table} set deleted_at = current_timestamp()";
            return $this;
        }
    }



    public static function select(){
        $connection = connection::connect();
    }

    protected abstract static function getTable();

    protected abstract static function fields();


}