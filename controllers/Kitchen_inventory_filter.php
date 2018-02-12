<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen_inventory_filter extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged') == 1){
		$this->load->model("Kitchen_model");
		//$data['infos'] = $this->Kitchen_model->tableFilterStock();

		$this->load->view('date_range_view');
		}
		else{
            redirect(base_url().'main/login'); 
        }
	}
}
?>