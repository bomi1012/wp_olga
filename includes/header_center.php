<?php
$width = "190px";
if ($model->getPage() == Constans::PAGE_INDEX) {
    $width = "250px";
}
?>
<div class="block_center">
    <div class="bild_gross">
         <a href="http://www.tagesmutter-landau.de">
        <img src="<?php echo Constans::IMAGE_PATCH ?>tm_rotes_kappchen_gross_2.png" alt="<?php echo Constans::KW_ROTKAEPPCHEN . " " . Constans::KW_TAGESMUTTER ?>" style="width: <?php echo $width; ?>">
    </a>
        </div>
    <div style="float: left;">
        <img class="img_sonne_big" src="<?php echo Constans::IMAGE_PATCH ?>tm_sonne.png" alt="<?php echo Constans::KW_SONNE . " " . Constans::KW_TAGESMUTTER?>">
        <div style="margin-top: -40px; ">                                
            <span  class="bonbon bonbon_klein red" style="line-height: 1; margin-left: -55px;"><?php echo Constans::KW_BETREUUNG ?></span>
        </div>
        <div style="padding-top: 25px;">                                
            <span  class="bonbon bonbon_gross red" style="line-height: 1"><?php echo Constans::KW_ROTKAEPPCHEN ?></span>
        </div>
        <?php if ($model->getPage() == Constans::PAGE_INDEX) { ?>
            <div class="text_center">
                <blockquote>
                    <p style="font-size: 16px;">
                        <?php echo Constans::TEXT_CENTER_1 . Constans::TEXT_CENTER_2 ?>
                    </p>
                </blockquote>
            </div>
        <?php } ?>
    </div>
</div>