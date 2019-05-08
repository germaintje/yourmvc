<?php

require_once "DataHandler.php";

class ContactsLogic
{
    public function __construct(){
        $this->DataHandler = new DataHandler("localhost", "mysql", "yourmvc", "germain", "germain");
    }

    public function __destruct(){
    }

    public function createContact($name, $phone, $email, $address) {
		try {
            $sql = "INSERT INTO contacts(`name`, `phone`, `email`, `location`) VALUES('$name','$phone' ,'$email','$address');";
            $result = $this->DataHandler->createData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function readContacts(){
        try {
            $sql = "SELECT * FROM contacts;";
            $result = $this->DataHandler->readsData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }


    public function readContact($id) {
        try {
            $sql = "SELECT * FROM contacts WHERE id = '$id';";
            $result = $this->DataHandler->readData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function updateContact($name, $phone, $email, $address) {
    }

    public function deleteContact($id) {
        try {
            $sql = "DELETE FROM contacts WHERE id = '$id';";
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

}