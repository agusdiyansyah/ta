<?php
if (!empty($cat)) {  
	foreach ($cat as $key) {
		$json = json_decode($key->t_name);
		?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo str_replace(" ", "-", "-".$json->title) ?>">
					<?php echo $json->title ?>
				</a>
				<div class="aksi">
					<?php  
					if ($key->t_slug != 'uc') {
						?>
					<a href="javascript:;" onclick="edit('<?php echo $key->TID ?>','<?php echo $json->title ?>','<?php echo $json->content ?>')"><i class="fa fa-edit"></i></a>
					<a href="javascript:;" onclick="hapus('<?php echo $key->TID ?>')"><i class="fa fa-times"></i></a>					
						<?php
					}
					?>
				</div>
			</h4>
		</div>
		<div id="collapseOne<?php echo str_replace(" ", "-", "-".$json->title) ?>" class="panel-collapse collapse">
			<div class="panel-body">
				<?php echo $json->content ?>
			</div>
		</div>
	</div>
		<?php
	}
}
?>