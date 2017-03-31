<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// make sure a category id exists
if (isset($_GET['cId']) && (int)$_GET['cId'] > 0) {
	$cId = (int)$_GET['cId'];
} else {
	header('Location:index.php');
}	
	
$sql = "SELECT id, city, state
		FROM tbl_cities
		WHERE id = $cId";
$result = dbQuery($sql);
$row = dbFetchAssoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processCategory.php?action=modify&cId=<?php echo $cId; ?>" method="post" enctype="multipart/form-data" name="frmCategory" id="frmCategory">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">City Name</td>
   <td class="content"><input name="txtName" type="text" class="box" id="txtName" value="<?php echo $city; ?>" size="30" maxlength="50"></td>
  </tr>
  <tr> 
   <td width="150" class="label">State</td>
   <td class="content"><input name="txtState" type="text" class="box" id="txtState" value="<?php echo $state; ?>" size="30" maxlength="50" readonly="true" /></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Save Modification" onClick="checkCategoryForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">
 </p>
</form>