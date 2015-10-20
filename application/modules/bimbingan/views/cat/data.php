<data class='merem'>
	<cat>
		<?php  
		echo json_encode($cat);
		?>
	</cat>
</data>
<legend>Kategori Laporan</legend>
<div>
	<?php if ($this->session->userdata('u_level') != 3): ?>
		<form class='form-asis' id='asis'>
			<input type="hidden" name="ac" value="in" class='asis-ac'>
			<input type="hidden" name="pid" value="" class='asis-pid'>
			<div class="laporan label label-info"></div>
			<div class="form-group">
				<input style="margin-top:10px;" type="text" class="form-control asis-txt" name="asis" placeholder="Asistensi">
			</div>
			<div class="text-right">
				<button type="submit" class="btn btn-primary btn-asis">Submit</button>
				<span class='x-btn'></span>
			</div>
		</form>
	<?php endif ?>
</div>
<br>
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
		<div id="collapse{{tid}}" class="panel-collapse collapse {{#t_count}} in {{/t_count}} {{^t_count}}  {{/t_count}}">
			<div class="panel-body">
				{{#t_data}}
					<div class='cat-list' data-pid='{{pid}}'>
						<a href="#asis" class='file-ac' data-name="{{p_name}}" data-cat='{{t_name}}' data-pid='{{pid}}'>{{p_name}}</a>
						<div style='float:right'>
							<a href="bimbingan/download/{{pid}}" data-pid='{{pid}}' class='down'>
								<i class="fa fa-download"></i>
							</a>
							<a href="" data-pid='{{pid}}' class='rm'>
								<i class="fa fa-trash"></i>
							</a>
						</div>
						<div class='asis-list-{{pid}}'>
							<div style="border-bottom:1px dotted silver;padding:5px 0">Asistensi</div>
							{{#asis}}
								<div class='asis-{{ass_pid}}'>
									<?php if ($this->session->userdata('u_level') == 2): ?>
										{{#ch}} <input data-pid = '{{ass_pid}}' class='chk' type="checkbox" checked="true" value="1"> {{/ch}} 
										{{^ch}} <input data-pid = '{{ass_pid}}' class='chk' type="checkbox" value=""> {{/ch}}
										<a href="" data-pid="{{ass_pid}}" data-title='{{ass_name}}' class='edit-asis'><i class="fa fa-edit"></i></a>
										<a href="" data-pid="{{ass_pid}}" class='del-asis'><i class="fa fa-times"></i></a>
									<?php endif ?>
									<a href="" data-name='{{ass_name}}' data-cat='{{t_name}}' data-pid='{{ass_pid}}' class='ac-asis'>{{ass_name}}</a> <br>
								</div>
							{{/asis}}
						</div>
					</div>
				{{/t_data}}
			</div>
		</div>
	</div>
	{{/data}}
</div>
<a href="" class='cetak' target='_BLANK'>Cetak lembar asistensi</a>
<?php
	$this->load->view('cat/js');
?>