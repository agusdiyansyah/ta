<script>
	$(document).ready(function() {

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
	  			var 
	  				lama = $('.data-pesan').html(),
	  				sender = '<?php echo $this->session->userdata('u_nicename'); ?>',
	  				date = '<?php echo date('d-m-Y H:i:s') ?>',
	  				wasiat = $('.komen').val(),
	  				level = '<?php echo $this->session->userdata('u_level'); ?>',
	  				warna = function () {
	  					if (level == 2) {
	  						return 'success';
	  					} else{
	  						return 'default';
	  					};
	  				},
	  				baru = '';
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
							// $(".content").load('bimbingan');
							baru = 	"<div class='alert alert-"+warna+"' role='alert'>"+
									"	<b> "+sender+" </b> <small class='ket'> at "+date+"</small>"+
									"	<br>"+
									"	<p>"+wasiat+
									"	</p>"+
									"</div>";
							$('.data-pesan').html(baru+lama);
							$('.komen').val("");
			                // $(".title").html(title);
						}
						$('.ac-btn').prop('disabled', false);
					}
				});
	    		return false;
	  		}
		});

		$('.rmv').click(function() {
			var id = $('.id_mhs').val();
			$('.area-kanan').load('bimbingan/kmn_data/'+id, function () {
				$('.pid').val(id);
			});
		});
		
		$(".scroll").slimScroll({
		    position        : 'right',
		    height          : '478px',
		    color			: '#ECF0F1',
		    railVisible     : false,
		    alwaysVisible   : true,
		    disableFadeOut  : true,
		    wheelStep       : 50
		});

		$('.data-pesan').show(function() {
			var 
				data 	= $.parseJSON($('data pesan').html()),
				tmp  	= $('.data-pesan');
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
					}
				};

			$.extend(true, data, fun);

			console.log(data);

			var
				mst		= Mustache.render(tmp.html(), data);

			tmp.html(mst);
		});
	});
</script>