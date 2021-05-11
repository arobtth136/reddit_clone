<?php

require_once 'helpers/Model.php';

class post extends Model {
    protected static string $table = 'posts';

    protected static function getTable()
    {
        return static::$table;
    }
}