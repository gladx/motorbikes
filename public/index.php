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

<a href="<?= base_path() ?>/add.php"> Add </a> <br>
<a href="<?= base_path() ?>/index.php?sort=price"> Sort By Price </a>  <br>
<a href="<?= base_path() ?>/index.php?sort=created_at"> Sort By Date </a>  <br>

<ul>
    <?php foreach($motors as $motor) : ?>
   <li> <?= $motor['model'] ?> </li>
    <a href="<?= base_path() ?>/view.php?id=<?= $motor['id'] ?>"> View </a>

<?php endforeach; ?>
</ul>

<p>
    <?php
    $pages = floor(($m->count() / 5));
    for($i = 0; $i <= $pages ; $i++) : ?>
    <?php if($i == 0) : ?>
            <a href="<?= base_path() ?>/index.php?page=<?= $i ?>&sort=<?= $sort ?>"> Index </a>
    <?php else :?>
        &nbsp;<a href="<?= base_path() ?>/index.php?page=<?= $i ?>&sort=<?= $sort ?>"> <?= $i ?> </a>
    <?php endif; ?>
    <?php endfor; ?>
</p>