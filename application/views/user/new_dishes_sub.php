<div class="container-fluid full-height background-image background-01 p-l-100 p-r-100 p-t-70">
	
	<div class="row p-t-10 p-r-30 p-b-20 ">
		<div class="col-sm-12 text-yellow">
			<span class="curly-text-2 font-50 font-normal-100">New Dishes</span>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="line-white"></div>
		</div>
	</div>
	
	<div class="row background-white m-l-00 m-r-00 m-b-100" style="border-radius: 3px;">
		<div class="col-sm-12 p-t-30 p-l-50 p-r-50 p-b-30">
			<div class="row">
				<div class="col-sm-3">
					<div class="background-image" style="height: 200px; border-radius:3px; background-image: url('<?=$dish->image;?>')"></div>
				</div>
			</div>
			
			<div class="row text-black">
				<div class="col-sm-12 p-t-05">
					<p class="bold font-14"><?=ucwords(base64_decode($dish->Heading));?></p>
					<span class="bold text-orange"><?=$dish->substring;?></span>
					
					<p class="font-14">
						<?=base64_decode($dish->comment);?>
					</p>
					<!--
					<p class="bold">Ingredients</p>
					<ol>
						<li>Item one on the list</li>
						<li>Item two on the list</li>
						<li>Item three on the list</li>
					</ol>
					
					<p class="bold">Preparation Method</p>
					<p class="">
						Food is anything consumed to provide nutritional support to the body.
                        It is usually of plant or animal origin, and contains essential nutrients, such as
                        fats, protiens, vitamins or minerals.
					</p>
					-->
				</div>
			</div>
		</div>
	</div>
</div>