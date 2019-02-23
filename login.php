<?php

require_once('config.php');

use Repository\UsuarioRepository;

if (empty($_POST)) {
    $baseUrl = $_SERVER['HTTP_HOST'];
    header('Location: /');
    die();
}

$usuarioRepository = new UsuarioRepository();

$post = $_POST;

echo $usuarioRepository->login($post);