<script>
	$(document).ready(function() {
		$('.data-cat').show(function() {
			var 
				data 	= $.parseJSON($('data cat').html()),
				tmp  	= $('.data-cat'),
				mst		= Mustache.render(tmp.html(), data);
			tmp.html(mst);

		});
	});
</script>
<script>
	$(document).ready(function() {

		$('.file-ac').click(function(e) {
			// e.preventDefault();

			var lap = $('.laporan');
			var pid = $(this).data('pid');
			var ass = $('.asis-list-'+pid);

			lap.html($(this).html());
			$('.asis-pid').val(pid);

			$('.x-btn').html('<button class="btn btn-danger x-asis"><i class="fa fa-times"></i></button>');

		});

		/*$('.tes_coba').click(function(e) {
			e.preventDefault();
			$('.ac-asis[data-pid="25"]').html('Some text and markup');
		});*/

		function asis_reset () {
			$('.laporan').html('');
			$('.asis-pid').val('');
			$('.asis-txt').val('');
			$('.x-btn').html('');
			$('.btn-asis').html('Submit');
			$('.asis-ac').val('in');
		}

		// cencel asis
		$('.x-btn').on('click', '.x-asis', function(event) {
			event.preventDefault();
			asis_reset();
		});

		$('.cat-list').on('change', '.chk', function(e) {

			e.preventDefault();

			var val = null;
			var pid = $(this).data('pid');

			if ($(this).is(':checked')) {
				val = 1;
			};
			$.ajax({
				url: 'bimbingan/asis_chk',
				type: 'post',
				dataType: 'json',
				data: {pid: pid, val : val},
				success: function (json) {
					if (json.stat) {
						$(this).attr('checked', 'true');
					} else {
						$(this).attr('checked', 'false');
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

		// edit asistensi
		$('.cat-list').on('click', '.edit-asis', function(event) {
			event.preventDefault();
			var 
				xbtn 	= ' <button class="btn btn-danger x-asis"><i class="fa fa-times"></i></button>',
				pid 	= $(this).data('pid'),
				title 	= $(this).data('title')
			;
			$('.x-btn').html(xbtn);
			$('.btn-asis').html('Update');
			$('.asis-ac').val('up');
			$('.asis-pid').val(pid);
			$('.asis-txt').val(title);
		});

		// delete asistensi
		$('.cat-list').on('click', '.del-asis', function(event) {
			event.preventDefault();
			var pid = $(this).data('pid');
			$.ajax({
				url: 'bimbingan/asis_rm',
				type: 'post',
				dataType: 'json',
				data: {pid: pid},
				success: function (json) {
					if (json.stat) {
						$('.asis-'+pid).remove();
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

		$('.form-asis').validate({
			ignore: [],
		
			errorClass: "error",
			rules:{
				asis:{
					required:true
				}
			},
			messages:{
				asis:{
					required:'Asistensi tidak boleh kosong'
				}
			},
			errorPlacement: function (error, element) {
		        //error.appendTo( element.parent("div"));
		        error.insertAfter(element);
		    },
		    highlight: function (element, validClass) {
		        $(element).parent().addClass('has-error');
		    },
		    unhighlight: function (element, validClass) {
		        $(element).parent().removeClass('has-error');
		    },
			submitHandler: function(form) {
				var txt = $('.asis-txt');
				var pid = $('.asis-pid');
				var ass = $('.asis-list-'+pid.val());
				var ac  = $('.asis-ac').val();
				var url = 'bimbingan/asis';

				if (ac == 'up') {
					url = 'bimbingan/asis_up';
				};
				console.log(ac);

				$.ajax({
					url: url,
					type: 'post',
					dataType: 'json',
					data: $('.form-asis').serialize(),
					success: function (json) {
						if (json.stat) {
							if (ac == 'in') {
								var 
									chk = '<input class="chk" data-pid="'+json.pid+'" type="checkbox">',
									edit = ' <a href="" data-pid="'+json.pid+'" data-title="'+json.title+'" class="edit-asis"><i class="fa fa-edit"></i></a>',
									del = '<a href="" data-pid="'+json.pid+'" class="del-asis"><i class="fa fa-times"></i></a>',
									acasis = ' <a href="#" data-name="'+txt.val()+'" data-cat="" data-pid="'+json.pid+'" class="ac-asis">'+txt.val()+'</a>'
								;
								ass.append('<div class="asis-'+json.pid+'">'+chk+edit+del+acasis+'</div>');
								txt.val('');
							};
							if(ac == 'up'){
								$('.ac-asis[data-pid="'+json.pid+'"]').html(json.title);
								asis_reset();
							};
						}
					}
				});
				
			}
		});

// file-ac lama
		
		$('.cat-list').on('click', '.ac-asis', function(event) {
			event.preventDefault();
			var
				file_name 	= $(this).data('name'),
				pid 		= $(this).data('pid')
				cat_name	= $(this).data('cat');

			$.ajax({
				url: 'bimbingan/kmn_id',
				type: 'post',
				dataType: 'html',
				data: {file_name: file_name, pid : pid, cat_name : cat_name},
				success: function (html) {
					$('.area-kanan').html(html);
					$('.typ').val('4');
					$('.pid').val(pid);
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
			

			// $('.area-kanan').load('bimbingan/kmn_id/'+pid+'/'+cat_name+'/'+file_name);

			$('body,html').animate({
		        scrollTop : 0 
		    }, 500);
		});

		$('.rm').click(function(e) {
			e.preventDefault();
			var
				pid = $(this).data('pid');

			$.ajax({
				url: 'bimbingan/del_file/'+pid,
				type: 'post',
				dataType: 'json',
				cache: false,
				success: function  (json) {
					if (json.stat) {
						$('.content').load('bimbingan');
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

		$(".frm-umum").validate({
			ignore: [],
		
			errorClass: "error",
			rules:{
				komen:{
					required:true
				}
			},
			errorPlacement: function (error, element) {
	            //error.appendTo( element.parent("div"));
	            error.insertAfter(element);
	        },
	        highlight: function (element, validClass) {
	            $(element).parent().addClass('has-error');
	        },
	        unhighlight: function (element, validClass) {
	            $(element).parent().removeClass('has-error');
	        },
	  		submitHandler: function(form) {
	  			$.ajax({
					url:'bimbingan/kmn_umum',
					dataType:'json',
					type:'post',
					cache:false,
					data:$(".frm-umum").serialize(),
					beforeSend:function(){
						$('.ac-btn').prop('disabled', true);
					},
					success:function(json){
						if(json.stat){
							$(".content").load('bimbingan');
						}
						$('.ac-btn').prop('disabled', false);
					}
				});
	    		return false;
	  		}
		});

	});
</script>