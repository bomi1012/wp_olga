<title><?php echo $model->getTitle(); ?></title>
<META NAME="<?php echo Constans::ELEMENT_KEYWORDS; ?>" CONTENT="<?php echo $model->getKeywords(); ?>">
<META NAME="<?php echo Constans::ELEMENT_DESCRIPTION; ?>" CONTENT="<?php echo $model->getDescription(); ?>">
<?php if ($model->getPage() == Constans::PAGE_ADMIN){ ?>
<META NAME="Robots" CONTENT="NOINDEX,NOFOLLOW">
<?php } else { ?>
<META NAME="Robots" CONTENT="INDEX,FOLLOW">
<?php } ?>
<META NAME="Language" CONTENT="Deutsch">
<meta http-equiv="content-type" content="text/html" charset="UTF-8">
<link rel="stylesheet" href="resources/css/BreadCrumb.css" type="text/css" media="all">
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="resources/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="resources/css/bootstrap.css" type="text/css" media="all">
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="all">
<!--
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
-->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="resources/css/font-awesome.css" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Bonbon' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Butterfly+Kids' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="resources/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="resources/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="resources/js/jquery.jBreadCrumb.1.1.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>

<link rel="shortcut icon" href="resources/icons/favicon.ico" >
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="resources/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="resources/fancybox/source/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />
<script type="text/javascript" src="resources/fancybox/source/jquery.fancybox.pack.js?v=2.1.3"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="resources/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="resources/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="resources/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
<link rel="stylesheet" href="resources/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="resources/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!--http://www.plugolabs.com/twitter-bootstrap-button-generator/--> 
<!--        http://www.comparenetworks.com/developers/jqueryplugins/jbreadcrumb.html  -->

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery("#breadCrumb0").jBreadCrumb();
        jQuery("#breadCrumb1").jBreadCrumb();
        jQuery("#breadCrumb2").jBreadCrumb();
        jQuery("#breadCrumb3").jBreadCrumb();
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();                
    });
        
</script>


<script type="text/javascript">
$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: true,
		openEffect	: 'none',
		//closeEffect	: 'none'
	});
        
        
        
});

</script>