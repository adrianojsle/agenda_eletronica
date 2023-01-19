<?php

class DbConnect {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'agenda_db';

    public function connect() {
        try {
            $mysql_connect_str = "mysql:host=$this->host;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->user, $this->password);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        } catch (PDOException $e) {
            // echo "Error: " . $e->getMessage();
            require_once 'pages/err.php';
        }
    }
}

?>