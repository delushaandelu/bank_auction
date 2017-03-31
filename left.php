<?php 
$rows = getPropertyCategories();
?>
<div id="navcontainer">
<ul>
<?php 
for($i=0; $i<count($rows);$i++){
extract($rows[$i]);
?><li><a href="<?php echo $url; ?>" title="<?php echo $cname; ?>"><?php echo $cname; ?></a></li>
<?php } ?>
</ul>
</div>

<div id="proAdd">
<p><b>World's best homes</b>
<br/>
<img src="<?php echo WEB_ROOT; ?>images/res-houses.jpg" align="middle"/><br/>
Our company G.S. Log homes Ltd. is offering the opportunity of building your dream home in the best alternative way in utilising whole timber logs, creating beautiful, natural features using one of the many pre designs or custom made designs.</p>
</div>
