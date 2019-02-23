<?php

require_once('config.php');

use Repository\UsuarioRepository;

$usuarioRepository = new UsuarioRepository();

$usuarioRepository->logout();