<?php
$counted = count($chef->meals);
$x_count = ($counted/ 4);
$x_remainder = (count($chef->meals) % 4);
$counter = ($x_remainder > 0)? ($x_count + 1) : $x_count;
?>
<div style="background-color: #f2f2f2!important;">
	<div class="container-fluid no-border p-t-80 p-l-50 p-r-50">
		<div class="row">
			<div class="col-sm-3">
				<p class="col-sm-12">
					<div class="background-image" style="height: 250px; background-image: url('<?=base_url($chef->chef->image_url);?>'); border-radius: 5px!important;; -moz-border-radius: 5px!important;; -webkit-border-radius: 5px!important;"></div>
				</p>
				
				<p class="text-orange bold col-sm-12">Followers 345</p>
				
				<p class="text-orange col-sm-12"><span class="bold">Following</span> 345</p>
				<p class="text-orange col-sm-12">15 Orders</p>
				<p class="text-orange col-sm-12">10 Reviews</p>
				<p class="text-orange col-sm-12">Delivery Points</p>
				<a href="#" class="text-orange col-sm-12">Send Mail</a>
			</div>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-12" style="margin-top:-10px!important;">
						<div class="col-sm-9 bold font-30"><?=$chef->chef->fullname;?></div>
						<a class="col-sm-3 text-right text-orange" href="#">Follow</a>
					</div>
					<div class="col-sm-12">
						<span class="col-sm-12 font-20">African Cuisine Chef</span>
					</div>
					<div class="col-sm-12">
						<span class="col-sm-12 font-20">12th street, Urban street Abuja</span>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<p class="col-sm-12 font-20">About Me</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<p class="col-sm-12 ">
							Food is anything consumed to provide nutritional support to the body.
                            It is usually of plant or animal origin, and contains essential nutrients, such as
                            fats, protiens, vitamins or minerals.
                            
                            Food is anything consumed to provide nutritional support to the body.
                            It is usually of plant or animal origin, and contains essential nutrients, such as
                            fats, protiens, vitamins or minerals.
                            
                            Food is anything consumed to provide nutritional support to the body.
                            It is usually of plant or animal origin, and contains essential nutrients, such as
                            fats, protiens, vitamins or minerals.
                        </p>
                        <a class="col-sm-12 text-right text-orange">Read More...</a>
					</div>
				</div>
				
				<div class="row m-t-60">
					<div class="col-sm-12">
						<a href="<?=base_url('user/newDishes');?>" class="col-sm-3 text-center text-orange">
							<i class="font-1-4 icon-new-dishes"></i>
							<p class="p-t-20">Latest Creations</p>
						</a>
						<a href="<?=base_url('user/cookingTips');?>" class="col-sm-3 text-center text-orange">
							<i class="font-1-4 icon-cooking-tips"></i>
							<p class="p-t-20">Cooking Techniques & Ingreidients</p>
						</a>
						<a href="<?=base_url('user/ingredientsOfTheMonth');?>" class="col-sm-3 text-center text-orange">
							<i class="font-1-4 icon-ingredients-of-the-month"></i>
							<p class="p-t-20">Ingreidients of the month</p>
						</a>
						<a href="<?=base_url('user/shoppingMarkets');?>" class="col-sm-3 text-center text-orange">
							<i class="font-1-4 icon-shopping-markets"></i>
							<p class="p-t-20">Shopping Tips</p>
						</a>
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="row p-t-30">
			<div class="col-sm-12">
				<h4 class="col-sm-3">Chef Updates</h4>
				<span class="col-sm-3 col-sm-offset-6 text-right">3 Updates</span>	
			</div>
		</div>
		
		<?php if($x_count > 0):?>
		<div class="row p-t-30">
			<div class="col-sm-12">
				
				<?php if ($counted > 0){ $meal = $chef->meals[0];?>
				<div class="col-sm-4">
					<div class="background-image" style="background-image: url('<?=$meal->image_url;?>'); height: 300px; border-radius: 5px!important;; -moz-border-radius: 5px!important;; -webkit-border-radius: 5px!important;"></div>
					<br>
					<p class="bold"><?=$meal->name;?></p>
					<p class=""><?=base64_decode($meal->comment);?></p>
				</div>
				<?php } if ($counted > 1){ $meal = $chef->meals[1]; ?>
				<div class="col-sm-4">
					<div class="background-image" style="background-image: url('<?=$meal->image_url;?>'); height: 300px; border-radius: 5px!important;; -moz-border-radius: 5px!important;; -webkit-border-radius: 5px!important;"></div>
					<br>
					<p class="bold"><?=$meal->name;?></p>
					<p class=""><?=base64_decode($meal->comment);?></p>
				</div>
				<?php } if ($counted > 2) { $meal = $chef->meals[2]; ?>
				<div class="col-sm-4">
					<div class="background-image" style="background-image: url('<?=$meal->image_url;?>'); height: 300px; border-radius: 5px!important;; -moz-border-radius: 5px!important;; -webkit-border-radius: 5px!important;"></div>
					<br>
					<p class="bold"><?=$meal->name;?></p>
					<p class=""><?=base64_decode($meal->comment);?></p>
				</div>	
				<?php } ?>
			</div>
			
		</div>
		<?php endif; ?>
		<br>
		<br>
		<div class="row p-t-30">
			<div class="col-sm-12">
				<h4 class="col-sm-3">Chef Creations</h4>
				<span class="col-sm-3 col-sm-offset-6 text-right"><?=count($chef->meals);?> Dishes</span>	
			</div>
		</div>
		
		<?php

			if ($x_count > 0) :
			for ($x = 0, $y=0; $x< $counter; $x++) {
				?>
		<div class="row p-t-30">
			<div class="col-sm-12">
				<?php
				for ($z=0; ($z<4 && $y<count($chef->meals)); $z++, $y++) {
					$meal = $chef->meals[$y];
					//var_dump($meal);
					?>
					<div class="col-sm-3">
						<div class="background-image" style="background-image: url('<?=$meal->image_url;?>'); height: 300px; border-radius: 5px!important;; -moz-border-radius: 5px!important;; -webkit-border-radius: 5px!important;"></div>
						
						<p class="p-t-05 bold"><?=$meal->name;?></p>
						
						<p class="m-b-00"><?=$meal->ingredients;?></p>
						<p class=""><?=base64_decode($meal->comment);?></p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
				<?php	
			}
			endif;
			
		?>
		
	</div>
</div>
