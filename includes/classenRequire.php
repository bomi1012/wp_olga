<?php

//error handler function
function customError($errno, $errstr) {
    echo "<b>Error:</b> [$errno] $errstr";
}
//set error handler
set_error_handler("customError");

    @include 'constanten/Constanten.php';
    @include 'seiten/Model.php';
    @include 'seiten/Info.php';
    @include 'seiten/Kontakt.php';
    @include 'seiten/DatenBank.php';
    @include 'seiten/GastBook.php';
    @include 'seiten/Adminarea.php';
    @include 'seiten/Album.php';
    
    
?>
