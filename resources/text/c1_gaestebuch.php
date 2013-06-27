<?php
$gb = new GastBook();
if (isset($_POST["submit"])) {
    $name = $model->Umlaute($_POST[Constans::NAME]);
    $nachricht = $model->Umlaute($_POST[Constans::NACHRICHT]);
    $gb->InsertInDB($name, $_POST[Constans::EMAIL], $nachricht);
    if (is_numeric($gb->getNew_id()) && $gb->getNew_id() > 0) {
        $gb->NachrichtSenden($gb->getNew_id(), $name, $_POST[Constans::EMAIL], $nachricht)
        ?>
        <div class="alert alert-info alert-oben">
            <a href="#" class="close right" data-dismiss="alert">&times;</a>
            <strong>Vielen Dank!</strong> Ihr Kommentar wird nach dem Pr&uuml;fen ver&ouml;ffentlicht
        </div>
        <?php
    }
}
?>
<!-- Erstellen -->

<div class="article_text c1" id="text_erstellen">
    <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">
        <label><?php echo Constans::NAME ?>*:</label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            <input autofocus required type="text" id="id_<?php echo Constans::NAME ?>" name="<?php echo Constans::NAME ?>">
        </div>
        <div class="leerzeile"></div>

        <label><?php echo Constans::EMAIL ?>:</label>
        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
            <input type="email" id="id_<?php echo Constans::EMAIL ?>" name="<?php echo Constans::EMAIL ?>">
        </div>  
        <div class="leerzeile"></div>

        <textarea required rows="6" class="input-xlarge-area1 norezise" name="<?php echo Constans::NACHRICHT ?>" id="id_<?php echo Constans::NACHRICHT ?>"></textarea>
        <div class="leerzeile"></div>

        <button type="submit" class="btn btn-success right leerzeichen" name="submit">
            <i class="icon-white icon-check"></i> eintragen
        </button>
    </form>
    <div class="alert alert-info alert-oben-big">
        <a href="#" class="close right" data-dismiss="alert">&times;</a>
        * Pflichtfeld
    </div>
</div>

<!-- Lesen -->

<div class="article_text c1" id="text_lesen">
    <?php
    $gb->Count();
    $gb->setMaxPage($gb->getCount());
    if ($gb->getCount() != 0) {
        if ($gb->getMaxPage() == 1) {
            foreach ($gb->GetAllFromGastBook(0) as $value) {
                ?>
    <fieldset class="kommentar" id="kommentar_<?php echo $value[Constans::ID]?>">
        <legend><?php echo $value[Constans::NAME]?></legend>
        <div>
            <p><?php echo $value[Constans::NACHRICHT]?></p>
            <div class="leerzeile"></div>
            <?php if(!empty($value[Constans::ADMIN_ANTWORT])){?>
            <div class="alert alert-success">                
                <strong><?php echo Constans::KW_NAME?>: </strong> <?php echo $value[Constans::ADMIN_ANTWORT]?>
            </div>
            <?php } ?>
            <?php if(!empty($value[Constans::EMAIL])){?>
            <div style="float: left"><i class="icon-envelope"> </i> <a href="mailto:<?php echo $value[Constans::EMAIL]?>"><?php echo $value[Constans::EMAIL]?> </a> </div>
            <?php } ?>
            <div style="float: right; margin-bottom: 5px;"><address ><?php echo $value[Constans::DT]?></address></div>
            
        </div>
    </fieldset>
                    <?php
            }
        }
    }else{
        //TODO: keine 
    }
    ?>
</div>