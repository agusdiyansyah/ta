
<script>
	$(document).ready(function() {
		// $('.cat_laporan').load('statistic/laporan/form');

		$('.lap').show(function() {
			var 
				data 	= $.parseJSON($('data laporan').html()),
				tmp  	= $('.lap'),
				mst		= Mustache.render(tmp.html(), data);
			tmp.html(mst);

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
							$(".content").load('statistic');
			                // $(".title").html(title);
						}
						$('.ac-btn').prop('disabled', false);
					}
				});
	    		return false;
	  		}
		});
		$('.data-komen').show(function() {
			var 
				data 	= $.parseJSON($('data komen').html()),
				tmp  	= $('.data-komen');
			var 
				fun = {
					"warna" : function () {
						if (this.level == 1) {
							return "info";
						} else if (this.level == 2){
							return "success";
						} else {
							return "default";
						};
					},
				};
			$.extend(true, data, fun);

			var
				mst		= Mustache.render(tmp.html(), data);

			tmp.html(mst);
		});
		$(".scroll").slimScroll({
		    position        : 'right',
		    height          : '250px',
		    color			: '#ECF0F1',
		    railVisible     : false,
		    alwaysVisible   : true,
		    disableFadeOut  : true,
		    wheelStep       : 50
		});

		$(".title").hover(
			function () {
				$(this).find(".aksi").show();
			},
			function () {
				$(this).find(".aksi").hide();
			}
		);

	});
</script>

<script>
	$(document).ready(function() {
		$('.btn-del').click(function() {
			var id = $(this).data('tid');
			// console.log(id);
			$.ajax({
				url:'statistic/laporan/delete',
				dataType:'json',
				type:'post',
				cache:false,
				data:'id='+id,
				beforeSend:function(){
					// console.log($(".form-lap").serialize());
				},
				success:function(json){
					if(json.stat){
						$('.st_lap').load('statistic/laporan');
					} else {
						// $('.cat_laporan').load('statistic/laporan/form');
						alert()
					}
				}
			});  
		});

		$('.btn-edit').click(function() {
			var id = $(this).data('tid');
			console.log(id);
			$.ajax({
				url:'statistic/laporan/get/',
				data: 'id='+id,
				type: 'post',
				dataType:'json',
				cache:false,
				beforeSend:function(){
					// console.log($(".form-lap").serialize());
				},
				success:function(json){
					console.log(json);
					if(json.stat){
						// $('.st_lap').load('statistic/laporan/form');
						$('.cat_laporan').load('statistic/laporan/form', function() {
							$('.title').val(json.title);
							$('.ket-lap').html(json.ket);
							$('.btn-primary').html('Update');
							$('.ac').val(id);
						});;
					} else {
						alert()
					}
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

		$('.btn-view').click(function() {
			var id = $(this).data('tid');
			console.log(id);
			$.ajax({
				url: 'statistic/laporan/detil',
				type: 'post',
				dataType: 'json',
				data: 'id='+id,
				cache: false,
				success: function (json) {
					$('.layout').load('statistic/laporan/detil', function () {
						$('h3').html(json.title);
						$('p').html(json.ket);
					});
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

		$('.add-lap').click(function() {
			$('.cat_laporan').load('statistic/laporan/form');
		});
	});
</script>