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

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand mr-auto mr-lg-0" href="<?=base_path()?>" >Home</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_path()?> "> Add <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>
</nav>
<br><br><br>

<main role="main" class="container">
    <form action="<?= base_path() ?>/add.php" method="POST" enctype="multipart/form-data" class="col-md-4">
        <div class="form-group">
            <label for="model"> Model </label>
            <input type="text" class="form-control"  name="model" >
            <label for="model"> Color </label>
            <input class="form-control" type="text" name="color">
            <label for="model"> Weight </label> <br>
            <input class="form-control" type="text" name="weight">
            <label for="model"> Price </label> <br>
            <input class="form-control" type="text" name="price">
            <label for="model"> Image </label> <br>
            <input class="form-control" type="file" name="image" id="image"> <br>
            <button name="send" type="submit" class="btn btn-success"> Add </button>
    </form>

</main>
</body>
</html>