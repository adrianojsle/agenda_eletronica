<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class Contact extends DbConnect
{
    private $tableName = 'contacts';

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

    public function getAll()
    {
        $query = "SELECT * FROM $this->tableName ORDER BY id DESC";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($values)
    {
        $session = new SessionController();
        // Cadastra o endereço
        $query = "INSERT INTO addresses (street, number, zipcode, neighborhood, complement,state_id,city_id) VALUES (:street, :number, :zipcode, :neighborhood, :complement, :state_id, :city_id)";
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':street', $values['street']);
        $stmt->bindParam(':number', $values['number']);
        $stmt->bindParam(':zipcode', $values['zipcode']);
        $stmt->bindParam(':neighborhood', $values['neighborhood']);
        $stmt->bindParam(':complement', $values['complement']);
        $stmt->bindParam(':state_id', $values['state_id']);
        $stmt->bindParam(':city_id', $values['city_id']);

        if ($stmt->execute()) {
            $address_id = (int) $conn->lastInsertId();
            $queryContact = "INSERT INTO $this->tableName (name, phone, user_id, address_id) VALUES (:name, :phone, :user_id, :address_id)";
            $stmtContact = $this->connect()->prepare($queryContact);
            $stmtContact->bindParam(':name', $values['name']);
            $stmtContact->bindParam(':phone', $values['phone']);
            $stmtContact->bindParam(':user_id', $session->profile()['id']);
            $stmtContact->bindParam(':address_id', $address_id);
            if ($stmtContact->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
