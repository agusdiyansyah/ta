<script>
	$(document).ready(function() {
		$('.data-cat').show(function() {
			var 
				data 	= $.parseJSON($('data cat').html()),
				tmp  	= $('.data-cat'),
				mst		= Mustache.render(tmp.html(), data);
			tmp.html(mst);

		});
	});
</script>
<script>
	$(document).ready(function() {
		
		$('.file-ac').click(function() {
			var
				file_name 	= $(this).data('name'),
				pid 		= $(this).data('pid')
				cat_name	= $(this).data('cat');

			$('.area-kanan').load('bimbingan/kmn_id/'+pid+'/'+cat_name+'/'+file_name);

			$('body,html').animate({
		        scrollTop : 0 
		    }, 500);
		});

	});
</script>