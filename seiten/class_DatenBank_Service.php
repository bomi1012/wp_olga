<?php

class DatenBankService extends Connection implements IDatenBank {

    private $_count;

    public function getCount() {
        return $this->_count;
    }

    public function __construct() {
        
    }

    /**
     * 
     * @param string $table
     * @param string $sort
     * @return db oder NULL
     */
    public function GetAllFromDB($table, $sort) {
        parent::DBOpen();
        $list = mysql_query("SELECT * FROM $table ORDER BY " . DatenBankModel::ID . " $sort");
        $this->_count = mysql_num_rows($list);
        if ($this->_count > 0) {
            return $list;
        } else {
            return null;
        }
        parent::DBClose();
    }

    /**
     * 
     * @param string $table
     */
    public function GetCountFromDBOnlyShow($table) {
        parent::DBOpen();
        $list = mysql_query("SELECT * FROM $table WHERE " . DatenBankModel::SHOW_COL_GB . " = 1");
        $this->_count = mysql_num_rows($list);
        parent::DBClose();
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
        parent::DBOpen();
        $list = mysql_query("SELECT "
                . DatenBankModel::ID . ", "
                . DatenBankModel::NAME_COL_GB . ", "
                . DatenBankModel::EMAIL_COL_GB . ", "
                . DatenBankModel::MESSAGE_COL_GB . ", 
                    DATE_FORMAT(" . DatenBankModel::DATE_COL_GB . ",'%d.%m.%Y %H:%i')  AS " . DatenBankModel::DATE_COL_GB . " , "
                . DatenBankModel::ADMIN_COL_GB . " FROM $table WHERE " . DatenBankModel::SHOW_COL_GB . " = 1 
                    ORDER BY " . DatenBankModel::ID . " $sort LIMIT $limit1, $limit2");
        $this->_count = mysql_num_rows($list);
        if ($this->_count > 0) {
            return $list;
        } else {
            return null;
        }
        parent::DBClose();
    }

    /**
     * 
     * @param int $id
     * @param string $table
     * @return bool
     */
    public function DeleteFromTable($id, $table) {
        parent::DBOpen();
        $del = mysql_query("DELETE FROM $table WHERE " . DatenBankModel::ID . " = $id");
        parent::DBClose();
        return $del;
    }

    /**
     * 
     * @param Class $model
     * @param string $table
     * @return bool
     */
    public function UpdateTable($model, $table) {
        parent::DBOpen();
        if ($table == GastBookModel::TABLE_NAME) {
            $update = mysql_query("UPDATE $table SET "
                    . DatenBankModel::NAME_COL_GB . " = '" . $model->getName() . "', "
                    . DatenBankModel::EMAIL_COL_GB . " = '" . $model->getEmail() . "', "
                    . DatenBankModel::MESSAGE_COL_GB . " = '" . $model->getMessage() . "', "
                    . DatenBankModel::ADMIN_COL_GB . " = '" . $model->getAdminAntwort() . "', "
                    . DatenBankModel::SHOW_COL_GB . " = " . $model->getShow()
                    . " WHERE " . DatenBankModel::ID . " = " . $model->getId());
        }
        parent::DBClose();
        return $update;
    }

    public function InsertInTable($model, $table) {
        parent::DBOpen();
        if ($table == GastBookModel::TABLE_NAME) {
            if (empty($_POST[Constans::EMAIL])) {
                mysql_query("INSERT INTO $table ("
                        . DatenBankModel::NAME_COL_GB . ", "
                        . DatenBankModel::MESSAGE_COL_GB . ", "
                        . DatenBankModel::DATE_COL_GB . ")
                        VALUES ('" . $model->getName() . "', '" . $model->getMessage() . "', Now())");
            } else {
                mysql_query("INSERT INTO $table ("
                        . DatenBankModel::NAME_COL_GB . ", "
                        . DatenBankModel::EMAIL_COL_GB . ", "
                        . DatenBankModel::MESSAGE_COL_GB . ", "
                        . DatenBankModel::DATE_COL_GB . ")
                        VALUES ('" . $model->getName() . "', '" . $model->getEmail() . "', '" . $model->getMessage() . "', Now())");
            }
        }

        $id = mysql_insert_id();
        parent::DBClose();
        return $id;
    }

    ###############
    ##   Admin   ##
    ###############
    public function AdminEin($login, $passwort) {
        $row = 0;
        parent::DBOpen();
        $list = mysql_query("SELECT ".DatenBankModel::ID." FROM admin WHERE ".DatenBankModel::NAME_COL_AD." = '$login' 
            and ".DatenBankModel::PASSWORT_COL_AD." = '$passwort' ");
        $num_rows = mysql_num_rows($list);
        if ($num_rows > 0) {
            $res = mysql_fetch_row($list);
            $row = $res[0];
        }
        parent::DBClose();
        return $row;
    }

}

?>
