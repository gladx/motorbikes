<?php
/**
 * Created by PhpStorm.
 * User: FARZAN19
 * Date: 2018/10/07
 * Time: 09:48 AM
 */

require 'init.php';

use Glad\Motor\Motorbikes;

if(isset($_GET['id'])){
    $model = new Motorbikes();
    $motor = $model->getOne($_GET['id']);
//    var_dump($motor);
} else {
    die('Please send id');
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
<h2> <?= $motor['model'] ?> </h2>

<ul>
    <li> Model : <?= $motor['model'] ?> </li>
    <li>Color : <?= $motor['color'] ?> </li>
    <li>Price : <?= $motor['price'] ?> </li>
    <li>Weight <?= $motor['weight'] ?> </li>
    <img src="<?= base_path() . '/images/' . $motor['image'] ?>" alt="Image">
</ul>

</main>
</body>
</html>