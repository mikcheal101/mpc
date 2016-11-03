<div class="container-fluid full-height background-image background-03">
    <div class="row full-height no-scroll">
        <div class="col-sm-3 full-height auto-scroll">
            <div class="background-right-text p-r-10 p-l-10">
                <h4 class="curly-text-2 font-30 font-normal-100 p-b-20 text-center text-white">Chefs Gallery</h4>
                <p class="text-center font-12">
                    “A great Chef is an Artist..” – Robert Stack
                </p>
                <p class="text-center font-14">
					Get to know our Culinary artists. Discover their creations, favourite ingredients, tips, techniques, and favourite markets. You can also contact for an exclusive experience.
                </p>
            </div>
        </div>
        <div class="col-sm-9 full-height auto-scroll background-white p-t-80 p-b-100 padding-30">
        	
        	<?php for($i=0,$j=0; $i<ceil(count($chefs) / 3); $i++) { ?>
			<div class="row right-gallery">
				<?php
					for ($k=0; $k<3; $k++, $j++) {
						if($j>=(count($chefs))) break;
						$chef = $chefs[$j];
						?>
						<div class="col-sm-4">
		                    <!-- <img src="<?=$meal->image_url;?>" class="img-responsive img-fluid" /> -->
		                    <div class="background-image img-orange-border" style="border-radius:5px; height:350px; background-image: url('http://mypersonalchef.com.ng/<?=$chef->chef->image_url;?>');"></div>
		                    <p>
		                    <p class="bold xlevel-1 font-13 text-black p-b-05 p-t-05">Chef <?=$chef->chef->username;?></p>
                                <p class="xlevel-1 font-normal-500 text-black p-b-05"><?=prepareTime($chef->chef->open_time);?> - <?=prepareTime($chef->chef->close_time);?></p>
                                <?=anchor("user/chefProfile/{$chef->chef->id}", 'View Profile', array('class'=>'xlevel-1 btn btn-block btn-sm btn-orange'));?>
		                    </p>
		                </div>
						<?php		
							
					} 
				?>
			</div>	
			<?php	} ?>
			
			
			<?php 
			
				function prepareTime ($str) {
					$suffix = "am";
					
					if ($str == 0) {
						$str = 12;
					} else if ($str >= 12) {
						$suffix = "pm";
					}
					
					if (strlen($str) < 2) return "0{$str} : 00 {$suffix}";
					else return "{$str} : 00 {$suffix}";
				}
			?>

        </div>
    </div>
</div>
        
        
        