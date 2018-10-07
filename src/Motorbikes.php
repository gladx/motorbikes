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

    /**
     * fetch all motors
     *
     * @return array
     */
    public function all()
    {
        $stmt = $this->db->prepare('SELECT * FROM motorbikes');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Insert new motor
     *
     * @param $motor
     * @return bool
     */
    public function insert($motor)
    {
        $query = "INSERT INTO motorbikes (model, color, weight, price , image) VALUES (:model, :color, :weight, :price , :image)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($motor);
    }

}
