<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$sql ="SELECT id, city FROM tbl_cities";
$cities = dbQuery($sql);
?> 

<form action="processBank.php?action=add" method="post" enctype="multipart/form-data" name="frmCategory" id="frmCategory">
 <p align="center" class="formTitle">Add Bank</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Bank Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="50"></td>
  </tr>
  <tr>
    <td valign="top" class="label">Bank Address </td>
    <td class="content"><textarea name="txtAddress" cols="40" rows="4" class="box" id="txtAddress"></textarea></td>
  </tr>
  <tr>
    <td class="label">Phone No. </td>
    <td class="content"><input name="txtPhone" type="text" class="box" id="txtPhone" size="30" maxlength="50" /></td>
  </tr>
  <tr> 
   <td width="150" height="32" class="label">City</td>
   <td class="content"><select name="txtCity" id="txtCity" >
   <?php
   while($ro = dbFetchAssoc($cities)){
   ?>
   <option value="<?php echo $ro['id']; ?>"><?php echo $ro['city'];  ?></option>
   <?php }
   ?>
   </select>
   </td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Bank" onClick="checkBankForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php?view=list';" >  
 </p>
</form>