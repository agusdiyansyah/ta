<script>
	$(document).ready(function() {

		$('.rmv').click(function() {
			$('.area-kanan').load('bimbingan/kmn_data');
		});

		$(".scroll").slimScroll({
		    position        : 'right',
		    height          : '478px',
		    color			: '#ECF0F1',
		    railVisible     : false,
		    alwaysVisible   : true,
		    disableFadeOut  : true,
		    wheelStep       : 50
		});
	});
</script>