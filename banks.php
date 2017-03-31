<?php 
require_once 'library/config.php';
require_once 'library/functions.php';
require_once 'admin/library/functions.php';
require_once 'library/pagination.class.php';
$bankId = (int)$_GET['bankId'];
//echo $catId;
$cityList = getAuctionPropertiesById('banks',$bankId);
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
.searchByCity {height:26px; padding-bottom:20px; margin:5px;color:#094080; border-bottom:solid 1px #094080; font-weight:bold;}
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
	$('div#listBox').hover(
			function(){
				$(this).addClass('mouseHover');
			},
			function(){
				$(this).removeClass('mouseHover');
			}
	);//hover
});
function doSearchByBank(bId){
	window.location.href = '<?php echo WEB_ROOT; ?>Bank-Type/Bank-b' + bId+'.html';
}
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
	

<div class="searchByCity">
Search Auction By Bank 
  <select name="cityId" onchange="doSearchByBank(this.value);">
<option value="s" selected="selected"> -- Select a Bank -- </option>
<?php echo buildBankOptions(); ?>
</select>
</div>
<div class="span-13">
<?php include('list.php'); ?>
</div>
<!-- span-13 -->
	

</div>

<div class="span-6 last">
	<?php include('slider.php'); ?>

<hr/>
      <?php include('footer.php'); ?>
	  
</div>

</body>
</html>