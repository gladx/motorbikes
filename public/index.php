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
if(isset($_GET['page'])){
    $page =$_GET['page'];
}
$motors = $m->all($page);

?>

<a href="<?= base_path() ?>/add.php"> Add </a>

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
            <a href="<?= base_path() ?>/index.php?page=<?= $i ?>"> Index </a>
    <?php else :?>
        &nbsp;<a href="<?= base_path() ?>/index.php?page=<?= $i ?>"> Page <?= $i ?> </a>
    <?php endif; ?>
    <?php endfor; ?>
</p>