<?php
require_once 'config.php';
require_once 'common.php';

function getPropertyCategories($count=10){
	$sql = "SELECT id, cname
	        FROM tbl_categories";
    $result = dbQuery($sql);
    $rows = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		$rows[] = array('id'   => $id,
						'cname' => $cname,
		                'url' => create_final_url('property type',$cname,$id,'c')
					    );
	   }
	return $rows;			
}

function propertyByBank($count=10){
	$sql = "SELECT b.id, b.bname, c.city
	        FROM tbl_banks b, tbl_cities c
			WHERE b.city = c.id
			LIMIT 0, $count";
    $result = dbQuery($sql);
    $rows = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		$rows[] = array('id'   => $id,
						'bname' => $bname,
		                'url' => create_final_url('bank property',$bname,$id,'b'),
						'city' => $city
					   );
	   }
	return $rows;			
}

function propertyByCities($count=10){
	$sql = "SELECT id, city, state
	        FROM tbl_cities
			ORDER BY city
			LIMIT 0, $count";
    $result = dbQuery($sql);
    $rows = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		$rows[] = array('id'   => $id,
						'city_name' => $city,
		                'url' => create_final_url('city property',$city,$id,'p'),
						'city' => $city,
						'state' => $state,
					   );
	   }
	return $rows;			
}

function getAuctionPropertiesById($type, $id, $noOfRecords = 50) {
	$sqlToken = "";
	$sql = "";
	if($type == 'city'){
		$sqlToken = " AND a.cid = $id";
	}else if($type == 'category') {
		$sqlToken = " AND a.cat_id = $id";
	}else if($type == 'banks'){
		//for bank
		$sqlToken = " AND a.bid = $id";
	}
	
	$sql = "SELECT a.id, b.bname, c.city, a.pdetails, a.paddress, a.p_image_thumb, a.res_price, a.status, cat.cname
				FROM tbl_auctions a, tbl_banks b, tbl_cities c, tbl_categories cat
				WHERE a.cid = c.id AND a.bid = b.id AND a.status = 'open' AND  a.cat_id = cat.id $sqlToken 
				ORDER BY a.id DESC
				LIMIT 0, $noOfRecords";
	$result = dbQuery($sql);
    $rows = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		$rows[] = array('id'   => $id,
						'bank_name' => $bname,
						'city_name' => $city,
						'pro_name' => substr($pdetails,0,50).'...',
						'pro_desc' => trim($pdetails),
						'pro_address' => $paddress,
						'p_image_thumb' => 'images/property/'.$p_image_thumb,
						'pro_address' => $paddress,
						'res_price' => $res_price,
						'p_status' => $status,
						'cat_name' => $cname,
		                'url' => create_final_url('auction detail',substr(trim($pdetails),0,60),$id,'a')
					   );
	}//while
	return $rows;
}//getAuctionPropertiesById

function auctionPropertiesById($id) {
	$sql = "SELECT a.id, b.bname, b.id as bank_id ,c.id as city_id, c.city, a.pdetails, a.paddress, 
			a.p_image, a.res_price, a.status, cat.cname, cat.id as cat_id
			FROM tbl_auctions a, tbl_banks b, tbl_cities c, tbl_categories cat
			WHERE a.cid = c.id AND a.bid = b.id AND a.cat_id = cat.id AND a.id = $id";
	$result = dbQuery($sql);
	$img_path= "";
	$statClass = "";
    $rows = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		if($p_image == "" ||  strlen($p_image) < 1) {
			$img_path= WEB_ROOT . 'images/no-image-large.png';
		}else {
			$img_path= WEB_ROOT . 'images/property/'.$p_image;
		}
		
		if($status == 'open') { $statClass = "green";}
		else { $statClass = "red";}
		$rows[] = array('id'   			=> $id,
						'bank_name' 	=> $bname,
						'bank_url'		=> create_final_url('bank property',$bname,$bank_id,'b'),
						'city_name' 	=> $city,
						'city_url'		=> create_final_url('city property',$city,$city_id,'p'),
						'a_pro_name' 	=> $pdetails,
						'pro_address' 	=> $paddress,
						'p_image' 		=> $img_path,
						'res_price' 	=> $res_price,
						'p_status' 		=> $status,
						'cat_name' 		=> $cname,
						'statClass' 	=> $statClass,
						'cat_url' => create_final_url('property type',$cname,$cat_id,'c')
					   );
	}//while
	return $rows;
}//auctionPropertiesById


function sliderContent($no = 10){
	$sql = "SELECT a.id, b.bname, c.city, a.pdetails, a.res_price, a.status
			FROM tbl_auctions a, tbl_banks b, tbl_cities c, tbl_categories cat
			WHERE a.cid = c.id AND a.bid = b.id AND a.cat_id = cat.id AND a.status = 'open' 
			ORDER BY a.id DESC 
			LIMIT 0, $no";
	$result = dbQuery($sql);
    $rows = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		$rows[] = array('id'   => $id,
						'bank_name' => $bname,
						'city_name' => $city,
						'pro_name' => trim($pdetails),
						'res_price' => $res_price,
						'url' => create_final_url('auction detail',substr(trim($pdetails),0,60),$id,'a')
					   );
	}//while
	return $rows;
}

/*
	Return the current category list which only shows
	the currently selected category and it's children.
	This function is made so it can also handle deep 
	category levels ( more than two levels )
*/
function formatCategories($categories, $parentId)
{
	// $navCat stores all children categories
	// of $parentId
	$navCat = array();
	
	// expand only the categories with the same parent id
	// all other remain compact
	$ids = array();
	foreach ($categories as $category) {
		if ($category['cat_parent_id'] == $parentId) {
			$navCat[] = $category;
		}
		
		// save the ids for later use
		$ids[$category['cat_id']] = $category;
	}	

	$tempParentId = $parentId;
	
	// keep looping until we found the 
	// category where the parent id is 0
	while ($tempParentId != 0) {
		$parent    = array($ids[$tempParentId]);
		$currentId = $parent[0]['cat_id'];

		// get all categories on the same level as the parent
		$tempParentId = $ids[$tempParentId]['cat_parent_id'];
		foreach ($categories as $category) {
		    // found one category on the same level as parent
			// put in $parent if it's not already in it
			if ($category['cat_parent_id'] == $tempParentId && !in_array($category, $parent)) {
				$parent[] = $category;
			}
		}
		
		// sort the category alphabetically
		array_multisort($parent);
	
		// merge parent and child
		$n = count($parent);
		$navCat2 = array();
		for ($i = 0; $i < $n; $i++) {
			$navCat2[] = $parent[$i];
			if ($parent[$i]['cat_id'] == $currentId) {
				$navCat2 = array_merge($navCat2, $navCat);
			}
		}
		
		$navCat = $navCat2;
	}


	return $navCat;
}

/*
	Get all top level categories
*/
function getCategoryList()
{
	$sql = "SELECT cat_id, cat_name, cat_image
	        FROM tbl_category
			WHERE cat_parent_id = 0
			ORDER BY cat_name";
    $result = dbQuery($sql);
    
    $cat = array();
    while ($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($cat_image) {
			$cat_image = WEB_ROOT . 'images/category/' . $cat_image;
		} else {
			$cat_image = WEB_ROOT . 'images/no-image-small.png';
		}
		
		$cat[] = array('url'   => $_SERVER['PHP_SELF'] . '?c=' . $cat_id,
		               'image' => $cat_image,
					   'name'  => $cat_name);

    }
	
	return $cat;			
}

/*
	Fetch all children categories of $id. 
	Used for display categories
*/
function getChildCategories($categories, $id, $recursive = true)
{
	if ($categories == NULL) {
		$categories = fetchCategories();
	}
	
	$n     = count($categories);
	$child = array();
	for ($i = 0; $i < $n; $i++) {
		$catId    = $categories[$i]['cat_id'];
		$parentId = $categories[$i]['cat_parent_id'];
		if ($parentId == $id) {
			$child[] = $catId;
			if ($recursive) {
				$child   = array_merge($child, getChildCategories($categories, $catId));
			}	
		}
	}
	
	return $child;
}

function fetchCategories()
{
    $sql = "SELECT cat_id, cat_parent_id, cat_name, cat_image, cat_description
	        FROM tbl_category
			ORDER BY cat_id, cat_parent_id ";
    $result = dbQuery($sql);
    
    $cat = array();
    while ($row = dbFetchAssoc($result)) {
        $cat[] = $row;
    }
	
	return $cat;
}

?>