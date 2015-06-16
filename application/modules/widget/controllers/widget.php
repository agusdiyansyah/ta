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

/**
KATEGORI LAPORAN
*/
	// get data
	public function cat_lap()
	{
		$this->load->model('cat_lap', 'lap');
		$data['default']['cat'] = $this->lap->get_cat()->result();
		$this->load->view('cat_lap/cat_lap', $data);
	}

	// tambah data
	public function add_cat_lap()
	{
		$title = $this->input->post('title');
		$content = $this->input->post('content');

		$in = json_encode(array('title' => $title, 'content' => $content));
		$data = array('t_type' => '1' ,'t_name' => $in);

		$this->load->model('cat_lap', 'lap');
		$insert = $this->lap->insert($data);

		if ($insert) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

	public function del_cat_lap()
	{
		$id = $this->input->post('id');
		$this->load->model('cat_lap', 'lap');
		$del = $this->lap->hapus($id);
		if ($del) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

}

/* End of file widget.php */
/* Location: ./application/modules/widget/controllers/widget.php */