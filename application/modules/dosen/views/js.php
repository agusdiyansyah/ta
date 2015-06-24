<script>
	// var declaration


	// action target

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
		$("#btn-back").html('<button onClick="bersih()" class="back btn btn-danger">Batal</button>');
		$.ajax({
			url: 'dosen/edit/'+id,
			type: 'post',
			cache: false,
			dataType: 'json',
			success:function(json) {
				if (json.stat) {
					$(".id").val(json.id_dosen);
					$(".nip").val(json.nip);
					$(".nama").val(json.nama);
				};
			}
		});
		$('body,html').animate({
	        scrollTop : 0 
	    }, 500);
	}

	function bersih () {
		$(".nip").val("");
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