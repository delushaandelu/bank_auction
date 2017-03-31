<?php 
require_once 'library/pagination.class.php';
$pagination = new pagination;
if (count($cityList)) {
$cityListPages = $pagination->generate($cityList, 6);
if (count($cityListPages) != 0) {
foreach ($cityListPages as $cityRecord) {
extract($cityRecord);
?>
<div id="listBox">    
<div class="title">
	<a href="<?php echo $url; ?>"><?php echo $pro_name; ?></a>
</div>
<a href="<?php echo $url; ?>"><img src="<?php echo WEB_ROOT; ?><?php echo $p_image_thumb; ?>" class="thumb" title="<?php echo $pro_name; ?>" alt="<?php echo $pro_name; ?>"/></a>
<div id="content">
<b>Property Details :</b>&nbsp;<?php echo $pro_desc; ?><br/>
<b>Address :</b>&nbsp;&nbsp;<?php echo $pro_address; ?><br/>
<b>Bank :</b>&nbsp;&nbsp;<font color="#FF3399"><?php echo $bank_name; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;
<b>City Name :</b>&nbsp;&nbsp;<font color="#FF0000"><?php echo $city_name; ?></font><br/>
<b>Reserved Price :</b>&nbsp;&nbsp;<font color="#0000FF"><?php echo $res_price; ?>&nbsp;Rs.</font>&nbsp;&nbsp;&nbsp;&nbsp;
<b>Status :</b>&nbsp;&nbsp;<?php echo $p_status; ?><br/><br/>
</div>	
</div><!-- listBox-->
<?php 
}//for
echo $pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';
}//if
}//if
else {
?>
<p style="padding:10px 40px; color:#FF0000;font-size:16px;font-weight:bold;">Sorry! No Records Found...</p>
<?php
}
?>

