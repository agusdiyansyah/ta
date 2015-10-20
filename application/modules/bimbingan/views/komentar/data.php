<?php  
	$msg['pesan'] = array();
	foreach ($pesan as $data) {
		$json = json_decode($data->p_name);
		$d = array(
			'sender' => $json->sender,
			'level' => $json->level,
			'tanggal' => $json->tanggal,
			'wasiat' => $json->wasiat,
		);
		array_push($msg['pesan'] , $d);
	}
?>
<data class='merem'>
	<pesan>
		<?php  
		echo json_encode($msg);
		?>
	</pesan>
</data>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
			<legend><?php echo $meta['k_type'] ?></legend>				
			<form class='frm-umum' method="POST" role="form">	
				<input class='typ' type="hidden" name='type' value='3'>			
				<input class='pid' type="hidden" name='pid' value=''>
				<div class="form-group">
					<textarea name="komen" id="komen" class="form-control komen" rows="3" required="required"></textarea>	
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary msg-btn">Kirim</button>
				</div>
			</form>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
			<?php  
			if (!empty($blk)) {
				?>
			<blockquote>
				<b class="cat-name" data-pid="<?php echo $blk['pid'] ?>">
					<?php echo $blk['cat'] ?>
				</b>
				<button class="btn btn-default btn-xs info rmv">
					<i class="fa fa-times"></i>
				</button>
				<span>
					<footer class="cat-file">
						<?php echo $blk['file'] ?>
					</footer>
				</span>
			</blockquote>
				<?php
			}
			?>
			<div class="scroll data-pesan">
				{{#pesan}}
				<div class="alert alert-{{warna}}" role="alert">
					<b> {{sender}} </b> <small class="ket"> at {{tanggal}}</small>
					<br>
					<p>
						{{wasiat}}
					</p>
				</div>
				{{/pesan}}
			</div>
		</div>
	</div>
</div>

<?php  
	$this->load->view('komentar/js');
?>