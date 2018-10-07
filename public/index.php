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
$page = 0;
$sort = 'id';
if(isset($_GET['page'])){
    $page =$_GET['page'];
}

if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}
try {
    $motors = $m->all($page, $sort);
} catch (\PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
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
<h2> Add new </h2>
<a  class="btn btn-success" role="button" href="<?= base_path() ?>/add.php"> Add </a> <br>
<h3> Sorts </h3>

<a class="btn btn-primary" role="button" href="<?= base_path() ?>/index.php?sort=price"> Sort By Price </a>
<a class="btn btn-primary" role="button" href="<?= base_path() ?>/index.php?sort=created_at"> Sort By Date </a>  <br>


<h3> Filter </h3>
// TODO


<h3> Lists </h3>
<ul>
    <?php foreach($motors as $motor) : ?>
   <li> <strong> <?= $motor['model'] ?> </strong> </li>
    <a class="btn btn-warning" role="button" href="<?= base_path() ?>/view.php?id=<?= $motor['id'] ?>"> View </a>

<?php endforeach; ?>
</ul>

<p>
    <?php
    $pages = floor(($m->count() / 5));
    for($i = 0; $i <= $pages ; $i++) : ?>
    <?php if($i == 0) : ?>
        <a class="btn btn-primary" role="button" href="<?= base_path() ?>/index.php?page=<?= $i ?>&sort=<?= $sort ?>"> Index </a>
    <?php else :?>
        &nbsp;<a class="btn btn-primary" role="button" href="<?= base_path() ?>/index.php?page=<?= $i ?>&sort=<?= $sort ?>"> <?= $i ?> </a>
    <?php endif; ?>
    <?php endfor; ?>
</p>

</main>
</body>
</html>