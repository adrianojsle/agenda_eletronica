<?php
require_once __DIR__ . '../../Model/Contact.php';
require_once __DIR__ . '../../Model/Address.php';

class ContactController
{
    public function create($values)
    {
        // Validacão simples
        if (empty($values['street']) || empty($values['number']) || empty($values['zipcode']) || empty($values['neighborhood']) || empty($values['complement']) || empty($values['name']) || empty($values['phone']) || empty($values['state_id']) || empty($values['city_id'])) {
            $msg = 'Todos os campos precisam ser preenchidos';
        } else if (strlen(preg_replace("/[^0-9]/", "", $values['zipcode']))  !== 8) {
            // Aqui pego somente os números do cep, se não possuir 8 caracteres, retorno como inválido
            $msg = 'Esse CEP é inválido';
        } else if (!in_array(strlen(preg_replace("/[^0-9]/", "", $values['phone'])), [10, 11])) {
            // Aqui eu pego somente os números da string. Se não possuir 10 ou 11 caracteres, retorno como inválido
            $msg = 'Esse Telefone é inválido';
        } else if(strpos($values['phone'], '_') !== false) {
            $msg = 'Esse Telefone é inválido';
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

    public function edit($values)
    {
        // Validacão simples
        if (empty($values['street']) || empty($values['number']) || empty($values['zipcode']) || empty($values['neighborhood']) || empty($values['complement']) || empty($values['name']) || empty($values['phone']) || empty($values['state_id']) || empty($values['city_id']) || empty($values['id']) || empty($values['address_id'])) {
            $msg = 'Todos os campos precisam ser preenchidos';
        } else if (strlen(preg_replace("/[^0-9]/", "", $values['zipcode']))  !== 8) {
            // Aqui pego somente os números do cep, se não possuir 8 caracteres, retorno como inválido
            $msg = 'Esse CEP é inválido';
        } else if (!in_array(strlen(preg_replace("/[^0-9]/", "", $values['phone'])), [10, 11])) {
            // Aqui eu pego somente os números da string. Se não possuir 10 ou 11 caracteres, retorno como inválido
            $msg = 'Esse Telefone é inválido';
        } else if(strpos($values['phone'], '_') !== false) {
            $msg = 'Esse Telefone é inválido';
        } else {
            $contact = new Contact();
            $result = $contact->edit($values);
            if ($result) {
                header('Location: /?p=dashboard');
                exit;
            } else {
                $msg = 'Não foi possível editar';
            }
        }
        if (!empty($msg)) {
            return $msg;
        }
    }

    public function deleteById(int $contactId)
    {
        if (empty($contactId)) {
            $msg = 'Não foi possível encontrar o item';
        } else {
            $contact = new Contact();
            $result = $contact->delete($contactId);
            if ($result) {
                header("Refresh: 0");
                exit;
            } else {
                $msg = 'Não foi possível deletar';
            }
        }
    }

    public function loadContact(int $contactId)
    {
        if (empty($contactId)) {
            header('Location: /?p=dashboard');
            exit;
        } else {
            $contact = new Contact();
            $result = $contact->load($contactId);
            if ($result) {
                return $result;
            } else {
                header('Location: /?p=dashboard');
                exit;
            }
        }
    }
    public function loadAddress(int $addressId)
    {
        if (empty($addressId)) {
            header('Location: /?p=dashboard');
            exit;
        } else {
            $address = new Address();
            $result = $address->load($addressId);
            if ($result) {
                return $result;
            } else {
                header('Location: /?p=dashboard');
                exit;
            }
        }
    }
}
