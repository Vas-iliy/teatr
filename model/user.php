<?php
include_once ('core/bd.php');

function select () {

    $sql = "SELECT * FROM place WHERE idx = '0'";
    $data = dbQuery($sql, null);
    $data = $data->fetchAll();

    return $data;
}

function insert ($params) {
    $sql = "INSERT INTO name (name, surname) VALUES (:name, :surname)";
    $data = dbQuery($sql, $params);

    return true;
}

function update ($place) {
    $sql = "UPDATE place SET idx = '1' WHERE place = '$place' ";
    $data = dbQuery($sql, null);

    return true;
}

function validate ($place) {
    $errors =[];
    if (mb_strlen($place['name'], 'UTF-8') < 2) {
        $errors[] = 'Имя не короче 2 символов';
    }

    if (mb_strlen($place['surname'], 'UTF-8') < 2) {
        $errors[] = 'Фамилия не короче 2 символов';
    }

    $place['name'] = htmlspecialchars($place['name']);
    $place['surname'] = htmlspecialchars($place['surname']);

    return $errors;
}