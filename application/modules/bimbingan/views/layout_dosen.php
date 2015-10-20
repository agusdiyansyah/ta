<style type="text/css">
	.info{
		float: right;
	}
	.info i{
		width: 10px !important;
		margin-right: 5px
	}
	.info a{
		text-decoration: none;
	}
	canvas{
		width: 100%;
		height: 300px;
	}
</style>

<?php  
	$filter = array('.',',');
	
	$komen['komen'] = array();
	foreach ($kmn as $data) {
		$json = json_decode($data->p_name);
		$d = array(
			'sender' => $json->sender,
			'level' => $json->level,
			'tanggal' => $json->tanggal,
			'wasiat' => $json->wasiat,
		);
		array_push($komen['komen'] , $d);
	}
	$komen = json_encode($komen);
?>
<data class='merem'>
	<komen>
		<?php echo $komen ?>
	</komen>
</data>
<div class="row">
	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
			<legend>Mahasiswa Bimbingan</legend>
			<div class="panel-group" id="accordion">
				<?php foreach ($mhs as $res): ?>
					<div class="panel panel-default">
						<div class="panel-heading mhs-id" data-id="<?php echo $res->id ?>">
							<h4 class="panel-title">
								<div class='info'>
									<a href="javascript:;" class='btn-pesan' data-id="<?php echo $id[$res->id] ?>">
										<i class="fa fa-envelope-o"></i>
									</a>
								</div>
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo str_replace($filter, "", str_replace(' ', "-", "-".$res->nama)) ?>">
									<?php echo $res->nama ?>
								</a>
							</h4>
						</div>
						<div id="collapseOne<?php echo str_replace($filter, "", str_replace(' ', "-", "-".$res->nama)) ?>" class="panel-collapse collapse">
							<div class="panel-body">
								<b><?php echo $res->nim ?></b>
								<p>
									<?php echo $res->judul ?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
			<legend>Pengumuman</legend>
			<form class='frm-umum' method="POST" role="form">		
				<input type="hidden" name='type' value='2'>	
				<input type="hidden" name='pid' value='<?php echo $this->session->userdata('relasi'); ?>'>	
				<div class="form-group">
					<textarea name="komen" id="komen" class="form-control komen" rows="3" required="required"></textarea>	
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary ac-btn">Kirim</button>
				</div>
			</form>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group" style="margin-top:20px">
			<div class="scroll data-komen">
				{{#komen}}
				<div class="alert alert-{{warna}}" role="alert">
					<b> {{sender}} </b> <small class="ket"> at {{tanggal}}</small>
					<br>
					<p>
						{{wasiat}}
					</p>
				</div>
				{{/komen}}
			</div>
		</div>
	</div>
</div>

<script>
	
	$(document).ready(function() {
		$('.btn-pesan').click(function() {
			var
				id = $(this).data('id');

			$(".content").load('bimbingan/pesan/'+id);
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
					}
				};

			$.extend(true, data, fun);

			var
				mst		= Mustache.render(tmp.html(), data);

			tmp.html(mst);
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

	});
</script>