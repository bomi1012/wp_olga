<?php
$gbService = new GastBookService();
if (isset($_POST["submit"])) {
    $gbModel = new GastBookModel();
    $name = $model->Umlaute($_POST[Constans::NAME]);
    $nachricht = $model->Umlaute($_POST[Constans::NACHRICHT]);
    $gbModel->setFromForm($name, $_POST[Constans::EMAIL], $nachricht);
    $gbService->InsertInDB($gbModel);
    if (is_numeric($gbModel->getId()) && $gbModel->getId() > 0) {
        $gbService->NachrichtSenden($gbModel)
        ?>
        <div class="alert alert-info alert-oben">
            <a href="#" class="close right" data-dismiss="alert">&times;</a>
            <strong>Vielen Dank!</strong> Ihr Kommentar wird nach dem Pr&uuml;fen ver&ouml;ffentlicht
        </div>
        <?php
    }
}
?>
<!-- Lesen -->
<div class="article_text c1" id="text_lesen">
    <?php
    $gbService->Count();
    $gbService->setMaxPage($gbService->getCount());
    if ($gbService->getCount() != 0) {
        if ($gbService->getMaxPage() == 1) {
            foreach ($gbService->GetAllFromGastBook(0) as $value) {
                ?>
    <div class="show_1">
                <fieldset class="kommentar" id="kommentar_<?php echo $value->getId() ?>">
                    <legend><?php echo $value->getName() ?>
                        <address class="right size-14 adress-gastbook"><?php echo $value->getDateTime() ?></address>
                        <?php $em = $value->getEmail();
                        if (!empty($em)) {
                            ?>            
                            <a href="mailto:<?php echo $value->getEmail() ?>" class="no-hover right size-14"><i class="icon-envelope-alt black"> </i></a>                  
            <?php } ?>

                    </legend>
                    <div class="padding-bottom-20">
                        <p class="padding-left-30"><?php echo $value->getMessage() ?></p>
                        <?php
                        $an = $value->getAdminAntwort();
                        if (!empty($an)) {
                            ?>
                            <div class="alert alert-success">                
                                <strong><?php echo Constans::KW_NAME ?>: </strong> <?php echo $value->getAdminAntwort(); ?>
                            </div>
                <?php } ?>
                    </div>
                </fieldset>
        </div>
                <?php
            }
        }
    } else {
        //TODO: keine 
    }
    ?>
</div>


<!-- Erstellen -->

<div class="article_text c1" id="text_erstellen">
    <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">
        <label><?php echo Constans::NAME ?>*:</label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            <input required type="text" id="id_<?php echo Constans::NAME ?>" name="<?php echo Constans::NAME ?>">
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