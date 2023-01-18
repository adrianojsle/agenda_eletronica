<?php
require_once __DIR__ . '../../Model/Contact.php';

class ContactController
{
    public function create($values)
    {
        // Validacão simples
        if (empty($values['street']) || empty($values['number']) || empty($values['zipcode']) || empty($values['neighborhood']) || empty($values['complement']) || empty($values['name']) || empty($values['phone']) || empty($values['state_id']) || empty($values['city_id'])) {
            $msg = 'Todos os campos precisam ser preenchidos';
        } else {
            $contact = new Contact();
            $result = $contact->create($values);
            if ($result) {
                header('Location: /?p=dashboard');
                exit;
            } else {
                $msg = 'Não foi possível adicionar';
            }
        }
        if (!empty($msg)) {
            return $msg;
        }
    }
}
