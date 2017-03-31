// JavaScript Document
function checkCategoryForm()
{
    with (window.document.frmCategory) {
		if (isEmpty(txtName, 'Enter city name')) {
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

function modifyCity(catId)
{
	window.location.href = 'index.php?view=modify&cId=' + catId;
}

function deleteCity(catId)
{
	if (confirm('Deleting City will also delete all records in it.\nContinue anyway?')) {
		window.location.href = 'processCategory.php?action=delete&cId=' + catId;
	}
}

function deleteImage(catId)
{
	if (confirm('Delete this image?')) {
		window.location.href = 'processCategory.php?action=deleteImage&catId=' + catId;
	}
}