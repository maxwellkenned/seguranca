<?php
//PDO Conection
$host="localhost";
$db_name="db_seguranca_web";
$db_user="root";
$db_password="";
$pdo = new PDO("mysql:host=". $host .";dbname=".$db_name, $db_user, $db_password); 

foreach($pdo->query('SELECT * from usuarios') as $row) {
    print_r($row);
}
var_dump($pdo);
?>