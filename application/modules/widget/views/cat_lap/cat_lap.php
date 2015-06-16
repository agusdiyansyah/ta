<style type="text/css">
	tr{
		height: 20px;
	}
	.aksi{
		float: right;
	}
</style>
<section class="cat_laporan group">
	<div class="row">
		<!-- title -->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<legend>
				Laporan
			</legend>
		</div>
	</div>
	<div class="row">
		<!-- manajemen kategori laporan -->
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="input-group">
						<input type="text" class="form-control title" id="title" placeholder="Kategori Laporan">
						<div class="input-group-btn grb">
							<button class="btn btn-default add-btn" onclick="add()" type="button">
								<i class="fa fa-save"></i>
							</button>
						</div>
					</div>
					<br>
					<div class="form-group">
						<textarea name="ket" id="ket" class="form-control content" rows="3" required="required" placeholder="Keterangan"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<br>
					<div class="panel-group" id="accordion">
						<?php $this->load->view('cat_lap/data_cat', $default); ?>
					</div>
				</div>
			</div>
		</div>

		<!-- statistic kategori laporan -->
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="dropdown btn-xs" style="padding-left:0px;margin-bottom:10px">
				<button class="btn btn-default btn-md dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
					<i class="fa fa-gears"></i> <span>Progress</span>
				</button>
				<ul class="dropdown-menu text-right" role="menu" aria-labelledby="dLabel">
					<li><a href="">Progress</a></li>
					<li><a href="">Top Student</a></li>
				</ul>
			</div>
			<div>
				<canvas id="canvas" height="200" width="600"></canvas>
			</div>
		</div>
	</div>
</section>

<script src="<?php echo base_url() ?>gudang/js/plugins/chart.js"></script>
<script>

	$(".panel-title").hover(
		function () {
			$(this).find(".aksi").show();
		},
		function () {
			$(this).find(".aksi").hide();
		}
	);
	var lineChartData = {
		labels : [
			"January",
			"February",
			"March",
			"April",
			"May",
			"June",
			"July"
		],
		datasets : [
			{
				label: "My First dataset",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [12,4,4,1,5,9,0]
			},
			{
				label: "My Second dataset",
				fillColor : "rgba(68,182,174,0.5)",
				strokeColor : "rgba(68,182,174,1)",
				pointColor : "rgba(68,182,174,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(151,187,205,1)",
				data : [3,1,6,3,2,20,1]
			}
		]
	};
	var ctx = document.getElementById("canvas").getContext("2d");
	window.myLine = new Chart(ctx).Bar(lineChartData, {
		responsive: true
	});

	function add () {
		var
			title 	= $("#title").val(),
			content = $("#ket").val();
		
		if (title == '' || content == '') {
			$("#title").attr('placeholder', 'data tidak boleh kosong !!');
			$("#ket").attr('placeholder', 'data tidak boleh kosong !!');
		} else{
			$.ajax({
				url: 'widget/add_cat_lap',
				type: 'post',
				data: 'title='+title+'&content='+content,
				dataType: 'json',
				beforeSend:function(){
					$(".btn-add").disabled = true;
				},
				success:function(json){	
					if(json.stat){
						$(".cat_lap").load('widget/cat_lap');
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
			
		};
	}

	function hapus (id) {
		$.ajax({
			url: 'widget/del_cat_lap',
			type: 'post',
			data: 'id='+id,
			dataType: 'json',
			beforeSend:function(){
				$(".btn-add").disabled = true;
			},
			success:function(json){	
				if(json.stat){
					$(".cat_lap").load('widget/cat_lap');
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
		
	}

	function edit (id, title, content) {
		$("#title").val(title);
		$("#ket").val(content);
		$(".grb").html('<button class="btn btn-default add-btn" onclick="update()" type="button"><i class="fa fa-upload"></i></button><button class="btn btn-default add-btn" onclick="bersih()" type="button"><i class="fa fa-times"></i></button>');
	}

	function bersih () {
		$(".grb").html('<button class="btn btn-default add-btn" onclick="add()" type="button"><i class="fa fa-save"></i></button>');
		$("#title").val('');
		$("#ket").val('');
	}
</script>