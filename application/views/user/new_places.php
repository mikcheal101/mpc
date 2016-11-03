<div class="container-fluid full-height background-image background-03 p-l-100 p-r-100 p-t-10 p-b-100">
	<div class="row p-t-10 p-r-30 p-b-20">
		<div class="col-sm-12 text-orange">
			<span class="curly-text-2 font-50 font-normal-100">New Places</span>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="line-white"></div>
		</div>
	</div>
	
	<?php for ($i=0; $i<30; $i++) { ?>
	<div class="row background-white m-b-05 m-l-00 m-r-00">
        <div class="col-sm-3 no-padding">
        	<div class="height-x-205 background-image" style="border-radius:5px; background-image: url('http://placehold.it/300x300');"></div>
        </div>

        <div class="col-sm-9 p-t-15 p-b-15 p-b-5 p-l-5 p-r-15">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="">Palm Beach Restaurant</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Food is anything consumed to provide nutritional support to the body.
                        It is usually of plant or animal origin, and contains essential nutrients, such as
                        fats, protiens, vitamins or minerals. Food is anything consumed to provide nutritional support to the body.
                        Food is anything consumed to provide nutritional support to the body.
                        Food is anything consumed to provide nutritional support to the body.
                    </p>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 no-padding p-r-10">
                	<?=anchor('user/newPlacesSub', 'Read More', array('class'=>'btn btn-orange col-sm-offset-9 col-sm-3'));?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>