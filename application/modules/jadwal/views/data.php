<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gudang/css/plugins/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gudang/css/plugins/component.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gudang/css/module/jadwal.css" />
<style type="text/css">
	tr{
		height: 40px !important;
	}
</style>
<body class="cbp-spmenu-push" onload="expand()">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a id="action">
		            	Jadwal
		            </a>
		            <div>
		            	<a href="" class="btn-acak"><i class="fa fa-refresh"></i></a>
		            	<a href="javascript:;" class="btn-print"><i class="fa fa-print"></i></a>
		            </div>
				</div>
				<div class="panel-body">
					<?php 
						echo "<div class='text-center' style='color:#000;font-size:14pt;font-weight:bold'>".$meta['header']."</div><br>";
						echo $table;
					?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="col-xs-3 col-xs-push-9 col-sm-3 col-sm-push-9 col-md-3 col-md-push-9 col-lg-3 col-lg-push-9" style="color:#000">
							Pontianak, <?php echo $meta['tgl_jadwal'] ?>
							<br>
							Panitia Tugas Akhir
							<br>
							Penanggungjawab Administrasi
							<br>
							<br>
							<br>
							<b><u><?php echo $meta['nama'] ?></u></b>
							<br>
							NIP. <?php echo $meta['nip'] ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
		<form action="" role="form" class="form">		
		
		</form>
		<span id="btn-ac"></span>
		<span id="btn-back">
			<button class="btn btn-danger" id="back">Kembali</button>
		</span>
	</nav>
</body>

<script>
	// $(".panel-body").slimScroll({
	//     position: 'right',
	//     height: '500px',
	//     railVisible: true,
	//     alwaysVisible: true
	// });
	// var declaration
	var 
		body 		= $("body"),
		menuRight 	= document.getElementById( 'cbp-spmenu-s2' );
	// action target

	$("#back").click(function() {
		$("#cbp-spmenu-s2").removeClass('cbp-spmenu-open');
	});

	$(".btn-print").click(function() {
		$('.panel-body .table').css('color', '#fff !important');
		$('.panel-body').printArea();
	});

	$('.btn-acak').click(function() {
		$.ajax({
			url: 'jadwal/index/1',
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
			url: 'jadwal/index/'+num,
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
