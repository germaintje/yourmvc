<?php
require_once 'model/ContactsLogic.php';

class ContactsController
{
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
    }

    public function __destruct() {
        // TODO: Implement __destruct() method.
    }

    public function handleRequest() {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
            switch ($op) {
                case 'create':
                    if ($_REQUEST == null) {
                        $this->collectCreateForm();
                    } else {
                        $this->collectCreateContact($_REQUEST);
                    }
                    break;
                case 'reads':
                    $this->collectReadContacts();
                    break;
                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
                case 'update':
                    $this->collectUpdateContact();
                    break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                default:
                    $this->collectReadContacts();
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }

    }
    public function collectCreateForm() {
		include 'view/create.php';
    }

    public function collectCreateContact() {
		
		include 'view/create.php';
    }

    public function collectReadContact($id) {
        $contacts = $this->ContactsLogic->readContact($id);
        include 'view/contacts.php';

    }

    public function collectReadContacts() {
        $contacts = $this->ContactsLogic->readContacts();
        include 'view/contacts.php';
    }

    public function collectDeleteContact($id) {
        $contacts = $this->ContactsLogic->deleteContact($id);
        include 'view/delete.php';
    }
}
