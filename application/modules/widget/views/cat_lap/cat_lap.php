<?php  
/**
LOAD CSS
*/
	$this->load->view('cat_lap/css');
?>
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
<?php 
/**
LOAD JS
*/
	$this->load->view('cat_lap/js');
?>