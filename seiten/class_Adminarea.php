<?php

class AdminService extends DatenBankService {

    static private $instance = null;
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

    static public function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct() {
        
    }

    public function Anloggen($login, $passwort) {
        $passwort_md5 = md5(md5($passwort));
        $id = parent::AdminEin($login, $passwort_md5);
        if ($id > 0) {
            $this->CoockieEin();
            $this->Refresch();
        } 
    }

    public function CoockieEin() {
        setcookie(Constans::ROLE, Constans::PAGE_ADMIN, time() + 60 * 60 * 24 * 30);
    }

    public function CoockieAus() {
        setcookie(Constans::ROLE, "null", time() - 3600);
        $this->Refresch();
    }

    public function CoockieStatus($refresh = false) {

        if (isset($_COOKIE[Constans::ROLE]) && $_COOKIE[Constans::ROLE] == Constans::PAGE_ADMIN) {
            $this->_status = true;
        } else {
            $this->_status = false;
        }
        if ($refresh == true) {
            $this->Refresch();
        }
    }

    private function Refresch() {
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }

    public function GetAllFromGastBook() {
        $array = array();
        $result = parent::GetAllFromDB(GastBookModel::TABLE_NAME, "desc");
        $this->_count = parent::getCount();
        if ($this->_count != 0) {
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $modelGB = new GastBookModel();
                $modelGB->setToModelAll($row[DatenBankModel::ID], $row[DatenBankModel::NAME_COL_GB], $row[DatenBankModel::EMAIL_COL_GB], $row[DatenBankModel::MESSAGE_COL_GB], $row[DatenBankModel::DATE_COL_GB], $row[DatenBankModel::ADMIN_COL_GB], $row[DatenBankModel::SHOW_COL_GB]);
                array_push($array, $modelGB);
            }
        } else {
            $array = $this->_count;
        }
        return $array;
    }

    public function Delete($id, $table) {
        return parent::DeleteFromTable($id, $table);
    }

    public function UpdateInGastBook($model) {
        return parent::UpdateTable($model, GastBookModel::TABLE_NAME);
    }

}

?>
