<?php 
require_once 'library/config.php';
require_once 'library/functions.php';
require_once 'library/pagination.class.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>PHP Array Pagination</title>
  <style>
  <!--
   body {
    font-family: Tahoma, Verdana, Arial, Sans-serif;
    font-size: 11px;
   }
   hr {
    border: 1px #ccc;
    border-style: none none solid none;
    margin: 20px 0;
   }
   a {
    color: #333;
    text-decoration: none;
   }
   a:hover {
    text-decoration: underline;
   }
   a.selected {
    font-weight: bold;
    text-decoration: underline;
   }
   .numbers {
		line-height: 20px;
		word-spacing: 4px;
		font-size:12px;
   }
   .numbers a {
		padding:4px 8px;
		border:#999999 1px solid;
		background-color:#F4F4F4;
   }
   .numbers a:hover {
		padding:4px 8px;
		border:#999999 1px solid;
		background-color:#181818;
		color:#FEFEFE;
   }
   
   
  //-->
  </style>
  </head>
  <body>
    <h1>PHP Array Pagination</h1>
    <hr  />
      <?php
        // Include the pagination class
        
        // Create the pagination object
        $pagination = new pagination;
        $products = getPropertyCategories();
        // some example data
        /*
		foreach (range(1, 40) as $value) {
          $products[] = array(
            'Product' => 'Product '.$value,
			'Id' => rand(1, 100),
            'Price' => rand(100, 1000),
          );
        }
        */
        // If we have an array with items
        if (count($products)) {
          // Parse through the pagination class
          $productPages = $pagination->generate($products, 4);
          // If we have items 
          if (count($productPages) != 0) {
            // Loop through all the items in the array
            echo "<table border=1 align=center>
					<tr><td>Product Id</td><td>Product Name</td><td>Price</td></tr>";
			foreach ($productPages as $productArray) {
			extract($productArray);
              // Show the information about the item
              echo '<tr>
			  		<td>'.$id.'</td>
			  		<td>'.$cname.'</td>
					<td>'.$url.'</td>
					</tr>';
            }
				echo '</table>';
            // print out the page numbers beneath the results
            //echo $pageNumbers;
			// Create the page numbers
            echo $pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';
            
          }
        }
      ?>
      <hr />
      <p><a href="http://www.lotsofcode.com/php/projects/php-array-pagination" target="_blank">PHP Array Pagination</a> provided by <a href="http://www.lotsofcode.com/" target="_blank">Lots of Code</a></p>
  </body>
</html>