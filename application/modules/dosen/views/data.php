<?php  
/**
LOAD CSS
*/
	$this->load->view('css');
?>
<body class="cbp-spmenu-push">
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading" id="data">
					<div class="panel-heading">
					<span href="javascript:;" id="action">
		            	Data Dosen
		            </span>
				</div>
				</div>
				<div class="panel-body">
					<?php 
						echo 
							$pagination.
							$table. 
							$pagination; 
					?>
				</div>
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="panel panel-default" id="input-form">
				<div class="panel-heading">
					<span href="javascript:;" id="action">
		            	Tambah data
		            </span>
				</div>
				<div class="panel-body">
				   	<form action="" role="form" class="form">
						<input type="hidden" class="id" name="id">
						<div class="form-group">
							<label for="">Nip</label>
							<input name="nip" type="text" class="form-control nip" id="nip">
						</div>
						<div class="form-group">
							<label for="">Nama Dosen</label>
							<input name="nama" type="text" class="form-control nama" id="nama">
						</div>
					</form>
					<span id="btn-ac">
						<button onClick="proses()" class="add btn btn-primary">Simpan</button>
					</span>
					<span id="btn-back">
						
					</span>
				</div>
			</div>
		</div>
	</div>
</body>
<?php  
/**
LOAD JS
*/
	$this->load->view('js');
?>
