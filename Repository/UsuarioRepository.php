<?php
namespace Repository;

use Data\Connection;
use Model\Usuario;
use PDO;

class UsuarioRepository
{
    private $conn;
    const COOKIE_NAME = "session";

    /**
     * UsuarioRepository constructor.
     */
    public function __construct()
    {
        $this->conn = Connection::getPDO();
    }

    public function getUsuarios()
    {
        $sql = $this->conn->prepare('SELECT * FROM usuarios');
        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_CLASS, Usuario::class);
        return $result;
    }

    public function login($post)
    {
        $email = $post['email'];
        $senha = $post['senha'];

        $usuario = $this->getUsuarioByEmail($email);
        if (!empty($usuario)){
            if (password_verify($senha, $usuario[0]->getSenha())) {
                $this->setCookie($usuario);
                header('Location: /home.html');
                die();
            }
        }

        return "E-mail ou senha inválidos";
    }

    public function getUsuarioByEmail($email)
    {
        $sql = $this->conn->prepare('SELECT * FROM usuarios WHERE email = :email LIMIT 1');
        $sql->bindValue(':email', $email);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_CLASS, Usuario::class);
    }

    public function logout()
    {
        setcookie(  self::COOKIE_NAME,
            '',
            time() - 3600);
        header('Location: /');
        die();
    }

    private function setCookie()
    {
        $domain = $_SERVER['HTTP_HOST'];
        setcookie(  self::COOKIE_NAME,
                    md5(uniqid("")),
                    time()+3600,
                    "/",
                    $domain,true, true);
    }
}   