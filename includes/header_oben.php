<?php
$admin = AdminService::getInstance();
$admin->CoockieStatus();
/**
 * Если на странице Админ
 */
?>
<div class="bild_oben">
    <?php if ($admin->getStatus() == true) { ?>
        <div style="position: absolute; z-index: 100; float: left; top: 15px; margin-left: 40px;">
            <a href="<?php echo Constans::PAGE_ADMIN . Constans::PHP ?>" class="no-hover">
                <acronym title="Adminbereich">
                    <i class="icon-gears icon-large" style="color: #308da2" alt="Admin"></i>
                </acronym>
            </a>
        </div>
    <?php } ?>
    <a href="http://www.tagesmutter-landau.de">
        <img src="<?php echo Constans::IMAGE_PATCH ?>tm_kinder4.png" alt="<?php echo Constans::UEBERSCHRIFT_INDEX_1 . " " . Constans::KW_TAGESMUTTER ?>" class="img-header-oben">
    </a>
</div>
<div class="text_oben">
    <span  class="kids2" style="line-height: 1"><?php echo Constans::UEBERSCHRIFT_INDEX_1 ?><br/><?php echo Constans::UEBERSCHRIFT_INDEX_2 ?> 
    </span>
</div>