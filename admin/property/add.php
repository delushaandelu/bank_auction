<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

$categoryList = buildCategoryOptions($catId);
$cityList = buildCityOptions();
?> 
<p>&nbsp;</p>
<form action="processProperty.php?action=addProperty" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr>
    <td colspan="2" id="entryTableHeader">Add Property </td>
  </tr>
  <tr>
    <td class="label">City</td>
    <td class="content">
	<select name="txtCity" id="txtCity" class="box" onchange="addBankDetails(this.value);">
      <option value="" selected="selected">-- Choose City --</option>
      <?php
	echo $cityList;
?>
    </select></td>
  </tr>
  <tr>
    <td valign="top" class="label">Bank  </td>
    <td class="content">&nbsp;<div id="bankList"></div></td>
  </tr>
  <tr>
    <td class="label">Property Category</td>
    <td class="content"><select name="txtCategory" id="txtCategory" class="box">
        <option value="" selected="selected">-- Choose Category --</option>
        <?php
	echo $categoryList;
?>
      </select>    </td>
  </tr>
  <tr> 
   <td width="150" valign="top" class="label">Property Details </td>
   <td class="content"> <textarea name="txtName" cols="50" class="box" id="txtName"></textarea></td>
  </tr>
  <tr> 
   <td width="150" valign="top" class="label">Property Address </td>
   <td class="content"> <textarea name="txtAddress" cols="70" rows="5" class="box" id="txtAddress"></textarea></td>
  </tr>
  <tr> 
   <td width="150" class="label">Reserved Price</td>
   <td class="content"><input name="txtPrice" type="text" id="txtPrice" size="10" maxlength="7" class="box" onKeyUp="checkNumber(this);"> </td>
  </tr>
  <tr>
    <td class="label">Auction Date </td>
    <td class="content"><label>
      <input name="aucDate" type="text" id="aucDate" />
    </label></td>
  </tr>
  <tr>
    <td class="label">Auction Time </td>
    <td class="content"><input name="aucTime" type="text" id="aucTime" /></td>
  </tr>
  <tr> 
   <td width="150" class="label">Property Status</td>
   <td class="content"><select name="txtStatus">
   <option value="open"> Open </option>
   <option value="closed"> Closed </option>
   </select> </td>
  </tr>
  <tr> 
   <td width="150" class="label">Image</td>
   <td class="content"> <input name="fleImage" type="file" id="fleImage" class="box">    </td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Property" onClick="checkAddPropertyForm();" >
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" >  
 </p>
</form>
