<?php
if (isset($_POST["submit"])) {
    if($_POST["comment"] == "") {
        $kontakt = new Kontakt();
        $result = $kontakt->NachrichtSenden($_POST[Constans::ANREDE], $model->Umlaute($_POST[Constans::NAME]), $_POST[Constans::EMAIL], $model->Umlaute($_POST[Constans::NACHRICHT]));
    }
}

if (isset($result) && $result == true) {
    ?>
    <div class="alert alert-success alert-oben">
        <a href="#" class="close right" data-dismiss="alert">&times;</a>
        <strong>Vielen Dank!</strong> Ihre Nachricht wurde erfolgreich gesendet.
    </div>
<?php } ?>

<div class="article_text c1" id="text_allgemein">
    <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">
        <label><?php echo Constans::ANREDE ?>:</label>
        <select name="<?php echo Constans::ANREDE ?>" id="id_<?php echo Constans::ANREDE ?>" style="width: 80px;">
            <option value="<?php echo Constans::HERR ?>"><?php echo Constans::HERR ?></option>
            <option value="<?php echo Constans::FRAU ?>"><?php echo Constans::FRAU ?></option>
        </select>
        <div class="leerzeile"></div>

        <label><?php echo Constans::NAME ?>*:</label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            <input autofocus required type="text" id="id_<?php echo Constans::NAME ?>" name="<?php echo Constans::NAME ?>">
        </div>
        <div class="leerzeile"></div>

        <label><?php echo Constans::EMAIL ?>*:</label>
        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
            <input required type="email" placeholder="name@mail.de" id="id_<?php echo Constans::EMAIL ?>" name="<?php echo Constans::EMAIL ?>">
        </div>  
        <div class="leerzeile"></div>

        <label><?php echo Constans::NACHRICHT ?>*:</label>
        <textarea required rows="6" class="input-xlarge-area norezise" name="<?php echo Constans::NACHRICHT ?>" id="id_<?php echo Constans::NACHRICHT ?>"></textarea>
        <div class="leerzeile"></div>       

        <label style="display: none"> </label>
        <div style="display: none" class="input-prepend">
            <span class="add-on"><i class="icon-question "></i></span>
            <input type="comment" id="id_frage" name="comment">
        </div>  

        <button type="submit" class="btn btn-success right leerzeichen" name="submit">
            <i class="icon-white icon-check"></i> Nachricht senden
        </button>
    </form>
</div>

<div class="alert alert-info alert-oben-big">
    <a href="#" class="close right" data-dismiss="alert">&times;</a>
    * Pflichtfeld
</div>