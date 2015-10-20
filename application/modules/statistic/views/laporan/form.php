<script type="text/javascript" src="<?php echo base_url(); ?>gudang/tinymce/tinymce.min.js"></script>
<form method="POST" role="form" class='form-lap'>
	<div class="form-group">
		<input type="text" class="form-control title" name="title" placeholder="Kategori Laporan">
	</div>
	<div class="form-group">
		<textarea class='ket-lap form-control' name='ket'></textarea>
	</div>
	<input type="hidden" value="0" class='ac'name='ac'>

</form>
<div class="text-right">
	<button type="button" class="btn btn-danger">Kembali</button>
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
<script>
	$(document).ready(function() {
		tinymce.init({
            selector: ".ket-lap",
            menubar: false,
            setup: function (editor) {
		        editor.on('change', function () {
		            tinymce.triggerSave();
		        });
		    }
        });

        $('.btn-danger').click(function() {
        	$('.st_lap').load('statistic/laporan');
        });

        $('.btn-primary').click(function() {
        	var 
        		ac 		= $('.ac').val(),
        		link 	= 'insert';
        	if (ac != 0) {
        		link 	= 'update/';
        	};
        	$.ajax({
				url: 'statistic/laporan/'+link,
				dataType:'json',
				type:'post',
				cache:false,
				data: $(".form-lap").serialize(),
				beforeSend:function(){
					// console.log($(".form-lap").serialize());
				},
				success:function(json){
					if(json.stat){
						console.log(json.msg);
						$('.st_lap').load('statistic/laporan');
					} else {
						// $('.cat_laporan').load('statistic/laporan/form');
						alert()
					}
				}
			});        	
        });

	});
</script>