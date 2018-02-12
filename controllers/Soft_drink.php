<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soft_drink extends CI_Controller {

	public function index()
	{
	    if($this->session->userdata('logged') == 1)
        {
		    $tp="soft_drink";
            $this->load->model("Res_inventory_model");
		$data['availab'] = $this->Res_inventory_model->tableAvailableStock($tp);

		$this->load->view('soft_drink_inventory',$data);
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
