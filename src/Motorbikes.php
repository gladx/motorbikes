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
    public function all($page = null, $sort = 'id')
    {

        $offset = isset($page) ? ($page * 5) : '0'; // TODO: HarCode
        
        $stmt = $this->db->prepare('SELECT * FROM motorbikes  ORDER BY ' . $sort . ' desc  Limit 5 Offset ' . $offset);
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

    public function getOne($id)
    {
        $query = "SELECT * from motorbikes where id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function count(){
        $stmt = $this->db->prepare('SELECT count(*) FROM motorbikes');
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}
