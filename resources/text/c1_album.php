<?php
$root = "album";
$sep = "/";
$limit = 15;
$album = new AlbumManager();
$albumTitle = $album->getAlbumUsingGET('jahr');
$album->albumInit(Constans::ALBUM_PATCH, $root . $sep . $albumTitle);
//$pagination = ;

?>
<h1> <?php echo $album->getTitle($albumTitle); ?> </h1>
<div class="article_text span8">  
    <?php
    $nummer = 1;
    foreach ($album->getAllImages() as $min => $big) {        
        if ($album->isShow($nummer, $limit, $album->getCurrentPage())) { ?>
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
        $nummer = $nummer + 1;
    }
    ?>
</div>

<div class="article_text span8">  
 <?php echo $album->paginationBuilder($limit); ?>        
</div>