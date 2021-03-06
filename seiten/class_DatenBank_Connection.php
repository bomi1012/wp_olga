<?php

/**
 * Description of DatenBankParent
 *
 * @author Mihon
 */
class Connection {

    private $_log;

    protected function getLog() {
        return $this->_log;
    }

    private $_link;
    private $_host = "localhost:3306";
    private $_user = "web241";
    private $_passwort = "OlgaWeb2011!";
    private $_db = "usr_web241_1";

    public function __construct() {
        $this->_log = new Logging();
    }

    protected function DBOpen() {
        try {
            //wenn error. PHP7 --> mysqli_connect ; mysqli_select_db($link, $this->_db); etc.
            
            $this->_link =  mysql_connect($this->_host, $this->_user, $this->_passwort);
            $db = mysql_select_db($this->_db);
            $query = mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
            if ($this->_link == false || $db == false || $query == false)
                throw new Exception;
            return true;
        } catch (Exception $e) {
            echo "ERROR[DBOpen()]: Connection zur Datenbank fählt. <br>";
            echo "Line: " . $e->getLine() . "<br>";
            echo $e->getMessage();
            return false;
        }
    }

    protected function DBClose() {
        mysql_close($this->_link);
    }

}

?>
