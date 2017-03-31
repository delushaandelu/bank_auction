<?php 
require_once 'library/config.php';
require_once 'library/functions.php';
$aucData = auctionPropertiesById((int)$_GET['a']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bank Auction Properties</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/menu.css" type="text/css">
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/print.css" type="text/css" media="print">
<script language="javascript" src="<?php echo WEB_ROOT; ?>javascript/jquery.min.js"></script>
<script language="javascript" src="<?php echo WEB_ROOT; ?>javascript/jquery.bxSlider.js"></script>
<script language="javascript" src="<?php echo WEB_ROOT; ?>javascript/jcarousellite_1.0.1.js"></script>    
<!--[if IE]>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<style>
body{ margin-top:10px; background:#ffffff url(<?php echo WEB_ROOT; ?>images/bg-body.jpg) repeat-x; }
#auctionBox { padding:20px; font-size:12px;}
#auctionBox b { text-decoration:underline; }
#auctionBox .title { text-align:left; font-size:18px; font-weight:bold; padding:5px; padding-bottom:15px; color:#FF3300; }
#green { color:#00FF00; font-size:16px; font-weight:bold;}
#red { color:#FF0000 font-size:16px; font-weight:bold;}
</style>
<script type="text/javascript">
	$(document).ready(function(){
        $(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:500,
		speed:1000
	});
});
</script>
<style>
</style>
</head>

<body>

<div class="container">
	<div id="header" class="span-24">
		<img src="<?php echo WEB_ROOT; ?>images/logo.jpg" />
    </div>
 <?php include('menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  	<?php include('left.php');?>
	
    </div>
  <div id="content" class="span-13 border">

<div class="span-13">
<?php 
if(isset($aucData)){
extract($aucData[0]);
?>
<div id="auctionBox">
<h3 class="title"><?php echo $a_pro_name; ?></h3>
<img src="<?php echo  $p_image; ?>" class="left" title="<?php echo $a_pro_name; ?>"  alt="<?php echo $a_pro_name; ?>"/>
<br/><br/><b>Property Address :</b><br/>&nbsp;<?php echo $pro_address; ?>
<br/><br/><b>Reserved Price :</b>&nbsp;&nbsp;<?php echo $res_price; ?>&nbsp;Rs.
<br/><br/><b>Bank Name :</b>&nbsp;&nbsp;<a href="<?php echo $bank_url; ?>"><?php echo $bank_name; ?></a>
<br/><br/><b>City Name :</b>&nbsp;&nbsp;<a href="<?php echo $city_url; ?>"><?php echo $city_name; ?></a>
<br/><br/><b>Property Category :</b>&nbsp;&nbsp;<a href="<?php echo $cat_url; ?>"><?php echo $cat_name; ?></a>
<br/><br/><b>Property Status :</b>&nbsp;&nbsp;<span id="<?php echo $statClass; ?>"><?php echo  strtoupper( $p_status); ?></span>
</div>
<?php 
}//if
?>

</div><!-- span-13 -->


</div>

<div class="span-6 last">
<?php include('slider.php'); ?>
<hr/>
<?php include('footer.php'); ?>
  
</div>

</body>
</html>