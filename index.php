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

?>
<form method="post">
    <div>
        <?foreach ($validate as $value):?>
            <p><?=$value?></p>
        <?endforeach;?>
    </div>
    <input type="text" name="name" value="<?=$person['name']?>" required><br>
    <input type="text" name="surname" value="<?=$person['surname']?>" required><br>
    <select name="place" id="place">
            <?foreach ($checkPlace as $place):?>
            <option value="<?=$place['place']?>"><?=$place['place']?></option>
            <?endforeach;?>
    </select>
    <input type="submit">
</form>
