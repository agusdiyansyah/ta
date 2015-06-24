<script>
	$(document).ready(function() {
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
	});
</script>