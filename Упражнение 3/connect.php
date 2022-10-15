<?php
    
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = '442_shagin_shop';

    $connect = mysqli_connect($host, $user, $password, $database);

    if (!$connect) {
        die('Error connect to DataBase');
    }
