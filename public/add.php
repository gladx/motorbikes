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
    // use  https://www.w3schools.com/Php/php_file_upload.asp
    $target_dir = realpath('.') . "/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (! move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }


    $motor_array = [
        'model' => $_POST['model'],
        'color' => $_POST['color'],
        'weight' => $_POST['weight'],
        'price' => $_POST['price'],
        'image' => $_FILES["image"]["name"],
    ];
    $motor = new Motorbikes();
    $motor->insert($motor_array);
    header('Location: ' . base_path());
}

?>

<form action="<?= base_path() ?>/add.php" method="POST" enctype="multipart/form-data">
    <label for="model"> Model </label>
    <input type="text" name="model"> <br>
    <label for="model"> Color </label>
    <input type="text" name="color">
    <label for="model"> Weight </label> <br>
    <input type="text" name="weight">
    <label for="model"> Price </label> <br>
    <input type="text" name="price">
    <label for="model"> Image </label> <br>
    <input type="file" name="image" id="image">
    <button name="send" type="submit"> Add </button>

</form>
