<?php
include_once ('core/arr.php');
include_once ('model/user.php');

$checkPlace = select();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $person = extractFields($_POST, ['name', 'surname']);
    $validate = validate($person);
    if (empty($validate)) {
        insert($person);
        $placeOld = extractFields($_POST, ['place']);
        update($placeOld['place']);
        header('Location:index.php');
    }

}

else {
    $validate = [];
    $person = ['name' => '', 'surname' => ''];
}

include('views/v_index.php');

