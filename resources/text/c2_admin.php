<div class="article_text">
    <h2 class="non-top-h2"><?php echo Constans::ADMIN ?></h2>
    <?php 
    if ($admin->getStatus() == true) {
        ?>
        <div id="text_logaus">
            <form class="form-horizontal" action='<?php echo $_SERVER['PHP_SELF'] ?>' method="POST" accept-charset="utf-8">
                <button type="submit" class="btn btn-danger leerzeichen right" name="sub_logaus">
                    <i class="icon-white icon-off"></i> auslogen
                </button>
            </form>
        </div>
        <?php }
    ?>
    <!--http://www.plugolabs.com/twitter-bootstrap-button-generator/--> 
</div>

