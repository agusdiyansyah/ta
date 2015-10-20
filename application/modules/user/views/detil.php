<?php  
	$level = array(
		'1' => 'Admin',
		'2' => 'Dosen',
		'3' => 'Mahasiswa',
	);
?>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 group">
	<h1>
		<?php echo $u_nicename ?>
	</h1>
	<h5>
		<?php echo $level[$u_level] ?>
	</h5>
	<?php  
	if (!empty($judul)) {
		?>
		<hr>
		<?php
		echo $judul;
	}
	?>
</div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
		<?php  
		if ($u_reg == 0) {
			?>
			<div class="alert alert-danger" role="alert"><b><?php echo $u_pass ?></b></div>
			<?php
		}
		?>
		<form class='frm-reg'>
			<legend>
				<?php  
				if ($u_reg == 0) {
					echo "Registration";
				} else {
					echo "Update Data";
				}
				?>
			</legend>
			<input type="hidden" name='uid' class='uid' value="<?php echo $uid ?>">
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name='name' class="form-control" value="<?php echo $u_nicename ?>">
			</div>
			<hr>
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" name='u_name' class="form-control" value="<?php echo $u_name ?>">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name='u_pass' class="form-control">
			</div>
		
			
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.frm-reg').validate({
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
		        //error.appendTo( element.parent("div"));
		        error.insertAfter(element);
		    },
		    highlight: function (element, validClass) {
		        $(element).parent().addClass('has-error');
		    },
		    unhighlight: function (element, validClass) {
		        $(element).parent().removeClass('has-error');
		    },
			submitHandler: function(form) {
				var uid = $('.uid').val();
				$.ajax({
					url: 'user/update',
					type: 'post',
					dataType: 'json',
					data: $('.frm-reg').serialize(),
					cache: false,
					success: function (json) {
						if (json.stat) {
							location.reload();
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