<?php

//error handler function
function customError($errno, $errstr) {
    echo "<b>Error:</b> [$errno] $errstr";
}

//set error handler
set_error_handler("customError");


/**
 * Interfaces
 */
@include 'seiten/class_DatenBank_Interface.php';

/**
 * Superclasse
 */
@include 'seiten/class_DatenBank_Connection.php';
@include 'seiten/class_Model.php';

/**
 * Classe
 */
@include 'constanten/Constanten.php';
@include 'seiten/class_Info.php';
@include 'seiten/class_Kontakt.php';
@include 'seiten/class_DatenBank_Service.php';
@include 'seiten/class_DatenBank_Model.php';
@include 'seiten/class_GastBook_Service.php';
@include 'seiten/class_GastBook_Model.php';
@include 'seiten/class_Adminarea.php';
@include 'seiten/class_Album.php';
?>
