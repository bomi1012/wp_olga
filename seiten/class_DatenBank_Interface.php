<?php

/**
 * Description of DatenBankInterface
 *
 * @author Mihon
 */
interface IDatenBank {
    public function __construct();

    public function getCount();

    public function GetAllFromDB($table, $sort);

    public function GetCountFromDBOnlyShow($table);

    public function GetAllFromDBWithLimitOnlyShow($table, $sort, $limit1, $limit2);

    public function DeleteFromTable($id, $table);
    
    public function UpdateTable($model, $table);
    
    public function InsertInTable($model, $table);
}

?>
