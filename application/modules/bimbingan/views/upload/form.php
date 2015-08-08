
<!--  

	FORM UPLOAD
	================

	Class name
	|-	cat-id
	|-	upl-file
	|-	dsc-file

	Execution button
	|-	upl-btn

-->

<legend>Upload File</legend>

<form method="post" class="myForm" action="#" enctype="multipart/form-data">
	<!-- taxonomy id -->
	<div class="form-group">
		<?php  
		$opt['1'] = "Uncategories";
		foreach ($cat as $key) {
			$opt[$key->TID] = $key->t_name;
		}
		echo form_dropdown('cat_id', $opt, set_value(empty($default['cat']) ? '' : $dafault['cat']), 'class="form-control cat-id" required="required"');
		?>
	</div>

	<!-- button file upload -->
	<div class="input-group">
		<span class="input-group-btn">
			<button class="btn btn-default btn-file" type="button">
				Attach File<input type="file" class='upl-file' name='file'>
				<!-- Attach File<input type="file" class='upl-file' multiple> -->
			</button>
		</span>
		<input type="text" class="form-control upl-in-file" readonly>
	</div>

</form>
<!-- execution :D -->
<button type="button" class="btn btn-default upl-btn">Simpan</button>
<?php  
	$this->load->view('upload/js');
?>