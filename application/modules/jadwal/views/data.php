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
	a{
		color: #3498DB;
	}
	.cbp-spmenu{
		color: #34495E;
		background: #2B3643;
		padding: 50px 15px;
	}
	.cbp-spmenu legend, .cbp-spmenu label{
		color: #ECF0F1;
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
	.panel-heading div{
		float: right;
	}
	.panel-heading div a:hover{
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
	.verticalText {
		-webkit-transform: rotate(-90deg);
		   -moz-transform: rotate(-90deg);
		    -ms-transform: rotate(-90deg);
		     -o-transform: rotate(-90deg);
		        transform: rotate(-90deg);
		vertical-align: inherit !important;
	}
	@media print{
		#cbp-spmenu-s2{
			display: none;
		}
		.panel-heading{
			display: none;
		}
	}
	table{
		overflow-wrap: break-word;
		word-wrap: break-word;
	}
	td, th {
	 	border: 1px solid #000 !important;
		color: #000 !important
	}
	table caption{
		text-align: center;
		font-size: 14pt;
		color: #000 !important
	}
	table caption hr{
		border-bottom: 4px double #000;
	}
</style>

<body class="cbp-spmenu-push">
	<br>
	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a id="action">
		            	Jadwal
		            </a>
		            <div>
		            	<a href="javascript:;" class="btn-print"><i class="fa fa-print"></i></a>
		            </div>
				</div>
				<div class="panel-body">
					<?php 
						echo $table;
					?>
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
<script src="<?php echo base_url() ?>gudang/js/jquery.PrintArea.js"></script>
<script>
	// var declaration
	var 
		body 		= $("body"),
		menuRight 	= document.getElementById( 'cbp-spmenu-s2' );
	// action target
	$(".side-nav span").css('display', 'none');
	$(".side-nav").css('width', '50px');
	$("#wrapper").css('padding-left', '50px');

	$("#back").click(function() {
		$("#cbp-spmenu-s2").removeClass('cbp-spmenu-open');
	});

	$(".btn-print").click(function() {
		// $("#cbp-spmenu-s2").css('display', 'none');
		$('#page-wrapper').printArea();
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
