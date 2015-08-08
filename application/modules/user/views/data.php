<style type="text/css">
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

<script>
	// var declaration
	var 
		body 		= $("body");

	// function
	function page (num, id) {
		$.ajax({
			url: 'user/index/'+num,
			type: 'post',
			data: 'page='+id,
			cache: false,
			dataType: 'html',
			success:function(html) {
				$(".content").html(html);
				$(".title").html('User');
			}
		})
	}

	function hapus (id, num, idp) {
		$.ajax({
			url: 'user/hapus/'+id,
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
		$.ajax({
			url: 'user/edit/'+id,
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

	$('.btn-src').click(function() {
		var
			src = $('.cari').val();

		$.ajax({
			url: 'user/cari',
			type: 'post',
			dataType: 'html',
			cache: false,
			data: 'kunci='+src,
			success:function(html) {
				$(".content").load('user');
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
</script>