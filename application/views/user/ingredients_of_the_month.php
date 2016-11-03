<div class="container-fluid full-height background-image background-11 p-l-100 p-r-100 p-t-70 text-black">
    <div class="row">
    	<div class="col-sm-8 text-white p-l-20">
    		<p class="curly-text-2 font-50 font-normal-100 m-b-20">Ingredients of the month</p>
    	</div>
    	<!--
    	<div class="col-sm-4">
    		<span class="btn btn-orange">Previous Ingredients</span>
    	</div>
    	-->
    </div>
    
    <div class="row p-t-05">
    	<?php $i=0; foreach($ings as $ing){ ?>
    	<div class="col-sm-3 p-l-20 p-b-20 p-r-20">
    		<div class="background-image" style="height: 250px; border-radius: 5px; background-image: url('<?=trim(base64_decode($ing->image_url));?>')"></div>
    	</div>
    	<?php if ($i==3) break; else $i++; } ?>
    </div>
    
    <div class="row">
    	<?php $z=0; foreach($ings as $ing){ ?>
    	<div class="col-sm-3 text-center text-white">
    		<p><?=base64_decode($ing->name);?></p>
    	</div>
    	<?php if ($z==3) break; else $z++; } ?>
    </div>
    
    <div class="row">
    	<?php $z=0; foreach($ings as $ing){ ?>
    	<div class="col-sm-3 text-center text-white">
    		<span class="btn btn-orange read-more-btn"
    			data-name="<?=$ing->name;?>"
    			data-image="<?=$ing->image_url;?>"  
    			data-comments="<?=$ing->comments;?>" data-toggle="modal" data-target="#mymodal">Read More</span>
    	</div>
    	<?php if ($z==3) break; else $z++; } ?>
    </div>
</div>


<div class="modal fade text-black" id="mymodal" role="dialog">
	<div class="modal-dialog modal-lg">
		
		<!-- Modal content-->
		<div class="modal-content background-white">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body p-l-30 p-r-30 p-t-10 p-b-10">
				<div class="row">
					<div class="col-sm-4">
						<img class="img-fluid img-responsive" id="image-holder" src="http://placehold.it/300x300" style="border-radius: 5px;" />
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<p class="bold p-t-10" id="name-holder">--</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<p class="bold" >Description</p>
						<p class="" id="comments-holder">
							--
						</p>
						<!--
						<p class="bold">Uses</p>
						<ol>
							<li>Item One on the list</li>
							<li>Item 2 on the list</li>
						</ol>
						
						<p class="bold">Where to get it</p>
						<p class="">
							Food is anything consumed to provide nutritional support to the body.
                            It is usually of plant or animal origin, and contains essential nutrients, such as
                            fats, protiens, vitamins or minerals.
						</p>
						
						<p class="bold">Recipies that use it</p>
						<ol>
							<li>Item One on the list</li>
							<li>Item 2 on the list</li>
						</ol>
						
						<p class="bold">Health Benefits</p>
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
		<!-- Modal content-->
	</div>
</div>

<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" >
	// this is where the bootstrap popup ish happens
	$('#mymodal').on('show.bs.modal', function (evt){
		var btn = $(evt.relatedTarget)
		var modal = $(this)
		
		var comment = btn.data('comments')
		var name = btn.data('name')
		var image = btn.data('image')
		
		modal.find('#comments-holder').html(atob(comment))
		modal.find('#name-holder').text(atob(name))
		modal.find('#image-holder').attr('src', atob(image))
	});
</script>