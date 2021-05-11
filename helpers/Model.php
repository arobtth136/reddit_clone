<?php

abstract class Model {

    public static function all(){
        echo "tabla " . static::getTable();
    }

    protected abstract static function getTable();
}