<style type="text/css">
	.wait{
		font-size: 10pt;
		color: #95A5A6;
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
	
	.panel-heading{
		padding: 0;
		border-radius: 0px;
		height: 37px;
		background: #F7F9FA !important;
	}
	.panel-heading #action{
		float: left;
		background: #95A5A6;
		color: #fff;
		padding: 8px;
		text-decoration: none;
	}
	.panel-body label{
		font-weight: normal;
		color: #95A5A6;
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
</style>

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

<script>
	// var declaration


	// action target

	$("tr").hover(
		function () {
			$(this).find(".aksi").show();
		},
		function () {
			$(this).find(".aksi").hide();
		}
	);

	// function
	function page (num, id) {
		$.ajax({
			url: 'dosen/index/'+num,
			type: 'post',
			data: 'page='+id,
			cache: false,
			dataType: 'html',
			success:function(html) {
				$(".content").html(html);
				$(".title").html('dosen');
			}
		})
	}

	function hapus (id, num, idp) {
		$("#cbp-spmenu-s2").removeClass('cbp-spmenu-open');
		$.ajax({
			url: 'dosen/hapus/'+id,
			cache: false,
			type: 'post',
			data: 'page='+page,
			dataType: 'json',
			beforeSend:function() {
				$(".aksi").html('<span class="wait">tunggu ...</span>');
			},
			success:function(json) {
				if (json.stat) {
					page(num,idp);
				};
			}
		});

	}

	function edit (id) {
		$(".form").attr('action','dosen/edit_proses');
		$("#btn-ac").html('<button onClick="proses()" class="add btn btn-primary">Update</button>');
		$("#btn-back").html('<button onClick="bersih()" class="back btn btn-danger">Bersihkan</button>');
		$.ajax({
			url: 'dosen/edit/'+id,
			type: 'post',
			cache: false,
			dataType: 'json',
			success:function(json) {
				if (json.stat) {
					$(".id").val(json.id_dosen);
					$(".nama").val(json.nama);
				};
			}
		});
		$('body,html').animate({
	        scrollTop : 0 
	    }, 500);
	}

	function bersih () {
		$(".nama").val("");
		$(".form").attr('action','');
		$("#btn-ac").html('<button onClick="proses()" class="add btn btn-primary">Simpan</button>');
		$("#btn-back").html('');
	}

	function proses () {
		var 
			ac = $(".form").attr('action'),
			field = $(".form").serialize();

		if (ac == '') {
			ac = 'dosen/tambah_proses';
		};
		
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
				$(".title").html('Dosen');
			}
		})
	}
</script>
