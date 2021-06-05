<?php
require_once 'helpers/Model.php';

class community extends Model
{

    protected static function getTable()
    {
        return 'comunidades';
    }

    protected static function fields()
    {
        return [''];
    }
}