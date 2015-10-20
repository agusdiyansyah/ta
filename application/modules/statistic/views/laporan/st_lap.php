<?php  
	$this->load->view('laporan/css');
	/**
	DATA
	*/
	$komen['komen'] = array();
	foreach ($kmn as $data) {
		$json = json_decode($data->p_name);
		$d = array(
			'sender' => $json->sender,
			'level' => $json->level,
			'tanggal' => $json->tanggal,
			'wasiat' => $json->wasiat,
		);
		array_push($komen['komen'] , $d);
	}

?>
<data class='merem'>
	<laporan>
		<?php 
			echo json_encode($rec);
		?>
	</laporan>
	<komen>
		<?php  
			echo json_encode($komen);
		?>
	</komen>
</data>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<section class="cat_laporan group">
		<div class="row">

			<!-- title -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<legend>
					Laporan
					<?php  
					if ($this->user->grant('1', false)) {
						?>
						<div style="float:right">
							<button class="btn btn-default btn-xs add-lap"><i class="fa fa-plus"></i></button>
						</div>
						<?php
					}
					?>
				</legend>
			</div>
		</div>
		<div class="row">
			<!-- manajemen kategori laporan -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 lap">
						
						<div class="title">
							<a href="#"> {{nama}} </a>
							<hr>
						</div>
						{{#data}}
						<div class="title">
							<a href="javascript:;" data-tid="{{TID}}" class='btn-view'> {{t_name}} </a>
							<?php  
							if ($this->user->grant('1', false)) {
								?>
								<div class="aksi">
									<a href="javascript:;" data-tid="{{TID}}" class='btn-edit'><i class="fa fa-edit"></i></a>
									<a href="javascript:;" data-tid="{{TID}}" class='btn-del'><i class="fa fa-times"></i></a>
								</div>
								<?php
							}
							?>
							<hr>
						</div>
						{{/data}}
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<span class='alt'>
							Menghapus kategori laporan tidak akan menghapus file yang ada didalamnya, setiap file yang terhubung dengan kategori yang dihapus akan dipindahkan kedalam uncategories
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<section class="group">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<legend>
					<?php  
					if ($this->session->userdata('u_level') == 1) {
						echo "Pengumuman Dari Admin";
					} else {
						echo "Komentar";
					}
					?>
				</legend>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form class='frm-umum' method="POST" role="form">	
					<input type="hidden" name='type' value='2'>			
					<div class="form-group">
						<textarea name="komen" id="komen" class="form-control komen" rows="3" required="required"></textarea>	
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary ac-btn">Kirim</button>
					</div>
				</form>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="scroll data-komen">
					{{#komen}}
					<div class="alert alert-{{warna}}" role="alert">
						<b> {{sender}} </b> <small class="ket"> at {{tanggal}}</small>
						<br>
						<p>
							{{wasiat}}
						</p>
					</div>
					{{/komen}}
				</div>
			</div>
		</div>
	</section>
</div>
<?php  
	$this->load->view('laporan/js');
?>