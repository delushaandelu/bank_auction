<div id="newsticker-demo">    
    <div class="title">Hot Auction Properties</div>
    <div class="newsticker-jcarousellite">
		<ul>
			<?php
			$conList = sliderContent();
			for($i=0; $i<count($conList);$i++){
			extract($conList[$i]);

			?>
			<li style="overflow: hidden; float: none; width: 200px;">
				<div class="info">
					<a class="heading" href="<?php echo $url; ?>"><?php echo $pro_name; ?></a>
					<span class="cat">
					<b>Bank :</b><?php echo $bank_name; ?><br/>
					<b>City :</b><?php echo $city_name; ?><br/>
					<b>Reserved Price :</b><?php echo $res_price; ?><br/>
					<a href="<?php echo $url; ?>" class="readmore">More Details</a></span>
				</div>
				<div class="clear"></div>
			</li>
			<?php 
			} 
			?>
		</ul>
    </div>
    
</div>
<div id="proAdd">
<p><b>Beautifully designed Residential House</b>
<br/>
<img src="<?php echo WEB_ROOT; ?>images/banglows.jpg" align="middle"/><br/>
Beautifully designed Residential House with 4Bedrooms, Hall, 4 Baths, Kitchen, Veranda, Ample space for Parking, Terrace, etc. Located in center of the BOPAL. 24 hour Water and Power supply.</p>
</div>
<br/><br/>	
</div>  