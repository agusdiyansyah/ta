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
	.group{
		background: #fff;
		padding: 15px;
		/*margin: 15px;*/
	}
	.title-name{
		background: #fff;
		color: #6CB6AE;
		padding: 15px;
	}
	.alert .ket{
		border-top: 1px solid silver;
		padding-top: 5px;
		margin-top: 5px;
		text-align: right;
	}
	.aksi{
		float: right;
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
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										Cover
									</a>
									<div class="aksi">
										<a href=""><i class="fa fa-edit"></i><sup>3</sup></a>
										<a href=""><i class="fa fa-info"></i></a>
									</div>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										Pengesahan
									</a>
									<div class="aksi">
										<a href=""><i class="fa fa-edit"></i><sup>3</sup></a>
										<a href=""><i class="fa fa-info"></i></a>
									</div>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										Bab 1
									</a>
									<div class="aksi">
										<a href=""><i class="fa fa-edit"></i><sup>3</sup></a>
										<a href=""><i class="fa fa-info"></i></a>
									</div>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
					<legend>Upload File</legend>
					<form>		
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
					<div class="alert alert-success" role="alert">
						<b>Pembimbing</b> <br>
						<p>
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
						</p>
						<div class="ket">15/08/2015 <b>07:00</b></div>
					</div>
					<div class="alert text-right">
						<b>You</b> <br>
						<p>
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
						</p>
						<div class="ket">15/08/2015 <b>07:00</b></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".panel-title").hover(
		function () {
			$(this).find(".aksi").show();
		},
		function () {
			$(this).find(".aksi").hide();
		}
	);
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