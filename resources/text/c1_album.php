<?php
$album = new Album(Constans::ALBUM_PATCH, '1');
?>
<div class="article_text span">  
    <?php
    foreach ($album->get_dic() as $min => $big) {
        ?>
        <div class="left album_margin">
            <a title="" class="fancybox" rel="group" href="<?php echo $album->get_dir() ?>/<?php echo $big ?>">
                <img class="img-circle" style="width: 150px;" src="<?php echo $album->get_dir() ?>/<?php echo $min ?>" alt="Photo"></a>
        </div>
        <?php
    }
    ?>
</div>