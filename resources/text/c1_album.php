<?php
$root = "album";
$sep = "/";
if (isset($_GET['jahr'])) {
    $albumTitle = $_GET['jahr'];
} else {
    $albumTitle = "2013";
}

$album = new AlbumManager(Constans::ALBUM_PATCH, $root . $sep . $albumTitle);
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