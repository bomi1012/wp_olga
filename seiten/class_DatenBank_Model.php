<?php
class DatenBankModel {

    const ID = "id";
    
    /*
     * GASTBOOK
     */
    const NAME_COL_GB = "benutzer_name";
    const EMAIL_COL_GB = "benutzer_email";
    const MESSAGE_COL_GB = "benutzer_message";
    const DATE_COL_GB = "datetime";
    const ADMIN_COL_GB = "admin_antwort";
    const SHOW_COL_GB = "hide_show";

    /*
     * Admin
     */    
    const NAME_COL_AD = "name";
    const PASSWORT_COL_AD = "passwort";
    
    public function __construct() {
        
    }

}

?>
