<?php

class Adminarea {
    private $_db;
    private $_status = false;
    private $_id = 0;
    private $_action = array(1 => "public", 0 => "nopublic", 2 => "delete");
    private $_count;
    
    public function getCount() {
        return $this->_count;
    }

        public function getAction() {
        return $this->_action;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }

    function __construct() {
        $this->_db = new DatenBank();
    }

    public function Anloggen($login, $passwort) {
        $passwort_md5 = md5(md5($passwort));
        $id = $this->_db->AdminEin($login, $passwort_md5);
        if ($id > 0) {
            $this->_id = $id;
            $this->_status = true;
        }
    }

    public function CoockieEin() {
        setcookie(Constans::ROLE, Constans::PAGE_ADMIN, time() + 60 * 60 * 24 * 30);
    }

    public function CoockieAus() {
        setcookie(Constans::ROLE, "", time() - 3600);
    }

    public function GetAllFromGastBook() {
        $array = array();       
        $result = $this->_db->GetAllFromDB(GastBookModel::TABLE_NAME, "desc");
        $this->_count = $this->_db->getCount();
        if ($this->_count != 0) {            
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {                
                $modelGB = new GastBookModel();
                $modelGB->setToModelAll($row["id"], $row["benutzer_name"], $row["benutzer_email"], 
                        $row["benutzer_message"], $row["datetime"], $row["admin_antwort"], $row["hide_show"]);
                array_push($array, $modelGB);
            }
        }  else {
            $array = $this->_count;
        }
        return $array;
    }
    
    public function DeleteFromTable($id, $table) {
        return $this->_db->DeleteFromTable($id, $table);
    }
    
    public function UpdateInGastBook($id, $name, $email, $message, $adminAntwort, $show) {
        return $this->_db->UpdateInGastBook($id, $name, $email, $message, $adminAntwort, $show);
    }
}

?>
