<data class='merem'>
	<cat>
		<?php  
		echo json_encode($cat);
		?>
	</cat>
</data>
<legend>Kategori Laporan</legend>

<div class="panel-group data-cat" id="accordion">
	{{#data}}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{tid}}">
					{{t_name}}
					<span style='float:right'><sup> {{t_count}} </sup><i class="fa fa-file-word-o"></i></span>
				</a>
			</h4>
		</div>
		<div id="collapse{{tid}}" class="panel-collapse collapse">
			<div class="panel-body">
				{{#t_data}}
					<div>
						<a href="#">{{p_name}}</a>
					</div>
				{{/t_data}}
			</div>
		</div>
	</div>
	{{/data}}
</div>

<?php
	$this->load->view('cat/js');
?>