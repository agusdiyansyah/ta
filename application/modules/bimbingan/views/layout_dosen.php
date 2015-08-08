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
?>
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
										<sup>1</sup> <i class="fa fa-envelope-o"></i>
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
			<form action="" method="POST" role="form">			
				<div class="form-group">
					<textarea name="komen" id="inputKomen" class="form-control" rows="3" required="required"></textarea>	
				</div>
			</form>
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group" style="margin-top:20px">
			<div class="scroll">
				<div class="alert alert-success" role="alert">
					<b>Pembimbing</b> <small class="ket"> at 15/08/2015 07:00</small>
					<br>
					<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
					</p>
				</div>
				<div class="alert text-right">
					<b>You</b> <small class="ket"> at 15/08/2015 07:00</small>
					<br>
					<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
					</p>
				</div>
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
	});
</script>