<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class User extends DbConnect
{
    private $tableName = 'users';

    public function register($name, $email, $password)
    {
        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->tableName (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordCrypt);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM $this->tableName WHERE email = :email";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $this->startSession($user);
            return true;
        } else {
            return false;
        }
    }

    public function startSession($user)
    {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $user;
    }

    public function count()
    {
        $query = "SELECT COUNT(*) FROM $this->tableName";
        $stmt = $this->connect()->prepare($query);
        if ($stmt->execute()) {
            $countItems = $stmt->fetchColumn();
            return $countItems;
        } else {
            return 0;
        }
    }

    public function forceUpdateSession()
    {
        $session = new SessionController();
        $userId = $session->profile()['id'];
        $query = "SELECT * FROM users WHERE id = $userId";
        $stmt = $this->connect()->prepare($query);
        if ($stmt->execute()) {
            $user = $stmt->fetch();
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }

    public function edit($values)
    {
        $session = new SessionController();
        $passwordCrypt = password_hash($values['password'], PASSWORD_DEFAULT);
        $query = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :user_id";
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $values['name']);
        $stmt->bindParam(':email', $values['email']);
        $stmt->bindParam(':password', $passwordCrypt);
        $stmt->bindParam(':user_id', $session->profile()['id']);

        if ($stmt->execute()) {
            $this->forceUpdateSession();
            return true;
        } else {
            return false;
        }
    }
}
