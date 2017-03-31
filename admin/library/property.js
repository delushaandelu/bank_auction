// JavaScript Document
function viewProduct()
{
	with (window.document.frmListProduct) {
		if (cboCategory.selectedIndex == 0) {
			window.location.href = 'index.php';
		} else {
			window.location.href = 'index.php?catId=' + cboCategory.options[cboCategory.selectedIndex].value;
		}
	}
}
function addBankDetails(cityId){
	//jquery code to get bank in that city
	//alert('City ID : '+cityId);
	var url = "ajaxPro.php?cityId="+cityId;
	var dataToSend = null;
	var callback = function(data){
		$('#bankList').html(data);
	};
	var typeOfDataToReceive = 'html';
	$.get(url,dataToSend,callback,typeOfDataToReceive);
}


function checkAddPropertyForm()
{
	with (window.document.frmAddProduct) {
		if (txtCategory.selectedIndex == 0) {
			alert('Choose the property category');
			txtCategory.focus();
			return;
		}else if (txtCity.selectedIndex == 0) {
			alert('Choose the property city');
			txtCity.focus();
			return;
		} else if (txtBank.selectedIndex == 0) {
			alert('Choose the Bank');
			txtBank.focus();
			return;
		} else if (isEmpty(txtName, 'Enter Property name')) {
			return;
		} else if (isEmpty(txtAddress, 'Enter Property Address')) {
			return;
		} else if (isEmpty(txtPrice, 'Enter Property Price')) {
			return;
		} else if (isEmpty(aucDate, 'Enter Auction Date')) {
			return;
		} else if (isEmpty(aucTime, 'Enter Auction Time')) {
			return;
		} else {
			submit();
		}
	}
}

function addProduct(catId)
{
	window.location.href = 'index.php?view=add&catId=' + catId;
}

function modifyProperty(proId)
{
	window.location.href = 'index.php?view=modify&proId=' + proId;
}

function deleteProperty(proId)
{
	if (confirm('Delete this Property?')) {
		window.location.href = 'processProperty.php?action=deleteProperty&proId=' + proId ;
	}
}

function deleteImage(productId)
{
	if (confirm('Delete this image')) {
		window.location.href = 'processProduct.php?action=deleteImage&productId=' + productId;
	}
}