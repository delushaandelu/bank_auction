// JavaScript Document
function checkBankForm()
{
    with (window.document.frmCategory) {
		if (isEmpty(txtName, 'Enter Bank name')) {
			return;
		}else if (isEmpty(txtAddress, 'Enter Bank Address')) {
			return;
		}else if (isEmpty(txtPhone, 'Enter Bank Phone no')) {
			return;
		} else {
			submit();
		}
	}
}

function addCategory(parentId)
{
	targetUrl = 'index.php?view=add';
	if (parentId != 0) {
		targetUrl += '&parentId=' + parentId;
	}
	
	window.location.href = targetUrl;
}

function modifyBank(catId)
{
	window.location.href = 'index.php?view=modify&cId=' + catId;
}

function deleteBank(catId)
{
	if (confirm('Deleting Bank will also delete all records in it.\nContinue anyway?')) {
		window.location.href = 'processBank.php?action=delete&cId=' + catId;
	}
}

function deleteImage(catId)
{
	if (confirm('Delete this image?')) {
		window.location.href = 'processCategory.php?action=deleteImage&catId=' + catId;
	}
}