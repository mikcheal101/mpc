	<script type="text/javascript">
		var passport 	= $('#passport');
		var photo 		= $('#photo');
		var file 		= null;
		var reader 		= null;
		
		passport.change(function (evt){
			console.log('image selected!');
			reader = new FileReader();
			reader.readAsDataURL(passport[0].files[0]);
					
			reader.onload = function (evt) {
				photo.attr('src', evt.target.result);
			}	
		});
		
		
		
		/*
		 * 
		 * this handles the meal type selection
		 */
		var changeOption = function (value) {
			switch(value) {
				case '1':
					// this means this part should be shown
					$('#startEnd').fadeIn(2000);
				break
				
				case '2':
					// this means this part should not be shown
					$('#startEnd').fadeOut(2000);
				break;
			}
		}
		
		var checked = $('.meal_type').filter(':checked').val();
		$('.meal_type').change(function () {
			checked = $('.meal_type').filter(':checked').val();
			changeOption(checked);
		});
		changeOption(checked);
		
		
	</script>

	</body>
</html>