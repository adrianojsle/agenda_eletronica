<?php
require_once 'classes/Db/DbConnect.php';

$db = new DbConnect;
$conn = $db->connect();

try{
    $stmt = $conn->query("SELECT 1");
    echo "Conexão com o banco de dados ativa";
}catch(PDOException $e){
    echo "Conexão com o banco de dados não está ativa, tente reconectar";
}