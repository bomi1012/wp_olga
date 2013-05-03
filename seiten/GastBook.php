<?php

class GastBook {

    private $_db;
    private $_new_id;
    private $_count;
    public $_anzahl = 15;
    private $_maxPage;
    private $_myEmail = "kb_rotkaeppchen@freenet.de";

    public function getMaxPage() {
        return $this->_maxPage;
    }

    public function setMaxPage($countRow) {
        if ($countRow <= $this->_anzahl) {
            $this->_maxPage = 1;
        } elseif (($countRow % $this->_anzahl) == 0) {
            $this->_maxPage = $countRow / $this->_anzahl;
        } elseif (($countRow % $this->_anzahl) != 0) {
            $this->_maxPage = (int) ($countRow / $this->_anzahl) + 1;
        }
    }

    public function getCount() {
        return $this->_count;
    }

    public function getNew_id() {
        return $this->_new_id;
    }

    function __construct() {
        $this->_db = new DatenBank();
    }

    public function InsertInDB($name, $email, $kommentar) {
        $this->_new_id = $this->_db->InsertToGastBook($name, $email, $kommentar);
    }

    public function GetAllFromGastBook($limit) {
        $array = array();
        $result = $this->_db->GetAllFromDBWithLimitOnlyShow("gastbook", "desc", $limit, $this->_anzahl);
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $array_temp = array(Constans::ID => $row["id"], Constans::NAME => $row["benutzer_name"], Constans::EMAIL => $row["benutzer_email"],
                Constans::NACHRICHT => $row["benutzer_message"], Constans::DT => $row["datetime"],
                Constans::ADMIN_ANTWORT => $row["admin_antwort"]);
            array_push($array, $array_temp);
        }
        return $array;
    }

    public function Count() {
        $this->_db->GetCountFromDBOnlyShow("gastbook");
        $this->_count = $this->_db->getCount();
    }

    public function NachrichtSenden($id, $name, $email, $nachricht) {
        $nachricht = nl2br($nachricht);
        $to = $this->_myEmail;
        $subject = "tagesmutter-landau.de: ein Kommentar in Gaestebuch (id: $id)";
        $message = "<body>
			Liebe Olga, du hast ein Kommentar von $name bekommen <br /> 
                        Email: <a href='mailto:$email'>$email</a><br />
                        Dieses Kommentar  <b>muss man</b> auf die seite 
<a href='http://www.tagesmutter-landau.de/admin.php'>www.tagesmutter-landau.de/admin.php</a>                       
  prüfen. <br /><br />
                        Zugangsdaten: <br />
                        Admin-name: admin <br />
                        Passwort: ****
                        <br />
                        <hr>
                        Kommentar:
                        <p>
                            $nachricht
			</p> 
                    </body>";
        $header = 'MIME-Version: 1.1' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $header .= 'From: tagesmutter-landau.de' . "\r\n";
        mail($to, $subject, $message, $header);
        return true;
    }
}

?>
