<?php  
	$this->load->view('css');
?>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row meta">
				
			</div>

			<div class="row">		
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group cat">
					
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 area-bawah <?php echo (($meta['dosen']) ? '' : 'group'); ?>">
					
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 area-kanan">
		
	</div>
</div>

<script>
	// auto loader
	<?php echo ($meta['dosen']) ? '' : "$('.area-bawah').load('bimbingan/upl_form');" ; ?>
	$('.cat').load('bimbingan/cat/'+<?php echo $meta['id']; ?>);
	$('.area-kanan').load('bimbingan/kmn_data');
	$('.meta').load('bimbingan/meta_data/'+<?php echo $meta['id'] ?>);
	// end of auto loader

	$(".panel-default").hover(
		function () {
			$(this).find(".aksi").show();
		},
		function () {
			$(this).find(".aksi").hide();
		}
	);

</script>