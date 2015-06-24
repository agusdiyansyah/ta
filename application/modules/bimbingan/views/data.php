<style type="text/css">
	h2{
		margin-top: 0px;
	}
	.btn-file {
	    position: relative;
	    overflow: hidden;
	}
	.btn-file input[type=file] {
	    position: absolute;
	    top: 0;
	    right: 0;
	    min-width: 100%;
	    min-height: 100%;
	    font-size: 100px;
	    text-align: right;
	    filter: alpha(opacity=0);
	    opacity: 0;
	    outline: none;
	    background: white;
	    cursor: inherit;
	    display: block;
	}
	.input-group{
		margin-bottom: 15px;
	}
	.title-name{
		background: #fff;
		color: #6CB6AE;
		padding: 15px;
	}
	.ket{
		font-size: 8pt;
	}
	.aksi{
		float: right;
	}
	.scroll{
		padding-right: 15px;
	}
</style>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<h2 class="title-name">Agus Diyansyah</h2>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
					<!-- judul ta -->
					<legend>Tugas Akhir</legend>
					<blockquote>
						<p>
							<b>Judul</b> <br>
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
						</p>
						<b>Pembimbing</b>
						<footer>
							Nama Pembimbing <span class="label label-default">offline</span>
						</footer>						
					</blockquote>
					<legend>Kategori Laporan</legend>
					<div class="panel-group" id="accordion">
						<?php  
						if (!empty($cat)) {
							foreach ($cat as $key) {
								$json = json_decode($key->t_name);
								?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<div class="aksi">
										<a href=""><i class="fa fa-file-word-o"></i></i><sup>3</sup></a>
										<a href=""><i class="fa fa-edit"></i><sup>3</sup></a>
										<a href=""><i class="fa fa-info"></i></a>
									</div>
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo str_replace(" ", "-", "-".$json->title) ?>">
										<?php echo $json->title ?>
									</a>
								</h4>
							</div>
							<div id="collapseOne<?php echo str_replace(" ", "-", "-".$json->title) ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<?php echo $json->content ?>
								</div>
							</div>
						</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
					<legend>Upload File</legend>
					<form>		
						<div class="form-group">
							<?php  
							foreach ($cat as $key) {
								$json = json_decode($key->t_name);
								$opt[$key->TID] = $json->title;
							}
							echo form_dropdown('cat_opt', $opt, set_value(empty($default['cat']) ? '' : $dafault['cat']), 'class="form-control" required="required"');
							?>
						</div>
				        <div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-default btn-file" type="button">
									Attach File<input type="file" multiple>
								</button>
							</span>
							<input type="text" class="form-control" readonly>
						</div><!-- /input-group -->
						<div class="form-group">
							<input type="text" class="form-control" id="title" placeholder="Title">
						</div>
						<div class="form-group">
							<textarea class="form-control" placeholder="Description"></textarea>
						</div>
					</form>
					<button type="button" class="btn btn-default">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
					<legend>Komentar</legend>
					<form>					
						<div class="form-group">
							<textarea name="komen" id="inputKomen" class="form-control" rows="3" required="required"></textarea>
						</div>
					</form>
					<button type="button" class="btn btn-default">Kirim</button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
					<blockquote>
						<b>Nama kategori laporan</b>
						<span>
							<footer>
								Nama file
							</footer>
						</span>
					</blockquote>
					<div class="scroll">
						<?php  
						for ($i=0; $i < 5; $i++) { 
							?>
						<div class="alert alert-success" role="alert">
							<b>Pembimbing</b> <small class="ket"> at 15/08/2015 07:00</small>
							<br>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
							</p>
						</div>
						<div class="alert text-right">
							<b>You</b> <small class="ket"> at 15/08/2015 07:00</small>
							<br>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
							</p>
						</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".panel-default").hover(
		function () {
			$(this).find(".aksi").show();
		},
		function () {
			$(this).find(".aksi").hide();
		}
	);

	$(".scroll").slimScroll({
	    position        : 'right',
	    height          : '478px',
	    color			: '#ECF0F1',
	    railVisible     : false,
	    alwaysVisible   : true,
	    disableFadeOut  : true,
	    wheelStep       : 50
	});


	// this for upload file
	$(document).on('change', '.btn-file :file', function() {
		var input 		= $(this),
			numFiles 	= input.get(0).files ? input.get(0).files.length : 1,
			label 		= input.val().replace(/\\/g, '/').replace(/.*\//, '');

		input.trigger('fileselect', [numFiles, label]);
	});

	$(document).ready( function() {
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