<?php

class connection {
    public static function connect()
    {
        return mysqli_connect('localhost', 'root', 'root', 'reddit_clone','8889');
    }
}