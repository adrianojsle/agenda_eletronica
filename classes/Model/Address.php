<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class Address extends DbConnect
{
    private $tableName = 'addresses';

    public function getAddressById(int $address_id)
    {
        $query = "SELECT * FROM $this->tableName WHERE id = $address_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $address = $stmt->fetch();
        // Buscar cidade
        $query = "SELECT * FROM cities WHERE id = :cityId";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':cityId', $address['city_id']);
        $stmt->execute();
        $city = $stmt->fetch();
        // Buscar estado
        $query = "SELECT * FROM states WHERE id = :stateId";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':stateId', $address['state_id']);
        $stmt->execute();
        $state = $stmt->fetch();
        return $address['street'] . ' - ' . $address['number'] . ', ' . $address['complement'] . ', ' . $address['neighborhood'] . ', ' . $address['zipcode'] . ', ' . $address['zipcode'] . ', ' . $city['name'] . ' - ' . $state['uf'];
    }

    public function load(int $addressId)
    {
        // Encontrar o item
        $query = "SELECT * FROM addresses WHERE id = $addressId";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $address = $stmt->fetch();
        if ($stmt->execute()) {
            return $address;
        } else {
            return false;
        }
    }
}
