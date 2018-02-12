<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_list extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('logged') == 1){
		$this->load->model("Inventory_list_model");
		$data['availab'] = $this->Inventory_list_model->tableAvailableStock();
		$data['month'] = $this->Inventory_list_model->tableMonthStock();
		$data['day'] = $this->Inventory_list_model->tableDayStock();
		$this->load->view('inventory_list',$data);
        }
        else{
            redirect(base_url().'main/login'); 
        }
	}


	public function inserted()
	{
		$this->index();
	}
}
