<?php
/**
 * Created by PhpStorm.
 * User: FARZAN19
 * Date: 2018/10/07
 * Time: 09:49 AM
 */

namespace Glad\Motor;


class Motorbikes
{
    public $db;
    public function __construct()
    {
        $this->db = Mysql::getDb();
    }

    public function all()
    {
        $stmt = $this->db->prepare('SELECT * FROM motorbikes');
        $stmt->execute();
        return $stmt->fetchAll();

    }

}