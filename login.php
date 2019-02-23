<?php


$login = $_POST['login'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT );

var_dump($login, $senha);