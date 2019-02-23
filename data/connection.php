<?php
namespace Data;

use PDO;

class Connection {
    private static $pdo;

    public static function getPDO(){

        if (empty(self::$pdo)) {
            $host="localhost";
            $db_name="db_seguranca_web";
            $db_user="root";
            $db_password="";
            $pdo = new PDO("mysql:host=". $host .";dbname=".$db_name, $db_user, $db_password); 
        }

        return $pdo;
    }

    public static function destroy()
    {
        self::$pdo = null;
    }

}
