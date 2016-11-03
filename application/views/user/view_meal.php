<style>
	iframe#twitter-widget-0 {
		position: absolute!important;
		margin-top:2px!important;
		margin-left: 5px!important;
	}
	
	span.IN-widget, div#___plus_0 {
		vertical-align: bottom!important;
	}
	
	.fb-comments, .fb-comments > span, .fb-comments > span > iframe {
		width: 100%!important;
	}
</style>
<div class="container-fluid full-height background-image background-01 text-black">
    <div class="row full-height">
        <div class="col-sm-3 full-height">
            <div class="background-right-text">
                <h4 class="curly-text-2 font-30 p-b-10 font-normal-100 text-center text-white">Meals Gallery</h4>
                <p class="text-center font-12">
                    “Few ever taste life…” – Rumi
                </p>
                <p class="text-center font-14">
					Select from our gallery of the most delectable collections of culinary art. Order the creation, Request Recipe or Discover the Chef
                </p>
            </div>
        </div>

        <div class="col-sm-9 background-white full-height" style="padding-bottom: 150px;">
            <div class="row p-t-80 p-r-50 p-l-50">
                <div class="col-sm-8">
                    <h5 class="p-b-00"><?=$meal->name;?></h5>
                    <img class="img-responsive img-fluid img-550-350 img-rounded"  src="<?=$meal->image_url;?>" />
                    
                    
                    <div class="col-sm-12 p-l-00 p-t-10">
                    	<div class="fb-like" 
                    		data-href="<?=base_url("user/meal/{$meal->meal_id}");?>" 
                			data-layout="button_count" data-action="like" 
                			data-size="small" data-show-faces="true" 
                			data-share="true"></div>
                		
                		<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
						<script type="IN/Share" data-url="<?=base_url("user/meal/{$meal->meal_id}");?>" data-counter="right"></script>
						

						<!-- Place this tag where you want the share button to render. -->
						<div class="g-plus" data-action="share" 
							data-annotation="bubble"  
							data-href="<?=base_url("user/meal/{$meal->meal_id}");?>"></div>
							
						
                		<a href="https://twitter.com/share"
                			style="position:absolute!important; padding-top: 10px!important; margin-top:10px!important;" 
	                    	class="twitter-share-button" 
	                    	data-text="<?=$meal->name;?> by Chef <?=$meal->chef_username;?>" 
	                    	data-url="<?=base_url("user/meal/{$meal->meal_id}");?>" 
	                    	data-via="mpc" data-hashtags="mypersonalchef.com.ng" data-show-count="false">Tweet</a>
	                    	<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	                    	
	                    
                    </div>
                    
                </div>
                <div class="col-sm-4 p-t-00">
                    <h5 class="">About the Chef</h5>
                    <img class="img-responsive img-fluid img-150-150 img-rounded" src="<?=base_url($meal->chef_image);?>" />
                    <p class="p-t-10">
                        Food is anything consumed to provide nutritional support to the body.
                        It is usually of plant or animal origin, and contains essential nutrients, such as
                        fats, protiens, vitamins or minerals.
                    </p>
                    <div class="btn-group-vertical width-80">
                        <button type="button" class="btn btn-orange m-b-10" data-mealImage="<?=$meal->image_url;?>" 
                        	data-mealPrice="<?=$meal->price;?>" data-mealName="<?=$meal->name;?>" data-mealStart="<?=$meal->name;?>" 
                        	data-mealEnd="<?=$meal->name;?>" data-toggle="modal" data-target="#order_modal" 
                        	data-whatever="@getbootstrap">Order</button>
                        <span class="btn btn-orange">Add to Cart</span>
                    </div>
                </div>
            </div>

            <div class="row p-t-00 p-r-50 p-l-50">
                <div class="col-sm-8">
                    <h5 class="p-t-00 font-14 text-black">Description</h5>
                </div>
            </div>

            <div class="row p-t-05 p-r-50 p-l-50">
                <div class="col-sm-8">
                    <p class="">
                        <?=base64_decode($meal->comment);?>
                    </p>

                    <p class=" font-14">Price</p>
                    <p class="bold" style="margin-top:-15px;"><?=NGN;?> <?=$meal->price;?> .00</p>
                </div>
                <div class="col-sm-4">
                    
                </div>
            </div>
            
            <div class="row p-t-05 p-r-50 p-l-50">
            	<div class="col-sm-12" style="padding-left: 7px!important;">
            		<div class="fb-comments" 
            		data-colorscheme="light" 
            		data-href="<?=base_url("user/meal/{$meal->meal_id}");?>" 
            		data-numposts="5"></div>
            	</div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="order_modal" class="order_modal" role="dialog">
	<div class="modal-dialog modal-lg">
		
		<!-- Modal content-->
		<div class="modal-content background-white-9 text-black">
			<div class="modal-header background-white-complete">
				<button type="button" class="close" data-dismiss="modal">close</button>
			</div>
			<div class="modal-body p-l-40 p-r-30 p-t-20 p-b-20">
				<div class="row">
					<div class="col-sm-12">
						<p class="bold meal_name">--</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4" style="height:250px;">
						<div class="image-display" style="height: 100%; backround-image: url('http://placeholder.it/300x300'); background-size: cover; background-position:center; border-raius: 3px;"></div>
					</div>
					
					<div class="col-sm-8">
						<div class="row p-b-10">
							<div class="col-sm-5 text-right">
								Number of Servings:
							</div>
							<div class="col-sm-7">
								<div class="form-group">
									<input type="number" onchange="upadatePrice();" class="form-control text-black amount" placeholder="Enter the amount of servings" value="1" min="1" name="" style="margin-top:-10px; font-size:12px;" />
								</div>
							</div>
						</div>
						
						<div class="row p-b-30">
							<div class="col-sm-5 text-right">
								Delivery Date:
							</div>
							<div class="col-sm-7">
								<span class="dod"></span>
								<input type="date" class="form-control text-black" 
									placeholder="Enter the delivery date" value="" min="1" 
									name="" style="margin-top:-10px; font-size:12px;" />
							</div>
						</div>
						
						<div class="row p-b-30">
							<div class="col-sm-5 text-right">
								Delivery Time:
							</div>
							<div class="col-sm-7">
								<span class="tod"></span>
								<input type="time" class="form-control text-black" 
									placeholder="Enter the delivery time" value="" min="1" 
									name="" style="margin-top:-10px; font-size:12px;" />
							</div>
						</div>
						
						<div class="row p-b-30">
							<div class="col-sm-5 text-right">
								Total Cost: 
							</div>
							<div class="col-sm-7">
								<input type="hidden" value="0" class="costPrice" />
								<input type="hidden" value="0" class="newPrice" />
								<span class="cost"></span>
							</div>
						</div>
						
						<div class="row p-b-30">
							<div class="col-sm-5 text-right">
								Payment Method:
							</div>
							<div class="col-sm-7">
								<span class="btn btn-xs btn-orange">On Delivery</span>
								<span class="btn btn-xs btn-orange">Online</span>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<!-- Modal content-->
	</div>
</div>
