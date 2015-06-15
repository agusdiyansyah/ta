<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends MX_Controller {

	public function index()
	{
		?>
		<div class="jumbotron">
			<div class="container">
				<h1>This is Widget</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.
				</p>
				<p>
					<a class="btn btn-primary btn-lg">Learn more</a>
				</p>
			</div>
		</div>
		<?php
	}

}

/* End of file widget.php */
/* Location: ./application/modules/widget/controllers/widget.php */