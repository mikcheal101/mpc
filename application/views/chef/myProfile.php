
<div class="background-01 background-image full-height opacity-9">
	<div class="container full-height">
		<div class="row full-height p-l-30 p-r-30 m-t-40">

			<div class="col-sm-6 p-r-50 full-height">
				<div class="row background-black-complete">
					<div class="col-sm-4">
						<img class="img-fluid img-avatar img-responsive no-background-color p-l-00 p-r-00 p-b-00 p-t-00" src="<?=base_url($session['image_url']);?>" />
						
					</div>
					
					<div class="col-sm-8 text-white p-t-10 p-r-05 p-b-05 p-l-05">
						
						<?php
							function addS ($string) {
								return ((strtolower($string[strlen($string) -1]) === 's')) ? $string.="'" : $string.="'s";
							}
						?>
						<p  class="curly-text-2 font-20 m-b-05 font-normal-100">Chef <?=addS($session['username']);?> Dashboard</p>
						<p class="xlevel-1">www.chefhasbro.com</p>
						<p class="">
							<span class="col-sm-4 p-l-00">8 Messages</span>
							<span class="col-sm-4">12 Requests</span>
							<span class="col-sm-4 ">20 Comments</span>
						</p>
					</div>
				</div>
				
				<div class="row height-x-30 background-orange p-t-05 text-right p-r-10 text-white">
					<div class="col-sm-3 col-sm-offset-7 text-middle" id="uploadPhotosBtn" data-toggle="modal" data-target="#uploadPhotos">
						<p>Upload photos</p>
					</div>
					<!--
					<div class="col-sm-3 text-middle">
						<p>Add Videos</p>
					</div>
					-->
					<div class="col-sm-2 text-middle">
						<p>Status</p>
					</div>
				</div>
				
				<div class="row height-60 background-ash-complete m-t-05 p-t-30 text-right p-r-10 text-white">
					<div class="col-sm-12">
						
						<div class="row p-b-10">
							<div class="col-sm-4 text-middle">
    							<p>View Photo Gallery</p>
    						</div>
    						<div class="col-sm-4 text-middle">
    							<p>View Video Gallery</p>
    						</div>
    						<div class="col-sm-4 text-middle">
    							<p>View Discussions</p>
    						</div>
						</div>
						
						<div class="row p-l-05 p-t-70 p-r-20 text-yellow">
							<div class="col-sm-6 text-center">
								<i class="fa fa-2x fa-leaf col-sm-3"></i> 
								<span class="col-sm-9 text-left text-white">Latest Creations</span>
							</div>
							<div class="col-sm-6">
								<i class="fa fa-2x fa-plug col-sm-3"></i> 
								<span class="col-sm-9 text-left text-white">Cooking Techniques & ingredients</span>
							</div>
						</div>
						<div class="row p-l-05 p-t-20 p-r-20 p-b-20 text-yellow">
							<div class="col-sm-6">
								<i class="fa fa-2x fa-newspaper-o col-sm-3"></i> 
								<span class="col-sm-9 text-left text-white">Ingredients of the month</span>
							</div>
							<div class="col-sm-6">
								<i class="fa fa-2x fa-dropbox col-sm-3"></i> 
								<span class="col-sm-9 text-left text-white">Shopping Tips</span>
							</div>
						</div>
						
						
						<div class="row p-l-05 p-t-40 p-r-20 m-l-20 text-yellow">
							<div class="col-sm-12 line-yellow"></div>
						</div>
						
						<div class="row p-l-05 p-t-05 p-r-20 text-yellow">
							<div class="col-sm-6 col-sm-offset-1">
								Events Booking
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="col-sm-6 p-t-30 p-r-50 p-l-50 height-80 background-white-complete text-black">
				<div class="row">
					<div class="col-sm-12 text-light-brown">
						<p class="curly-text-2 font-30 font-normal-100">Add Meal</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<img src="<?=base_url('assets/backgrounds/01.jpg');?>" class="img-responsive img-fluid img-rounded" />
					</div>
					<div class="col-sm-4">
						<img src="<?=base_url('assets/backgrounds/01.jpg');?>" class="img-responsive img-fluid img-rounded" />
					</div>
					<div class="col-sm-4">
						<img src="<?=base_url('assets/backgrounds/01.jpg');?>" class="img-responsive img-fluid img-rounded" />
					</div>
				</div>
				
				<div class="row p-t-20">
					<div class="col-sm-12">
						
						<form class="form" role="form">
							<div class="form-group">
								<input type="text" name="" value="" class="form-control border-light-brown background-light-brown-complete p-l-10 text-black input-curved font-13" placeholder="Name"  />
							</div>
							
							<div class="form-group">
								<input type="file" name="" value="" class="form-control border-light-brown background-light-brown-complete p-l-10 text-black input-curved font-13" placeholder="Upload Photo" />
							</div>
							
							<div class="form-group">
								<textarea  class="form-control border-light-brown background-light-brown-complete p-l-10 p-t-05 text-black input-curved font-13" placeholder="Ingredients"></textarea>
							</div>
							
							<div class="form-group">
								<textarea  class="form-control border-light-brown background-light-brown-complete p-l-10 p-t-05 text-black input-curved font-13" placeholder="Description"></textarea>
							</div>
						</form>
						
						
					</div>
				</div>
				
				<div class="row p-t-10">
					<div class="col-sm-4 text-left">
						<p>Price</p>
					</div>
					
					<div class="col-sm-4 text-center">
						Order Limits
					</div>
					
					<div class="col-sm-4 text-right">
						Max delivery date
					</div>
				</div>
				
				<div class="row p-t-10 text-orange">
					<div class="col-sm-6 text-left">
						<span>Share</span>
						
						<i class="col-sm-offset-2 fa fa-facebook border-30r width-20 text-center border-1x padding-05"></i>
						<i class="fa fa-twitter border-30r width-20 text-center border-1x padding-05"></i>
						<i class="fa fa-google-plus border-30r border-1x text-center width-20 padding-05"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Why become a personal chef Dialog -->
<div class="modal fade" id="uploadPhotos" tabindex="-1" role="dialog" aria-labelledby="uploadPhotosLabel">
	<div class="modal-dialog text-black" role="document" style="background-color: rgba(255, 255, 255, 0.9); border-radius: 5px!important;">
		<div class="model-content">
			
			<div class="modal-header">
				<button type="button" class="close" onclick="clearDiv();" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="OPdialogLabel">Upload Photos</h4>
				<span class="uploadStatus">0 Files Uploaded</span>
			</div>
			
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form class="form" role="form">
							<div class="form-group">
								<input type="file" name="" value="" multiple="multiple" onchange="run(this);" class="form-control p-l-10" placeholder="Upload Photo" />
							</div>
						</form>	
					</div>
				</div>
				
				<div class="row innerDiv">
					
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	function run(evt) {
		clearDiv ();
		var x = evt.files;
		var string = "";
		if (x.length > 0) {
			for (var i=0, f; f = x[i]; i++) {
				var reader = new FileReader();
				reader.onload = (function (thefile) {
					return function (e) {
						var image = "<div class='col-sm-3 p-b-05' style='height:125px!important;'><img style='max-height:120px!important;' class='img-responsive img-rounded img-fluid' src='" + e.target.result + "' /></div>";
						$('.innerDiv').append(image);
						console.log(e.target.result);
					}
				})(f);
				reader.readAsDataURL(f);
			}
		}
		else  console.log('no');
	}
	
	function clearDiv () {
		$('.innerDiv').html('');
	}
	
	function readUrl (file) {
		var reader = new FileReader();
		reader.onload = function (event) {
			return event.target.result; 
		}
		reader.readAsDataURL(file);
	}	
</script>