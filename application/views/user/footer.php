	<script src="<?=base_url('/assets/js/jquery.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('/assets/js/jquery-ui.min.js');?>" type="text/javascript"></script>
	
	<script src="<?=base_url('assets/js/angular.1.5.7.min.js');?>"></script>
	<script src="<?=base_url('assets/js/angular.animate.1.5.7.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.3.0.2.min.js');?>"></script>
	
	<script src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
	
	<script src="<?=base_url('assets/js/numeral.1.4.5.min.js');?>"></script>
	
	<script src="<?=base_url('assets/js/bootstrap-multiselect.js');?>"></script>
	<script src="<?=base_url('assets/js/jquery.parseparams.js');?>"></script>
	
	<script src="<?=base_url('assets/js/dirPagination.js');?>"></script>
	<script src="<?=base_url('assets/js/angular-sanitize.js');?>"></script>
	<script src="<?=base_url('assets/js/ng-file-model.js');?>"></script>
	
	<script src="<?=base_url('assets/js/angular-upload/ng-file-upload-shim.min.js');?>"></script> <!-- for no html5 browsers support -->
	<script src="<?=base_url('assets/js/angular-upload/ng-file-upload.min.js');?>"></script>
	
	<script src="<?=base_url('assets/js/ForumApp.js');?>"></script>
	
	<!-- Place this tag in your head or just before your close body tag. -->
	<script src="<?=base_url('assets/js/platform.js');?>" async defer></script>
	
	
<script type="text/javascript">

	setTimeout(function () {
		$('div.alert').fadeOut('slow');
	}, 3000);

	function addtoCart (id, serve) {
		var cartUrl = "<?=site_url('user/addToCart');?>/"+id+"/"+serve;
		$.get(cartUrl, function (data) {
			location.href = "<?=site_url('user/viewMeals');?>";
		});
	}

	$('#mealDialog').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
	  	var mealName 		= button.data('name');
	  	var mealImage 		= button.data('img');
	  	var mealPrice 		= button.data('price');
	  	var mealOrdered 	= button.data('ordered');
	  	var mealChef 		= button.data('owner');
	  	var id 				= button.data('id');

	  	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  	var modal = $(this);
	  	modal.find('#mealDialogLabel').html(mealName +" by ["+ mealChef +"]");
	  	modal.find('#mealDialogImage').attr('src', mealImage);
	  	modal.find('#mealDialogPrice').html(mealPrice);
	  	modal.find('#mealDialogOrdered').html(mealOrdered);
	  	modal.find('#meal_id').val(id);

	});

	$('#cartAddBtn').click(function (e){
  		var id_			= $('#meal_id').val();
  		var servings 	= $('#servings').val();
  		addtoCart(id_, servings);
  	});
</script>

<script type="text/javascript">
	 $('.mealPlan').sortable({
		containment: 	"document",
		tolerance: 		"pointer",
		connectWith: 	".mealPlan",
		cursor: 		"pointer",
		revert:			true
	});
	$('.mealPlan').disableSelection();
</script>

	
	<script type="text/javascript">
		var facebook = new Facebook();
		
		$('.share-btn').each(function (btn) {
			$(this).click(function (item) {
				var param = {};
				param.title 		= $(this).attr('data-title');
				param.link 			= $(this).attr('data-link');
				param.caption		= $(this).attr('data-caption');
				param.picture		= $(this).attr('data-picture');
				param.description	= $(this).attr('data-description');

				facebook.shareButtonClicked($(this));
			});
		});
	</script>

	<script type="text/javascript">
		$('#order_modal').on('show.bs.modal', function (event) {
			var button 		= $(event.relatedTarget);
			var modal 	= $(this);
			
			var meal_name 	= button.data('mealname')
			var meal_img 	= button.data('mealimage');
			var meal_price 	= button.data('mealprice');
			var meal_start 	= button.data('mealstart');
			var meal_end 	= button.data('mealend');
			
			var style = "height: 100%; background-image: url('"+  meal_img +"');  background-size: cover; background-position:center; border-radius: 3px;";
			
			console.log('style ', style);
			modal.find('.meal_name').text(meal_name);
			modal.find('.dod').text('');
			modal.find('.tod').text('');
			modal.find('.cost').text(meal_price);
			$('.costPrice').val(meal_price)
			modal.find('.image-display').attr('style', style );
			console.log(modal.find('.image-display').attr('style'));
			
		});
		
		function upadatePrice() {
			var amount = $('.amount').val();
			var initialPrice = $('.costPrice').val();
			var newPrice = amount * initialPrice;
			$('.newPrice').val(newPrice);
			$('.cost').text(newPrice);
		}
	</script>
	</body>
</html>