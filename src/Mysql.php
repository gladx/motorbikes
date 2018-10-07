<?php
/**
 * Created by PhpStorm.
 * User: FARZAN19
 * Date: 2018/10/07
 * Time: 09:52 AM
 */

namespace Glad\Motor;


class Mysql
{
    public static $db;
    public static function getDb()
    {
        if(!self::$db){
            try {
                self::$db = new \PDO('mysql:dbname=test_motor;host=localhost', 'root' , '');
            } catch (\PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }

        return self::$db;

    }
}