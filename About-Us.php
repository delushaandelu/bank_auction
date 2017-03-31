<?php 
require_once 'library/config.php';
require_once 'library/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bank Auction Properties</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/print.css" type="text/css" media="print">
<script language="javascript" src="javascript/jquery.min.js"></script>
<script language="javascript" src="javascript/jquery.bxSlider.js"></script>
<script language="javascript" src="javascript/jcarousellite_1.0.1.js"></script>    
<!--[if IE]>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<style>
body{ margin-top:10px; background:#ffffff url(images/bg-body.jpg) repeat-x; }
#catBox1 { font-family:Verdana,Arial,Sans-Serif;font-size:12px; margin-top:10px;margin-bottom:10px;}
#catBox1 .title { text-align:left; font-size:16px; font-weight:bold; padding:5px; padding-left:20px; border-bottom:1px dashed #0066B3; color:#0066B3;}
.catBoxContent1 p { padding-left:10px; padding-top:10px; padding-right:10px; line-height:20px;}
.catBoxContent1 ul li{ list-style:none; display:block; padding-bottom:5px;}
.catBoxContent1 a { text-decoration:none;}

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
		<img src="images/logo.jpg" />
    </div>
 <?php include('menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  	<?php include('left.php');?>
	
    </div>
	
  <div id="content" class="span-13 border">
	
<div id="catBox1">    
<div class="title"> About Us.</div>
<div class="catBoxContent1">
<p><b style="color:#0033FF;">BankAuctionProperties</b> is a specialised portal for properties on auction by SriLankan banks. <b style="color:#0033FF;">BankAuctionProperties.com</b> is a division of XXXXX Pvt. Ltd., (www.xxxx.com) a leading provider of IT solutions and services for various businesses for over a decade.</p>
<p>For interested buyers of immovable properties, <b style="color:#0033FF;">BankAuctionProperties.com</b> is an one-stop shop providing listings of various categories of properties available on auction from different banks. It targets specific audiences and provides all the basic information required by the interested buyer on the property. They don't need to see different newspapers or browse different websites of the individual banks.
</p>
</div>
</div>

	
	  
	

<div class="span-12">
<div id="catBox">    
<div class="title"> Browse Property by Bank </div>
<div class="catBoxContent">
<p>Get the property auction details by bank. Just locate the bank you want to check and click to check the auction list available under clicked bank</p>
<ul>
<?php 
$bankList = propertyByBank();
for($i=0; $i<count($bankList);$i++){
extract($bankList[$i]);
?>
<li><a href="<?php echo $url; ?>" title="<?php echo $bname; ?>"><?php echo $bname; ?> - <?php echo $city; ?></a></li>
<?php 
} 
?>	
</ul>

</div> <!-- catBoxLeft-->
</div><!-- catBox-->
</div><!-- span-13 -->



<div class="span-12">
<div id="catBox">    
<div class="title"> Browse Property by City </div>
<div class="catBoxContent">
<p>Browse throws all the below city list to select your interested properties. To view the list of properties in specific city, just click on the link and you will be re-directed  to that city page.</p>

<ul>
<?php 
$cityList = propertyByCities();
for($i=0; $i<count($cityList);$i++){
extract($cityList[$i]);
?>
<li><a href="<?php echo $url; ?>" title="<?php echo $city; ?>"><?php echo $city; ?> - <?php echo $state; ?></a></li>
<?php 
} 
?>	
</ul>

</div> <!-- catBoxLeft-->
</div><!-- catBox-->
</div><!-- span-13 -->

</div>

<div class="span-6 last">
	<?php include('slider.php'); ?>

<hr/>
      <?php include('footer.php'); ?>
	  
</div>

</body>
</html>