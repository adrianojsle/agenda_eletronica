<?php
require_once __DIR__ . '../../Db/DbConnect.php';
require_once __DIR__ . '../../Controller/PaginationController.php';

class Contact extends DbConnect
{
    private $tableName = 'contacts';

    public function count()
    {
        $session = new SessionController();
        $userId = $session->profile()['id'];
        $query = "SELECT COUNT(*) FROM $this->tableName WHERE user_id = $userId";
        $stmt = $this->connect()->prepare($query);
        if ($stmt->execute()) {
            $countItems = $stmt->fetchColumn();
            return $countItems;
        } else {
            return 0;
        }
    }

    public function getAll($perPage, $page)
    {
        $pagination = new PaginationController($perPage, $this->tableName);
        $items = $pagination->getData($page);
        return $items;
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

    public function delete(int $contactId)
    {
        $session = new SessionController();
        // Encontrar o item
        $querySearchContact = "SELECT * FROM contacts WHERE id = $contactId";
        $stmtSearchContact = $this->connect()->prepare($querySearchContact);
        $stmtSearchContact->execute();
        $contact = $stmtSearchContact->fetch();

        if ($contact['user_id'] === $session->profile()['id']) {
            $query = "DELETE FROM contacts WHERE id = $contactId";
            $stmt = $this->connect()->prepare($query);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
