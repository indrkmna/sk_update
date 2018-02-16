<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model','mCategories');
	}

	public function index()
	{
		$site  = $this->mConfig->list_config();
		
		$data = array(	'title'		=> 'Daftar Kategori - '.$site['nameweb'],
						'isi'		=> 'admin/categories/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function ajax_list()
	{
		$list = $this->mCategories->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $category) {
			$no++;
			$row = array();
			$row[] = $category->category_name;
			$row[] = $category->order_category;
			$row[] = $category->category_description;
			$row[] = date('d M Y',strtotime($category->created));
			$row[] = date('d M Y',strtotime($category->modified));

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_category('."'".$category->category_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_category('."'".$category->category_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mCategories->count_all(),
						"recordsFiltered" => $this->mCategories->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->mCategories->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$slug = url_title($this->input->post('category_name'), 'dash', TRUE);
		$date = date('Y-m-d H:i:s');
		$data = array(
				'category_name' => $this->input->post('category_name'),
				'slug_category' => $slug,
				'user_id'		=> $this->session->userdata('id'),
				'category_description' 	=> $this->input->post('category_description'),
				'order_category'=> $this->input->post('order_category'),
				'status' 		=> $this->input->post('status'),
				'created' 		=> $date,
				'modified' 	    => $date,
			);
		$insert = $this->mCategories->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$slug = url_title($this->input->post('category_name'), 'dash', TRUE);
		$slug_category = $endCategory['category_id'].'-'.url_title($i->post('category_name'),'dash', TRUE);
	
		$date = date('Y-m-d H:i:s');		
		$data = array(
				'category_name' => $this->input->post('category_name'),
				'slug_category' => $slug,
				'category_description' 	=> $this->input->post('category_description'),
				'order_category'=> $this->input->post('order_category'),
				'status' 		=> $this->input->post('status'),
				'modified' 	    => $date,
			);
		$this->mCategories->update(array('category_id' => $this->input->post('category_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->mCategories->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('category_name') == '')
		{
			$data['inputerror'][] = 'category_name';
			$data['error_string'][] = 'Name Category is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('order_category') == '')
		{
			$data['inputerror'][] = 'order_category';
			$data['error_string'][] = 'Order category is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('status') == '')
		{
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'Status is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
