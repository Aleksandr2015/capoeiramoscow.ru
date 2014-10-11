		<!-- Jquery and Bootstrap scripts -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.js"></script>	
		<!-- Gallery modal script -->
		<script src="<?php echo get_template_directory_uri();?>/gallery_modal/gallery_modal.js"></script>		
		<!-- Full Screen Search -->
		<script>
			$(function () {
				$('a[href="#search"]').on('click', function(event) {
					event.preventDefault();
					$('#search').addClass('open');
					$('#search > form > input[type="search"]').focus();
				});
				
				$('#search, #search button.close').on('click keyup', function(event) {
					if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
						$(this).removeClass('open');
					}
				});
				
				$('form').submit(function(event) {
					event.preventDefault();
					return false;
				})
			});
		</script>
		<?php wp_footer(); ?>		
	</body>
</html>
