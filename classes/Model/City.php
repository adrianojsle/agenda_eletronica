<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class City extends DbConnect
{
    private $tableName = 'cities';

    public function getByStateId(int $state_id)
    {
        $query = "SELECT id, name FROM $this->tableName WHERE state_id = $state_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $cities = $stmt->fetchAll();
        return json_encode($cities);
    }
}
