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

?>

<a href="<?= base_path() ?>/add.php"> Add </a>

<ul>
    <?php foreach($motors as $motor) : ?>
   <li> <?= $motor['model'] ?> </li>
    <a href="<?= base_path() ?>/view.php?id=<?= $motor['id'] ?>"> View </a>

<?php endforeach; ?>
</ul>
