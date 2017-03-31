<?php
if (!defined('WEB_ROOT')) {
	exit;
}


if (isset($_GET['catId']) && (int)$_GET['catId'] > 0) {
	$catId = (int)$_GET['catId'];
	$sql2 = " AND a.cat_id = $catId";
	$queryString = "catId=$catId";
} else {
	$catId = 0;
	$sql2  = '';
	$queryString = '';
}

// for paging
// how many rows to show per page
$rowsPerPage = 4;

$sql = "SELECT a.id, b.bname, c.city, a.pdetails, a.p_image_thumb, a.res_price
        FROM tbl_auctions a, tbl_banks b, tbl_cities c
		WHERE a.bid = b.id AND a.cid = c.id  $sql2
		ORDER BY a.id DESC";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

$categoryList = buildCategoryOptions($catId);

?> 
<p>&nbsp;</p>
<form action="processProduct.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">
 <table width="100%" border="0" cellspacing="0" cellpadding="2" class="text">
  <tr>
   <td align="right">View Auction Items in : 
    <select name="cboCategory" class="box" id="cboCategory" onChange="viewProduct();">
     <option selected>All Category</option>
	<?php echo $categoryList; ?>
   </select>
 </td>
 </tr>
</table>
<br>
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td width="676">Item Detail </td>
   <td width="171">Thumbnail</td>
   <td width="166">Bank / City </td>
   <td width="208">Price</td>
   <td width="70">Delete</td>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($p_image_thumb) {
			$p_image_thumb = WEB_ROOT . 'images/property/' . $p_image_thumb;
		} else {
			$p_image_thumb = WEB_ROOT . 'images/no-image-small.png';
		}	
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td style="padding-left:10px;" valign="top"><?php echo $pdetails; ?></td>
   <td width="171" align="center"><img src="<?php echo $p_image_thumb; ?>"></td>
   <td width="166" align="center"><b><?php echo $bname; ?></b><br/>(<?php echo $city; ?>)</td>
   <td width="208" align="center"><?php echo $res_price; ?>&nbsp;Rs.</td>
   <td width="70" align="center"><a href="javascript:deleteProperty(<?php echo $id; ?>);">Delete</a></td>
  </tr>
  <?php
	} // end while
?>
  <tr> 
   <td colspan="5" align="center">
   <?php 
echo $pagingLink;
   ?></td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No auction item Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Auction Item" onClick="addProduct(<?php echo $catId; ?>)"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>