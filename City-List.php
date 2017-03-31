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


<h3> Quisque a lectus.</h3>
    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas 
augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui 
mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec 
consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, 
gravida non, commodo a, sodales sit amet, nisi.</p>

 <p>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.</p>
    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, 
sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse 
commodo ullamcorper magna.</p>
	

</div>

<div class="span-6 last">
	<?php include('slider.php'); ?>

<hr/>
      <?php include('footer.php'); ?>
	  
</div>

</body>
</html>