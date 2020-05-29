
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