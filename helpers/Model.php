<?php

abstract class Model {

    public $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public static function all(){
        echo "tabla " . static::getTable();
    }

    protected abstract static function getTable();
}