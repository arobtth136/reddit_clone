<?php

require_once 'helpers/Model.php';

class post extends Model {

    protected static function getTable()
    {
        return 'posts';
    }

    protected static function fields(): array
    {
        return ['id','fechaPost','imagenes','texto','usuario','comunidad','likes'];
    }
}