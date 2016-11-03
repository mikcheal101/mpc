	
			</div>
		</div>
	</div>
	
	<script src="<?=base_url('/assets/js/jquery.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('/assets/js/jquery-ui.min.js');?>" type="text/javascript"></script>
    
    <script src="<?=base_url('assets/js/angular.1.5.7.min.js');?>"></script>
	<script src="<?=base_url('assets/js/angular.animate.1.5.7.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.3.0.2.min.js');?>"></script>
	
	<script src="<?=base_url('assets/js/tether.min.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap-notify.js');?>"></script>
	<script src="<?=base_url('assets/js/Date.js');?>"></script>
			
	<script src="<?=base_url('assets/js/angular-sanitize.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-multiselect.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.parseparams.js');?>"></script>
		
		
	<!-- include summernote css/js-->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    
	<script src="<?=base_url('assets/js/angular-upload/ng-file-upload-shim.min.js');?>"></script> <!-- for no html5 browsers support -->
	<script src="<?=base_url('assets/js/angular-upload/ng-file-upload.min.js');?>"></script>
    
	<script src="<?=base_url('assets/js/dirPagination.js');?>"></script>
	<script src="<?=base_url('assets/js/alert.js');?>"></script>
	<script src="<?=base_url('assets/js/directives/checklist-model.js');?>"></script>
	
	<script src="<?=base_url('assets/js/controllers/adminController.js');?>"></script>

	<script>
        $(document).ready(function() {
            $('.multiselect').multiselect();
            tinymce.init({
              selector: '.tinymce',
              height: 50,
              theme: 'modern',
              toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
             });
        });
    </script>
</body>
</html>