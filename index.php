<?php
$connection = new PDO('mysql:host=localhost; dbname=teatr; charset=UTF8', 'root', 'root');

$checkPlace = $connection->query("SELECT * FROM place WHERE idx = '0'");
if ($_POST['name']) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $place = $_POST['place'];
    var_dump($_POST);
    $connection->query("INSERT INTO name (name, surname) VALUES ('$name', '$surname')");
    $connection->query("UPDATE place SET idx = '1' WHERE place = '$place' ");
}

?>
<form method="post">
    <input type="text" name="name" required><br>
    <input type="text" name="surname" required><br>
    <select name="place" id="place">
            <?foreach ($checkPlace as $place):?>
            <option value="<?=$place['place']?>"><?=$place['place']?></option>
            <?endforeach;?>
    </select>
    <input type="submit">
</form>
