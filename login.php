<?php

require_once('config.php');

use Repository\UsuarioRepository;

if (empty($_POST)) {
    header('Location: /');
    die();
}

$usuarioRepository = new UsuarioRepository();

$post = $_POST;

echo $usuarioRepository->login($post);