<div class="container-fluid full-height background-image background-01">
    <div class="row full-height no-scroll">
        <div class="col-sm-3 full-height auto-scroll">
            <div class="background-right-text p-r-10 p-l-10">
                <h4 class="curly-text-2 font-30 p-b-10 font-normal-100 text-center text-white">Meals Gallery</h4>
                <p class="text-center font-13">
                    “Few ever taste life…” – Rumi
                </p>
                <p class="text-center font-14">
					Select from our gallery of the most delectable collections of culinary art. Order the creation, Request Recipe or Discover the Chef
                </p>
            </div>
        </div>
        <div class="col-sm-9 full-height auto-scroll background-white p-t-80 p-b-100 padding-30">

        	<?php for($i=0,$j=0; $i<ceil(count($meals) / 4); $i++) { ?>
			<div class="row right-gallery">
				<?php
					for ($k=0; $k<4; $k++, $j++) {
						if($j>=(count($meals))) break;
						$meal = $meals[$j];
						?>
						<div class="col-sm-3">
		                    <div class="height-x-205 background-image" style="border-radius:5px; background-image: url('<?=$meal->image_url;?>');"></div>
		                    <p>
		                        <p class="level-1 text-black">Chef <?=$meal->username;?></p>
		                        <p class="line-orange level-2"></p>
		                        <p class="level-3 text-black"><?=$meal->name;?></p>
		                        <p class="level-4 text-black">
		                        	<span id="mealPrice"> <?=NGN." ".$meal->price;?></span>
		                        	<span id="view-fb-button">
		                        		<?=anchor("user/meal/{$meal->id}", 'view', array('class'=>'pull-right btn btn-success btn-xs'));?>
		                        	</span>
		                        </p>
		                    </p>
		                </div>
						<?php

					}
				?>
			</div>
			<?php	} ?>

        </div>
    </div>
</div>
