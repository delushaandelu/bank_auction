<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['cId']) && (int)$_GET['cId'] >= 0) {
	$cId = (int)$_GET['cId'];
	$queryString = "&cId=$cId";
} else {
	$cId = 0;
	$queryString = '';
}
	
// for paging
// how many rows to show per page
$rowsPerPage = 10;

$sql = "SELECT b.id, b.bname, c.city
        FROM tbl_banks b, tbl_cities c
		WHERE b.city = c.id";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);
?>
<h3>Bank Details</h3>
<form action="processCategory.php?action=addCategory" method="post"  name="frmListCategory" id="frmListCategory">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td width="622">Bank Name</td>
   <td width="524">City</td>
   <td width="75">Modify</td>
   <td width="75">Delete</td>
  </tr>
  <?php
$cat_parent_id = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
		
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $bname; ?></td>
   <td><?php echo $city; ?></td>
   <td width="75" align="center"><a href="javascript:modifyBank(<?php echo $id; ?>);">Modify</a></td>
   <td width="75" align="center"><a href="javascript:deleteBank(<?php echo $id; ?>);">Delete</a></td>
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
   <td colspan="5" align="center">No Bank Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"> <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Bank Details"  onClick="addCategory(<?php echo $cId; ?>)">   </td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>