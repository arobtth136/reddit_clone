<?php
class dbConnect {
    public function connect()
    {
        $connection = mysqli_connect('localhost', 'root', '', 'reddit_clone');
        return $connection;
    }
}