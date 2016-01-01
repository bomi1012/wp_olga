<?php

class DatenBankService extends Connection implements IDatenBank {

    private $_count;
    
    public function getCount() {
        return $this->_count;
    }

    public function __construct() {
        parent::__construct();
        //parent::getLog()->setError("Falsche einträge");
    }

    /**
     * 
     * @param string $table
     * @param string $sort
     * @return db oder NULL
     */
    public function GetAllFromDB($table, $sort) {
        $return = NULL;
        if (parent::DBOpen() == TRUE) {
            $sql = "SELECT * FROM $table ORDER BY " . DatenBankModel::ID . " $sort";
            $list = mysql_query($sql);
            if ($list != FALSE) {
                $this->_count = mysql_num_rows($list);
                $return = $list;
            }
            parent::DBClose();
        }
        else
            $return = FALSE;
        return $return;
    }

    /**
     * 
     * @param string $table
     */
    public function GetCountFromDBOnlyShow($table) {
        $return = NULL;
        if (parent::DBOpen() == true) {
            $sql = "SELECT * FROM $table WHERE " . DatenBankModel::SHOW_COL_GB . " = 1";
            $list = mysql_query($sql);
            if ($list != FALSE) {
                $this->_count = mysql_num_rows($list);
                $return = $list;
            }
            parent::DBClose();
        }
        else
            $return = FALSE;
        return $return;
    }

    /**
     * 
     * @param string $table
     * @param string $sort
     * @param int $limit1
     * @param int $limit2
     * @return db oder NULL
     */
    public function GetAllFromDBWithLimitOnlyShow($table, $sort, $limit1, $limit2) {
        if (parent::DBOpen() == true) {
            $sql = "SELECT "
                    . DatenBankModel::ID . ", "
                    . DatenBankModel::NAME_COL_GB . ", "
                    . DatenBankModel::EMAIL_COL_GB . ", "
                    . DatenBankModel::MESSAGE_COL_GB . ", 
                    DATE_FORMAT(" . DatenBankModel::DATE_COL_GB . ",'%d.%m.%Y %H:%i')  AS " . DatenBankModel::DATE_COL_GB . " , "
                    . DatenBankModel::ADMIN_COL_GB . " FROM $table WHERE " . DatenBankModel::SHOW_COL_GB . " = 1 
                    ORDER BY " . DatenBankModel::ID . " $sort LIMIT $limit1, $limit2";

            $list = mysql_query($sql);
            $this->_count = mysql_num_rows($list);
            parent::DBClose();
            if ($this->_count > 0) {
                return $list;
            } else {
                return NULL;
            }
        }
    }

    /**
     * 
     * @param int $id
     * @param string $table
     * @return bool
     */
    public function DeleteFromTable($id, $table) {
        if (parent::DBOpen() == true) {
            $sql = "DELETE FROM $table WHERE " . DatenBankModel::ID . " = $id";
            $del = mysql_query($sql);
            parent::DBClose();
            return $del;
        }
    }

    /**
     * 
     * @param Class $model
     * @param string $table
     * @return bool
     */
    public function UpdateTable($model, $table) {
        if (parent::DBOpen() == true) {
            if ($table == GastBookModel::TABLE_NAME) {
                $sql = "UPDATE $table SET "
                        . DatenBankModel::NAME_COL_GB . " = '" . $model->getName() . "', "
                        . DatenBankModel::EMAIL_COL_GB . " = '" . $model->getEmail() . "', "
                        . DatenBankModel::MESSAGE_COL_GB . " = '" . $model->getMessage() . "', "
                        . DatenBankModel::ADMIN_COL_GB . " = '" . $model->getAdminAntwort() . "', "
                        . DatenBankModel::SHOW_COL_GB . " = " . $model->getShow()
                        . " WHERE " . DatenBankModel::ID . " = " . $model->getId();
                $update = mysql_query($sql);
            }
            parent::DBClose();
            return $update;
        }
    }

    public function InsertInTable($model, $table) {
        if (parent::DBOpen() == true) {
            $sql = NULL;
            if ($table == GastBookModel::TABLE_NAME) {
                if (empty($_POST[Constans::EMAIL])) {
                    $sql = "INSERT INTO $table ("
                            . DatenBankModel::NAME_COL_GB . ", "
                            . DatenBankModel::MESSAGE_COL_GB . ", "
                            . DatenBankModel::DATE_COL_GB . ")
                        VALUES ('" . $model->getName() . "', '" . $model->getMessage() . "', Now())";
                    mysql_query($sql);
                } else {
                    $sql = "INSERT INTO $table ("
                            . DatenBankModel::NAME_COL_GB . ", "
                            . DatenBankModel::EMAIL_COL_GB . ", "
                            . DatenBankModel::MESSAGE_COL_GB . ", "
                            . DatenBankModel::DATE_COL_GB . ")
                        VALUES ('" . $model->getName() . "', '" . $model->getEmail() . "', '" . $model->getMessage() . "', Now())";
                    mysql_query($sql);
                }
            }
            $id = mysql_insert_id();
            parent::DBClose();
            return $id;
        }
    }

    ###############
    ##   Admin   ##
    ###############

    public function AdminEin($login, $passwort) {
        $row = 0;
        if (parent::DBOpen() == true) {
            $sql = "SELECT " . DatenBankModel::ID . " FROM admin WHERE " . DatenBankModel::NAME_COL_AD . " = '$login' 
            and " . DatenBankModel::PASSWORT_COL_AD . " = '$passwort' ";

            $list = mysql_query($sql);
            $num_rows = mysql_num_rows($list);
            if ($num_rows > 0) {
                $res = mysql_fetch_row($list);
                $row = $res[0];
            }
            parent::DBClose();
            return $row;
        }
    }

}

?>
