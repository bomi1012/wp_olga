<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="de">
    <?php
    include 'includes/classenRequire.php';
    $model = new Model(Constans::PAGE_GASTBOOK, 1);
    ?>
    <head>
        <?php include 'includes/head.php'; ?>
    </head>
    <body>
        <div class="main">
            <!-- header -->
            <header>
               <?php include 'includes/top_header.php';?>
            </header>
            <!-- content -->
            <section id="content">
                <?php include 'includes/top_content.php';?>
            </section>
            <!-- footer -->
            <footer>
                <?php include 'includes/footer.php';?>    
            </footer>
        </div>
    </body>
</html>
