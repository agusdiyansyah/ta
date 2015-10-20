<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
	<form class='frm-admin'>
		<legend>Tambah Admin</legend>
	
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name='name'>
		</div>
		<hr>
		<div class="form-group">
			<label for="">Username</label>
			<input type="text" class="form-control" name='u_name'>
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" class="form-control" name='u_pass'>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<script>
	$(document).ready(function() {
		$('.frm-admin').validate({
			ignore: [],
		
			errorClass: "error",
			rules:{
				u_name:{
					required:true
				},
				name:{
					required:true
				},
				u_pass:{
					required:true
				}
			},
			messages : {
				name:{
					required: "Name tidak boleh kosong"
				},
				u_name:{
					required: "Username tidak boleh kosong"
				},
				u_pass:{
					required: "Password tidak boleh kosong"
				}
			},
			errorPlacement: function (error, element) {
		        error.insertAfter(element);
		    },
		    highlight: function (element, validClass) {
		        $(element).parent().addClass('has-error');
		    },
		    unhighlight: function (element, validClass) {
		        $(element).parent().removeClass('has-error');
		    },
			submitHandler: function(form) {
				$.ajax({
					url: 'user/insert',
					type: 'post',
					dataType: 'json',
					data: $('.frm-admin').serialize(),
					cache: false,
					success: function (json) {
						if (json.stat) {
							$('.content').load('user');
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
	});
</script>