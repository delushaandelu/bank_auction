<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT id, name, bdate, is_admin
        FROM tbl_users
		ORDER BY name";
$result = dbQuery($sql);

?> 
<p>&nbsp;</p>
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>User Name</td>
   <td width="120">Register Date</td>
   <td width="120">Last login</td>
   <td width="120">Change Password</td>
   <td width="70">Delete</td>
  </tr>
<?php
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
   <td><?php echo $name; ?></td>
   <td width="120" align="center"><?php echo $bdate; ?></td>
   <td width="120" align="center"><?php echo $is_admin; ?></td>
   <td width="120" align="center"><a href="javascript:changePassword(<?php echo $id; ?>);">Change Password</a></td>
   <td width="70" align="center"><a href="javascript:deleteUser(<?php echo $id; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="addUser()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>