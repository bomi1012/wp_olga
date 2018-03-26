<?php
date_default_timezone_set("Europe/Berlin");
(substr(date('d'), 0, 1) == 0) ? $zahl_von_date = substr(date('d'), 1, 1) : $zahl_von_date = substr(date('d'), 0, 1);

if (isset($_POST["submit_message"])) {
    if ($_POST["frage"] == $model->createFrage($zahl_von_date, 10)) {
        $kontakt = new Kontakt();
        $result = $kontakt->NachrichtSenden($_POST[Constans::ANREDE], $model->Umlaute($_POST[Constans::NAME]), $_POST[Constans::EMAIL], $model->Umlaute($_POST[Constans::NACHRICHT]));
    } else {
        ?>
        <div class="alert alert-error alert-oben">
            <a href="#" class="close right" data-dismiss="alert">&times;</a>
            Ihre Nachricht wurde nicht gesendet, da die Antwort falsch war.
        </div>
        <?php
    }
} else if (isset($_POST["submit_form"])) {
     if ($_POST["frage"] == $model->createFrage($zahl_von_date, 10)) {
         $kontakt = new Kontakt();
         $result = $kontakt->formSenden(filter_input_array(INPUT_POST));
     } else {
        ?>
        <div class="alert alert-error alert-oben">
            <a href="#" class="close right" data-dismiss="alert">&times;</a>
            Ihre Nachricht wurde nicht gesendet, da die Antwort falsch war.
        </div>
        <?php
    }
}

if (isset($result) && $result == true) {
    ?>
    <div class="alert alert-success alert-oben">
        <a href="#" class="close right" data-dismiss="alert">&times;</a>
        <strong>Vielen Dank!</strong> Ihre Nachricht wurde erfolgreich gesendet.
    </div>
<?php } ?>

<div class="article_text c1">
    <select onchange="choose(this);" name="choose_dropdown_list" style="width: 280px;">
        <option value="c1_kontakt_form" selected><?php echo $model->Umlaute("Anfragebogen für die Kinderbetreuung"); ?></option>
        <option value="c1_kontakt_message"><?php echo $model->Umlaute("Private Nachricht senden"); ?></option>
    </select>
</div>

<!-- Anfragebogen für die Kinderbetreuung -->
<?php include 'resources/text/c1_kontakt_form.php';?>
<!-- Private Nachricht senden -->
<?php include 'resources/text/c1_kontakt_message.php';?>

<div class="alert alert-info alert-oben-big">
    <a href="#" class="close right" data-dismiss="alert">&times;</a>
    * Pflichtfeld
</div>
<script type="text/javascript" src="resources/js/fnct_contact.js"></script>