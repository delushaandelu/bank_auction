<?php 
require_once '../../library/config.php';
require_once '../library/functions.php';

$cityId = (int)$_GET['cityId'];
$sql = "SELECT id, bname 
		FROM tbl_banks 
		WHERE city = $cityId";
$result = dbQuery($sql);
$data = "";
$noOfRecords = dbNumRows($result);
if($noOfRecords > 0){
	$data = "<select name=txtBank class=box>\r\n";
	$data.= "<option value= selected=selected>-- Choose City --</option>\r\n";
	while($row = dbFetchAssoc($result)){
		extract($row);
		$data.= "<option value=".$id.">".$bname."</option>\r\n";
	}//while
	$data .= "</select>";
}else {
	$data .="<font color=red>No Bank Available in selected city.</font>";
}
echo $data;
?>