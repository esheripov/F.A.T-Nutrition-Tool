<!DOCTYPE>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title></title>
	<link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../css/pretty_pop_up.css" />    
	<link rel='stylesheet' type='text/css' href='../../css/fullcalendar.css' />
	<link rel='stylesheet' type='text/css' href='../../css/fullcalendar.print.css' media='print' />
    <link rel="stylesheet" href="../../css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/buttons.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/buttons2.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/misc.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="../../css/1-simple-calendar/tcal.css">
	<script language="JavaScript" src="../../css/1-simple-calendar/tcal.js"></script>
    
    
	<script type="text/javascript" src="../../js/jquery-1.6.js" ></script>
	<SCRIPT LANGUAGE="JavaScript">
	var Image1 = new Image(); 
	Image1.src = "../../images/ajax-loader.gif";
    </SCRIPT>
</head>

<body id="page3">
	<div class="body1">
		<div class="body2">
			<div class="body5">
				<div class="main">
					<?php include('includes/header.html'); ?>
				</div>
			</div>
		</div>
    </div>

    <div class="body3">
        <div class="main">
        <!-- content -->
        <br>
            <center>
                <div id="loader" style="visibility:visible">
                    <img id="loading_image" src=""/><script> document.getElementById("loading_image").src = Image1.src; </script>
                </div>
            </center>
            <?php include('includes/popupcontact.html'); ?>
            <?php include('includes/faq.html'); ?>
            <?php include('includes/calendar.html'); ?>
            <?php include('includes/profile.php'); ?>  
            <?php include('includes/catalog.php'); ?>
            <?php include('includes/addtokitchen.php'); ?>
            <?php include('includes/mykitchen.php'); ?>
        </div>
    </div>

<?php include('includes/footer.html'); ?>
</body>
<script src="../../js/index.js"></script>
<script type='text/javascript' src='../../jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../../jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='../../js/fullcalendar.min.js'></script>
<script type="text/javascript" src="../../js/cufon-yui.js"></script>
<script type="text/javascript" src="../../js/cufon-replace.js"></script>
<script type="text/javascript" src="../../js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="../../js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="../../js/tabs.js"></script>
<?php include('includes/initiatestates.php');  ?>
<script> document.getElementById('loader').style.visibility = "hidden"; </script>
</html>
<script>


</script>