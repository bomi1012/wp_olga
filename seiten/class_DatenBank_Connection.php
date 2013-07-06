<?php
/**
 * Description of DatenBankParent
 *
 * @author Mihon
 */
class Connection{
    
    private $_link;
    private $_host = "localhost";
    private $_user = "web241";
    private $_passwort = "root";
    private $_db = "usr_web241_1";
    
    
    public function __construct() {
        
    }
    
    protected function DBOpen() {
        $this->_link = mysql_connect($this->_host, $this->_user, $this->_passwort) or die(mysql_error("Error mysql!"));
        mysql_selectdb($this->_db) or die(mysql_error("Error mysql!"));
        mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'") or die(mysql_error("Error mysql!"));
    }

    protected function DBClose() {
        mysql_close($this->_link);
    }
}

?>
