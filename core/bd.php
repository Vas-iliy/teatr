<?php

function dbConnection () {

    static $connection;
    if ($connection === null) {
        $connection = new PDO('mysql:host=localhost; dbname=teatr; charset=UTF8', 'root', 'root',
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    return $connection;
}

function dbQuery ($sql, $params) {
    $connect = dbConnection();
    $data = $connect->prepare($sql);
    $data ->execute($params);

    return $data;
}

