<?php

class GastBookModel{
    const TABLE_NAME = "gastbook";
    
    private $_id = NULL;
    private $_name = NULL;
    private $_email = NULL;
    private $_message = NULL;
    private $_datetime = NULL;
    private $_adminAntwort = NULL;
    private $_show = NULL;
    
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }

    public function getName() {
        return $this->_name;
    }
    public function setName($name) {
        $this->_name = $name;
    }

    public function getEmail() {
        return $this->_email;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }

    public function getMessage() {
        return $this->_message;
    }
    public function setMessage($message) {
        $this->_message = $message;
    }

    public function getDatetime() {
        return $this->_datetime;
    }
    public function setDatetime($datetime) {
        $this->_datetime = $datetime;
    }

    public function getAdminAntwort() {
        return $this->_adminAntwort;
    }
    public function setAdminAntwort($adminAntwort) {
        $this->_adminAntwort = $adminAntwort;
    }

    public function getShow() {
        return $this->_show;
    }
    public function setShow($show) {
        $this->_show = $show;
    }

       
    public function __construct() {
        
    }
    
    public function setToModelAll($id, $name, $email, $message, $datetime, $adminAntwort, $show) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_email = $email;
        $this->_message = $message;
        $this->_datetime = $datetime;
        $this->_adminAntwort = $adminAntwort;
        $this->_show = $show;
    }
    
    public function setFromForm($name, $email, $message) {
        $this->_name = $name;
        $this->_email = $email;
        $this->_message = $message;
    }
}

?>
