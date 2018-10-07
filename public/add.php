<?php
/**
 * Created by PhpStorm.
 * User: FARZAN19
 * Date: 2018/10/07
 * Time: 09:48 AM
 */

require 'init.php';

use Glad\Motor\Motorbikes;

$m = new Motorbikes();
$motors = $m->all();

if(isset($_POST['send'])){
    $motor_array = [
        'model' => $_POST['model'],
        'color' => $_POST['color'],
        'weight' => $_POST['weight'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ];
    $motor = new Motorbikes();
    $motor->insert($motor_array);
    header('Location: ' . base_path());
}

?>

<form action="<?= base_path() ?>/add.php" method="POST">
    <label for="model"> Model </label>
    <input type="text" name="model"> <br>
    <label for="model"> Color </label>
    <input type="text" name="color">
    <label for="model"> Weight </label> <br>
    <input type="text" name="weight">
    <label for="model"> Price </label> <br>
    <input type="text" name="price">
    <label for="model"> Image </label> <br>
    <input type="text" name="image">
    <button name="send" type="submit"> Add </button>

</form>
