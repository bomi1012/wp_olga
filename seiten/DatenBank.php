<?php

class DatenBank {

    private $_link;
    private $_link_db;
    private $_host = "localhost";
    private $_user = "web241";
    private $_passwort = "root";
    private $_db = "usr_web241_1";
    private $_count;
    
    public function getCount() {
        return $this->_count;
    }

    public function __construct() {
        
    }

    private function DBOpen() {
        $this->_link = mysql_connect($this->_host, $this->_user, $this->_passwort) or die(mysql_error("Error mysql!"));
        $this->_link_db = mysql_selectdb($this->_db) or die(mysql_error("Error mysql!"));
        mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'") or die(mysql_error("Error mysql!"));
    }

    private function DBClose() {
        mysql_close($this->_link);
    }

    public function InsertToGastBook($name, $email, $kommentar) {
        $this->DBOpen();
        if (empty($_POST[Constans::EMAIL])) {
            mysql_query("INSERT INTO gastbook (benutzer_name, benutzer_message, datetime)
                        VALUES ('$name', '$kommentar', Now())");
        } else {
            mysql_query("INSERT INTO gastbook (benutzer_name, benutzer_email, benutzer_message, datetime)
                        VALUES ('$name', '$email', '$kommentar', Now())");
        }
        $id = mysql_insert_id();
        $this->DBClose();
        return $id;
    }

    public function AdminEin($login, $passwort) {
        $row = 0;
        $this->DBOpen();        
        $list = mysql_query("SELECT id FROM admin where name = '$login' and passwort = '$passwort' ");
        $num_rows = mysql_num_rows($list);
        if($num_rows > 0){
            $res = mysql_fetch_row($list);
            $row = $res[0];
        }
        $this->DBClose();
        return $row;
    }
    
    public function GetAllFromDB($table, $sort) {
        $this->DBOpen();
            $list = mysql_query("SELECT * FROM $table ORDER BY id $sort");
        $this->_count = mysql_num_rows($list);
        if($this->_count > 0){
            return $list;
        }else{
            return null;
        }
        $this->DBClose();
    }
    
    public function GetCountFromDBOnlyShow($table) {
        $this->DBOpen();
            $list = mysql_query("SELECT * FROM $table where hide_show = 1");
        $this->_count = mysql_num_rows($list);
        $this->DBClose();
    }
    
    public function GetAllFromDBWithLimitOnlyShow($table, $sort, $limit1, $limit2) {
        $this->DBOpen();
            $list = mysql_query("SELECT id, benutzer_name, benutzer_email, benutzer_message,
               DATE_FORMAT(datetime,'%d.%m.%Y %H:%i')  AS datetime , admin_antwort	 FROM $table where hide_show = 1 ORDER BY id $sort limit $limit1, $limit2");
        $this->_count = mysql_num_rows($list);
        if($this->_count > 0){
            return $list;
        }else{
            return null;
        }
        $this->DBClose();
    }
    
    public function DeleteFromTable($id, $table){
        $this->DBOpen();
        $del = mysql_query("Delete from $table where id = $id");
        $this->DBClose();
        return $del;
    }
    
    public function UpdateInGastBook($id, $name, $email, $message, $adminAntwort, $show) {
        $this->DBOpen();
        $update = mysql_query("UPDATE gastbook SET benutzer_name = '$name', benutzer_email = '$email', 
            benutzer_message = '$message', admin_antwort = '$adminAntwort', hide_show = $show WHERE id = $id");
        $this->DBClose();
        return $update;
    }
}

?>
