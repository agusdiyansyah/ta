<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
	<form class="form-horizontal frm-set" role="form">
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<legend>Jadwal</legend>
			</div>
		</div>
		<div class="form-group">
			<label for="input-title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<textarea class='teks-title form-control' name="title"><?php echo $meta->title ?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="input-tanggal" class="col-sm-2 control-label">Tanggal Ujian</label>
			<div class="col-sm-3">
				<input type="text" name="tgl_ujian" value="<?php echo $meta->tgl_ujian ?>" class="form-control tgl-ujian" id="input-tanggal" placeholder="Tanggal">
			</div>
			<div class="col-sm-3">
				<input type="text" name="jam_mulai" value="<?php echo $meta->jam_mulai ?>" class="form-control jam-mulai" id="input" placeholder="Jam mulai">
			</div>
			<div class="col-sm-1">
				<select name="kondisi" id="input-kondisi" class="form-control" required="required">
					<option value="<" <?php ($meta->kondisi == "<") ? 'selected' : '' ; ?> >sebelum</option>
					<option value=">" <?php ($meta->kondisi == ">") ? 'selected' : '' ; ?>>sesudah</option>
				</select>
			</div>
			<div class="col-sm-3">
				<input type="text" name="jam_selesai" value="<?php echo $meta->jam_selesai ?>" class="form-control jam-selesai" id="input" placeholder="Jam selesai">
			</div>
		</div>

		<div class="form-group">
			<label for="input-tanggal" class="col-sm-2 control-label">Waktu Ujian</label>
			<div class="col-sm-5">
				<input type="text" name="jam_istirahat" value="<?php echo $meta->jam_istirahat ?>" class="form-control jam-istirahat" id="input" placeholder="Lama istirahat">
			</div>
			<div class="col-sm-5">
				<input type="text" name="jam_ujian" value="<?php echo $meta->jam_ujian ?>" class="form-control lama-ujian" id="input" placeholder="Lama ujian">
			</div>
		</div>

		<hr>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<legend>Foother</legend>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Tanggal pembuatan jadwal</label>
			<div class="col-sm-5">
				<input type="text" name="tgl_jadwal" value="<?php echo $meta->tgl_jadwal ?>" class="form-control tgl-jadwal" id="input" placeholder="Tanggal jadwal">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Penanggung jawab</label>
			<div class="col-sm-5">
				<input type="text" name="nama" value="<?php echo $meta->nama ?>" class="form-control" id="input" placeholder="Nama">
			</div>
			<div class="col-sm-5">
				<input type="number" name="nip" value="<?php echo $meta->nip ?>" class="form-control" id="input" placeholder="Nip">
			</div>
		</div>
	</form>
	<hr>
	<div class="text-right">
		<button class='btn btn-primary'><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>gudang/tinymce/tinymce.min.js"></script>
<script>

	$(document).ready(function() {

		tinymce.init({
            selector: ".teks-title",
            menubar: false,
            toolbar: false,
            statusbar: false,
            setup: function (editor) {
		        editor.on('change', function () {
		            tinymce.triggerSave();
		        });
		    }
        });

		$('.jam-istirahat, .lama-ujian, .jam-mulai, .jam-selesai').datetimepicker({
            use24hours: true,
	        format: 'HH:mm',
	        pickDate: false
        });

        $('.tgl-ujian, .tgl-jadwal').datetimepicker({
        	pickTime: false,
        	format: 'DD-MM-YYYY'
        });

		$('.btn-primary').click(function() {
			$.ajax({
				url: 'jadwal/simpan_setting',
				type: 'post',
				dataType: 'json',
				data: $('.frm-set').serialize(),
				success: function (json) {
					if (json.stat) {
						$('.content').load('jadwal');
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
			
		});
	});
</script>
<!-- 
	title
	tgl_ujian
	jam_mulai
	kondisi
	jam_selesai
	jam_istirahat
	jam_ujian
	tgl_jadwal
	nama
	nip 
-->