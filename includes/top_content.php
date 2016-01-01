<div class="wrapper" style="position: relative; overflow: visible">
    <div class="schmetterling">       
        <img class="" src="<?php echo Constans::IMAGE_PATCH ?>/tm_schmetterling.png" alt="<?php echo Constans::KW_SCHMETTERLING ?>">
    </div>
</div>
<div class="wrapper">
    <div class="breadCrumbHolder module">
        <div id="breadCrumb3" class="breadCrumb module">
            <ul id="ul_<?php echo $model->getPage();?>">
                <?php echo $model->getBreadCrums(); ?>
            </ul>
        </div>
    </div>
</div>
<div class="wrapper" >
    <div class="box bot pad_bot2">
        <div class="pad">
            <article class="col1"><?php include Constans::TEXT_PATCH . "c1_" . $model->getPage() . Constans::PHP ?>
            </article>
            <article class="col2 pad_left1">
                <div class="wrapper">
                    <?php include Constans::TEXT_PATCH . "c2_" . $model->getPage() . Constans::PHP ?> 
                </div>
            </article>
        </div>
    </div>                 
</div>