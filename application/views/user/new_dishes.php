<div class="container-fluid full-height background-image background-01 p-l-100 p-r-100 p-t-50 p-b-100">
	<div class="row p-t-30 p-r-30 p-b-20">
		<div class="col-sm-12 text-yellow">
			<span class="curly-text-2 font-50 font-normal-100">New Dishes</span>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="line-white"></div>
		</div>
	</div>
	
	<?php foreach ($dishes as $dish) { ?>
	<div class="row background-white m-b-05 m-l-00 m-r-00 text-black">
        <div class="col-sm-3 no-padding">
            <div class="height-x-205 background-image" style="border-radius:1px; background-image: url('<?=$dish->image;?>');"></div>
        </div>

        <div class="col-sm-9 p-t-15 p-b-5 p-l-30 p-r-30 p-b-15">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="bold text-black"><?=ucwords(base64_decode($dish->Heading));?></h5>
                    <p class="bold text-orange"><?=base64_decode($dish->substring);?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <p class="font-14 text-black">
                        <?=base64_decode($dish->comment);?>
                    </p>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 no-padding p-r-10">
                    <a href="newDishesSub/<?=$dish->id;?>" class="btn btn-orange col-sm-offset-9 col-sm-3">Read More</a>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>    
    
</div>