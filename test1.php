<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

require_once 'library/pagination.class.php';
//if(!isset($_GET['page']))
	$sql = "SELECT a.id, b.bname, c.city, a.pdetails, a.paddress, a.p_image_thumb, a.res_price, a.status, cat.cname
				FROM tbl_auctions a, tbl_banks b, tbl_cities c, tbl_categories cat
				WHERE a.cid = c.id AND a.bid = b.id AND a.cat_id = cat.id AND a.cid = 1 
				ORDER BY a.id DESC";
$rowsPerPage = 3;
$queryString = '';
$rows     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

echo "<pre>";
echo $sql."<br/>";
//$r1 =  dbFetchAssoc($rows);
//echo 'Count : '.count($r1).'<br/>';
//print_r($r1);
echo "</pre>";

//$cityList = getAuctionPropertiesById('city',$_GET['cid']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/print.css" type="text/css" media="print">
<script language="javascript" src="<?php echo WEB_ROOT; ?>javascript/jquery.min.js" ></script>
<script language="javascript">
	$(document).ready(function(){
		$('div#listBox').hover(
			function(){
				$(this).addClass('mouseHover');
			//	alert('Hover...');
			},
			function(){
				$(this).removeClass('mouseHover');
			});//hover
	});//ready
</script>
<style>
/* util css classes*/
.mouseHover{ background:#EAF4F5;}
#listBox {font-family:Verdana,Arial,Sans-Serif;font-size:12px;padding-left:8px; border-bottom:#999999 dashed 1px;}
#listBox .title { text-align:left; font-size:12px; font-weight:bold; padding:5px; padding-left:8px;  padding-bottom:15px; color:#0066B3;}
#listBox p { padding-left:10px;}
#listBox ul li{ list-style:none; display:block; padding-bottom:4px;}
#listBox a { font-size:14px; text-decoration:underline;}
#listBox a:hover { font-size:14px; text-decoration:none;}
#listBox b{text-decoration:underline;}
#listBox img.thumb { float:left; padding-right:10px; padding-bottom:30px;}
#listBox #content1 {float:right; }
.numbers {line-height: 20px;word-spacing: 4px;font-size:12px; margin-top:10px;}
.numbers a {padding:4px 8px;border:#999999 1px solid;background-color:#EAF4F5; text-decoration:none;}
.numbers a:hover {padding:4px 8px;border:#999999 1px solid;background-color:#094080;color:#FEFEFE;}

.pageBox {line-height: 20px;word-spacing: 4px;font-size:12px; margin-top:10px;}
.pageBox a {padding:4px 8px;border:#999999 1px solid;background-color:#EAF4F5; text-decoration:none;}
.pageBox a:hover {padding:4px 8px;border:#999999 1px solid;background-color:#094080;color:#FEFEFE;}

#auctionBox { padding:20px;}

</style>
</head>

<body>
<div class="container">
<div class="span-13">
<?php 
while($row = dbFetchAssoc($rows)) {
extract($row);
?>
<div id="listBox">    
<div class="title">
<a href="<?php echo ''; ?>"><?php echo $pdetails; ?></a>
</div>
<a href="<?php echo ''; ?>"><img src="<?php echo WEB_ROOT; ?><?php echo $p_image_thumb; ?>" class="thumb" title="<?php echo ''; ?>" alt="<?php echo ''; ?>"/></a>
<div id="content">
<b>Property Details :</b>&nbsp;<?php echo $pdetails; ?><br/>
<b>Address :</b>&nbsp;&nbsp;<?php echo $paddress; ?><br/>
<b>Bank :</b>&nbsp;&nbsp;<font color="#FF3399"><?php echo $bname; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;
<b>City Name :</b>&nbsp;&nbsp;<font color="#FF0000"><?php echo $city; ?></font><br/>
<b>Reserved Price :</b>&nbsp;&nbsp;<font color="#0000FF"><?php echo $res_price; ?>&nbsp;Rs.</font>&nbsp;&nbsp;&nbsp;&nbsp;
<b>Status :</b>&nbsp;&nbsp;<?php echo $status; ?><br/><br/>
</div>	
</div><!-- listBox-->
<?php 
}//for
?>
</div><!-- span-13 -->
</div>
<?php 
echo $pagingLink;
   ?>
<?php 
echo '<pre>';
//print_r($cityList);
echo '</pre>'; ?>
</body>
</html>
