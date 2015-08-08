<?php  
	$this->load->view('laporan/css');
	/**
	DATA
	*/

?>
<data class='merem'>
	<laporan>
		<?php 
			echo json_encode($rec) ;
		?>
	</laporan>
</data>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<section class="cat_laporan group">
		<div class="row">
			<!-- title -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<legend>
					Laporan
					<div style="float:right">
						<button class="btn btn-default btn-xs add-lap"><i class="fa fa-plus"></i></button>
					</div>
				</legend>
			</div>
		</div>
		<div class="row">
			<!-- manajemen kategori laporan -->
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 lap">
						
						<div class="title">
							<a href="#"> {{nama}} </a>
							<hr>
						</div>
						{{#data}}
						<div class="title">
							<a href="javascript:;" data-tid="{{TID}}" class='btn-view'> {{t_name}} </a>
							<div class="aksi">
								<a href="javascript:;" data-tid="{{TID}}" class='btn-edit'><i class="fa fa-edit"></i></a>
								<a href="javascript:;" data-tid="{{TID}}" class='btn-del'><i class="fa fa-times"></i></a>
							</div>
							<hr>
						</div>
						{{/data}}
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<span class='alt'>
							Menghapus kategori laporan tidak akan menghapus file yang ada didalamnya, setiap file yang terhubung dengan kategori yang dihapus akan dipindahkan kedalam uncategories
						</span>
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
					<canvas class="canvas" height="200" width="600"></canvas>
				</div>
			</div>
		</div>
	</section>
</div>
<?php  
	$this->load->view('laporan/js');
?>