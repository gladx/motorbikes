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

<h2> <?= $motor['model'] ?> </h2>

<ul>
    <li><?= $motor['model'] ?> </li>
    <li><?= $motor['color'] ?> </li>
    <li><?= $motor['price'] ?> </li>
    <li><?= $motor['weight'] ?> </li>
    <img src="<?= base_path() . '/images/' . $motor['image'] ?>" alt="Image">
</ul>