<?php  
	$this->load->view('meta/head');
?>
<div class="container">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-push-4 col-sm-push-4 col-md-push-4 col-lg-push-4 group">
			<h3>Login</h3>
			<p>
				<?php  
				echo (empty($this->session->flashdata('msg'))) ? 'Silahkan masuk dengan memginputkan username dan password untuk masuk kedalam Bimbol' : $this->session->flashdata('msg');
				?>
			</p>
			<hr>
			<form action="<?php echo base_url() ?>app/login_proses" method="POST" role="form">
			
				<div class="form-group">
					<input type="text" class="form-control" name="u_name" placeholder="NIM / NIP">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="u_pass" placeholder="Password">
				</div>
				<hr>
				<div class='text-right'>
					<button type="submit" class="btn btn-primary">Masuk <i class="fa fa-arrow-right"></i></button>
				</div>
				
			</form>
		</div>
	</div>
</div>