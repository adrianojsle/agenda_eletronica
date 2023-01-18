<?php
require_once __DIR__ . '../../Model/User.php';

class UserController
{
    public function register($name, $email, $password)
    {
        // Validacão simples
        if (empty($name) || empty($email) || empty($password)) {
            $msg = 'Todos os campos precisam ser preenchidos';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = 'E-mail inválido!';
        } else {
            // Registro do usuário
            $user = new User();
            $result = $user->register($name, $email, $password);
            if ($result) {
                $createSession = $user->login($email, $password);
                if ($createSession) {
                    header('Location: /?p=dashboard');
                    exit;
                } else {
                    $msg = 'Não foi possível redirecionar para o painel';
                }
            } else {
                $msg = 'Não foi possível efetuar o seu cadastro';
            }
        }
        if (!empty($msg)) {
            return $msg;
        }
    }

    public function login($email, $password)
    {
        // Validacão simples
        if (empty($email) || empty($password)) {
            $msg = 'Todos os campos precisam ser preenchidos';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = 'E-mail inválido!';
        } else {
            // Registro do usuário
            $user = new User;
            $result = $user->login($email, $password);
            if ($result) {
                header('Location: /?p=dashboard');
                exit;
            } else {
                $msg = 'Não foi possível efetuar o seu login';
            }
        }
        if (!empty($msg)) {
            return $msg;
        }
    }
}
