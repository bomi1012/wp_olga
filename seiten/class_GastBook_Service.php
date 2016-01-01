<?php

class GastBookService extends DatenBankService{

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

    function __construct() {
        parent::__construct();
        }

    public function InsertInDB($gbModel) {
        $gbModel->setId(parent::InsertInTable($gbModel, GastBookModel::TABLE_NAME));
    }

    public function GetAllFromGastBook($limit) {
        $array = array();
        $result = parent::GetAllFromDBWithLimitOnlyShow(GastBookModel::TABLE_NAME, "desc", $limit, $this->_anzahl);
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $modelGB = new GastBookModel();
                $modelGB->setToModelAll($row[DatenBankModel::ID], $row[DatenBankModel::NAME_COL_GB], $row[DatenBankModel::EMAIL_COL_GB], 
                        $row[DatenBankModel::MESSAGE_COL_GB], $row[DatenBankModel::DATE_COL_GB], $row[DatenBankModel::ADMIN_COL_GB], NULL);
                array_push($array, $modelGB);
        }
        return $array;
    }

    public function Count() {
        parent::GetCountFromDBOnlyShow(GastBookModel::TABLE_NAME);
        $this->_count = parent::getCount();
    }

    public function NachrichtSenden($gbModel) {
        $id = $gbModel->getId();
        $name = $gbModel->getName();
        $email = $gbModel->getEmail();
        $nachricht = nl2br($gbModel->getMessage());
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
