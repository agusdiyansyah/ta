<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gudang/css/plugins/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gudang/css/plugins/component.css" />
<style type="text/css">
	.wait{
		font-size: 12pt;
		color: #ECF0F1;
		font-weight: normal;
	}

	tr{
		color: #34495E;
	}
	td{
		cursor: pointer;
	}
	a{
		color: #3498DB;
	}
	td a:hover{
		color: #34495E;
		text-decoration: none;
	}
	.cbp-spmenu{
		z-index: 10000;
		width: 225px;
		background: #364150;
		/*border-right: 5px solid #EFF1F3;*/
	}
	.form{
		padding: 8px;
	}
	.sub-form{
		margin-left: 7px;
	}
	.cbp-spmenu legend, .cbp-spmenu label{
		color: #8E9BAE;
		font-weight: normal;
	}
	.btn-primary{
		border-radius: 0px;
		background: #3498DB;
	}
	.btn-danger{
		border-radius: 0px;
		background: #E74C3C;
	}
	.panel-heading{
		padding: 0;
		border-radius: 0px;
		height: 37px;
		background: #F7F9FA !important;
	}
	.panel-heading a{
		float: left;
		background: #95A5A6;
		color: #fff;
		padding: 8px;
		text-decoration: none;
	}
	.panel-heading a:hover{
		background: #7F8C8D;
		color: #fff
	}
	.panel{
		border-radius: 0px;
		border: none;
		border-color: #ECF0F1 !important;
	}
	.panel-default>.panel-heading{
		border-color: #ECF0F1 !important;	
		border: none;
	}
	#title{
		font-weight: bold;
		padding: 9.5px 20px;
		background: #2B3643;
		color: #8E9BAE
	}
</style>

<body class="cbp-spmenu-push">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="javascript:;" id="action">
		            	Tambah data
		            </a>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="input-group">
								<input type="text" class="form-control cari">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default btn-src"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<?php echo $pagination; ?>
						</div>
					</div>
					<?php 
						echo 
							$table. 
							$pagination; 
					?>
				</div>
			</div>
		</div>
	</div>
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s2">
		<div id='title'>Data Mahasiswa</div>
		<div class="form">
			<form action="" role="form" class="form">
				<input type="hidden" class="id" name="id">
				<div class="form-group">
					<label for="">NIM</label>
					<input name="nim" type="text" class="form-control nim" id="">
				</div>
				<div class="form-group">
					<label for="">Nama Mahasiswa</label>
					<input name="nama" type="text" class="form-control nama" id="">
				</div>
				<div class="form-group">
					<label for="">Dosen Pembimbing</label>
					<?php  
						echo form_dropdown('dosen', $opt, 'default', ' class="form-control dosen"');
					?>
				</div>
				<div class="form-group">
					<label for="">Judul Tugas Akhir</label>
					<textarea name="judul" style="height:100px" class="form-control judul"></textarea>
				</div>
			</form>
			<div class="sub-form">
				<span id="btn-ac"></span>
				<span id="btn-back">
					<button class="btn btn-danger" id="back">Kembali</button>
				</span>
			</div>
		</div>
	</nav>
</body>

<script>
	// var declaration
	var 
		body 		= $("body"),
		menuRight 	= document.getElementById( 'cbp-spmenu-s2' );
	
	// action target
	$("#action").click(function() {
		$("#cbp-spmenu-s2").toggleClass('cbp-spmenu-open');
		$("#btn-ac").html('<button onClick="proses()" class="add btn btn-primary">Simpan</button>');
		$(".form").attr('action','mahasiswa/tambah_proses');
		$(".id").val('');
		$(".nim").val('');
		$(".nama").val('');
		$(".dosen").val('');
		$(".judul").val('');
	});

	$("#back").click(function() {
		$("#cbp-spmenu-s2").removeClass('cbp-spmenu-open');
	});

	$('.btn-src').click(function() {
		var
			src = $('.cari').val();

		$.ajax({
			url: 'mahasiswa/cari',
			type: 'post',
			dataType: 'html',
			cache: false,
			data: 'kunci='+src,
			success:function(html) {
				$(".content").load('mahasiswa');
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

	

	// function
	function page (num, id) {
		$.ajax({
			url: 'mahasiswa/index/'+num,
			type: 'post',
			data: 'page='+id,
			cache: false,
			dataType: 'html',
			success:function(html) {
				$(".content").html(html);
				$(".title").html('Mahasiswa');
			}
		})
	}

	function hapus (id, num, idp) {
		$("#cbp-spmenu-s2").removeClass('cbp-spmenu-open');
		$.ajax({
			url: 'mahasiswa/hapus/'+id,
			cache: false,
			type: 'post',
			data: 'page='+page,
			dataType: 'json',
			beforeSend:function() {
				$(".aksi").html('<span class="wait">tunggu ...</span>&nbsp');
			},
			success:function(json) {
				if (json.stat) {
					page(num,idp);
				};
			}
		});

	}

	function edit (id) {
		$("#cbp-spmenu-s2").addClass('cbp-spmenu-open');
		$(".form").attr('action','mahasiswa/edit_proses');
		$("#btn-ac").html('<button onClick="proses()" class="add btn btn-primary">Update</button>');
		$.ajax({
			url: 'mahasiswa/edit/'+id,
			type: 'post',
			cache: false,
			dataType: 'json',
			success:function(json) {
				if (json.stat) {
					$(".id").val(json.id_mhs);
					$(".nim").val(json.nim);
					$(".nama").val(json.nama);
					$(".dosen").val(json.id_dosen);
					$(".judul").val(json.judul);
				};
			}
		})
	}

	function proses () {
		var 
			ac = $(".form").attr('action'),
			field = $(".form").serialize();
		
		$.ajax({
			url: ac,
			cache: false,
			type: 'post',
			data: field,
			dataType: 'html',
			beforeSend:function() {
				$("#btn-ac").html('<span class="wait">tunggu ...</span>&nbsp');
				$("#btn-back").html('');
			},
			success:function(html) {
				$(".content").html(html);
				$(".title").html('Mahasiswa');
			}
		})
	}
</script>