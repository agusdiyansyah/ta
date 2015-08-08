<data>
	<komen>
		
	</komen>
</data>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 group">
			<legend><?php echo $meta['k_type'] ?></legend>		
			<?php  
			if (!empty($meta['dosen'])) {
				?>
			<div class="form-group">
				<?php  
				if ($this->session->userdata('u_level') == 2) {
					$opt[] = '';
					// foreach ($cat as $key) {
					// 	$json = json_decode($key->t_name);
					// 	$opt[$key->TID] = $json->title;
					// }
					echo form_dropdown('opt', $opt, set_value(empty($default['cat']) ? '' : $dafault['cat']), 'class="form-control opt" required="required"');
				}
				?>
			</div>	
				<?php
			}
			?>		
			<div class="form-group">
				<textarea name="komen" id="inputKomen" class="form-control inputKomen" rows="3" required="required"></textarea>
			</div>
			<button type="button" class="btn btn-default">Kirim</button>
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

<?php  
	$this->load->view('komentar/js');
?>