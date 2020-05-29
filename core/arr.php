<?php

function extractFields ($target, $fields) {
    $arr = [];
    foreach ($fields as $field) {
        $arr[$field] = trim($target[$field]);
    }

    return $arr;
}