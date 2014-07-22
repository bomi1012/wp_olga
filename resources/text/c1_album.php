<?php
$root = "album";
$sep = "/";
$album = new AlbumManager();
$albumTitle = $album->getAlbumUsingGET('jahr');
$album->albumInit(Constans::ALBUM_PATCH, $root . $sep . $albumTitle);
//$album->paginationBuilder(12, 'page');
?>
<h1> <?php echo $album->getTitle($albumTitle); ?> </h1>
<div class="article_text span8">  
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