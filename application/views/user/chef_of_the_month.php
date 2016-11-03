<div class="container-fluid full-height text-black">
	<div class="row full-height ">
	    <div class="col-sm-5 full-height no-scroll background-image" style="background-image: url('<?=($chef !== null) ? base64_decode($chef->main_picture): "";?>');">
	    
	        <div class="row padding-30 bottom-footer-btn">
	            <div class="text-center col-sm-12">
	                <!-- <span class="btn btn-lg btn-orange ">View Photo Gallery</span> -->
	            </div>
	
	        </div>
	        <div class="row bottom-footer">
	            <div class="col-sm-12 background-orange" style="height:155px!important;">
	                <p class="text-center padding-10 font-30 text-white">
	                	<?=($chef !== null) ? base64_decode($chef->name): "";?>
	                </p>
	            </div>
	        </div>
	    </div>
	    <div class="col-sm-7 full-height  p-t-70 p-b-70">
	
	        <div class="height-85">
	
	            <div class="row">
	                <div class="col-sm-12 text-center">
	                    <h4 class="curly-text-2 font-30 font-normal-100 p-b-10 text-orange">Chef of the month</h4>
	                    <!-- <span class="btn btn-orange">Previous Chef</span> -->
	                </div>
	            </div>
	
	            <div class="row p-t-15 p-l-30 p-r-30">
	                <div class="col-sm-12">
	                    <p class="">
	                    	<?=($chef !== null) ? base64_decode($chef->description): "";?>
	                    </p>
	                    
	                </div>
	            </div>
	        </div>
	
	        <div class="height-05">
	
	            <div class="row ">
	                <div class="col-sm-12 ">
	                    <div class="background-brown">
	                        <div class="row padding-30 m-t-20">
	                        	
	                        	<?php
	                        	if ($chef !== null):
	                        		$i=0;
                        			foreach($chef->images as $image) {
                        		?>
		                            <div class="col-sm-3 ">
		                                <div class="" style="background-position: center; background-size: cover; border-radius:3px; height: 150px; background-image: url('<?=base64_decode($image->image_url);?>');" ></div>
		                            </div>	
								<?php		
										if ($i == 3) break; else $i++;
	                        		}
								endif;
								?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
	
	
	<div class="modal fade" id="chef-details_modal" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body p-l-30 p-r-30 p-t-10 p-b-10">
				<div class="row">
					<div class="col-sm-7">
						<img class="img-fluid img-responsive" src="http://placehold.it/300x300" />
						<h5 class="bold p-t-10 text-yellow curly-text-1">Chef of the Month</h5>
						
						<p class="text-yellow"><?=($chef !== null) ? base64_decode($chef->name): "";?></p>
					</div>
				</div>
				
				<div class="row p-r-40">
					<div class="col-sm-12">
						<h5 class="bold">About</h5>
						<p class="">
							Food is anything consumed to provide nutritional support to the body.
	                        It is usually of plant or animal origin, and contains essential nutrients, such as
	                        fats, protiens, vitamins or minerals.
						</p>
						
						<p class="">
							Food is anything consumed to provide nutritional support to the body.
	                        It is usually of plant or animal origin, and contains essential nutrients, such as
	                        fats, protiens, vitamins or minerals.
						</p>
						
						<p class="">
							Food is anything consumed to provide nutritional support to the body.
	                        It is usually of plant or animal origin, and contains essential nutrients, such as
	                        fats, protiens, vitamins or minerals.
						</p>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Modal content-->
	</div>
</div>
	
<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/javascript.js"></script>