<!--  

	FORM UPLOAD
	================
	Config
		post type = 1 (file)

	Field (class)
	|-	cat-id		=> taxonomy
	|-	upl-file	=> post
	|-	dsc-file	=> meta

	Execution button (class)
	|-	upl-btn

-->

<script>
	// this for upload file button
	$(document).on('change', '.btn-file :file', function() {
		var input 		= $(this),
			numFiles 	= input.get(0).files ? input.get(0).files.length : 1,
			label 		= input.val().replace(/\\/g, '/').replace(/.*\//, '');

		input.trigger('fileselect', [numFiles, label]);
	});

	$(document).ready(function() {

		$('.myForm').validate({
			ignore: [],
			submitHandler: function(form) {
				$.ajax({
					url: 'bimbingan/update_file',
					type: 'post',
					dataType: 'json',
					data: $('.myForm').serialize(),
					success: function  (json) {
						if (json.stat) {
							$('.content').load('bimbingan');
						};
					}
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}
		});
		
		$('.upl-btn').click(function() {
			var 
				formData 	= new FormData(),
				id 			= $('.cat-id').val(),
				dsc			= $('.dsc-file').val();

			formData.append('file', $('.upl-file')[0].files[0]);

			$.each($('#myForm').serializeArray(), function(a, b){
				formdata.append(b.name, b.value);
			});

			$.ajax({
				url: 'bimbingan/upl_proses/'+id+'/'+dsc,
				type: 'POST',
				data: formData,
				// dataType: 'json',
				cache: false,
				processData 	: false,  // tell jQuery not to process the data
				contentType 	: false  // tell jQuery not to set contentType
			});
			$('.content').load('bimbingan');
			// $('.cat-id').val('1');
			// $('.upl-in-file').val('')
			// $('.dsc-file').val('');
			// $('.cat').load('bimbingan/cat/'+<?php echo $this->session->userdata('uid'); ?>);
		});	

		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {

			var input 	= $(this).parents('.input-group').find(':text'),
				log 	= numFiles > 1 ? numFiles + ' files selected' : label;

			if( input.length ) {
				input.val(log);
			} else {
				if( log ) 
					alert(log);
			}
		});
	});
	
</script>