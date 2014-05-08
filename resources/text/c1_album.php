<?php
$album = new AlbumManager(Constans::ALBUM_PATCH, '1');
?>
<div class="article_text span9">  
    <?php
    foreach ($album->getAllImages() as $min => $big) {
        ?>
        <div class="left album_margin">
            <a 
                class="fancybox" 
                rel="group" 
                href="<?php echo $album->getAlbum()->getDir() ?>/<?php echo $big ?>">
                <img 
                    class="img-circle" 
                    style="width: 150px;" 
                    src="<?php echo $album->getAlbum()->getDir() ?>/<?php echo $min ?>" 
                    alt="Photo">
            </a>
        </div>
        <?php
    }
    ?>
</div>