<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_bar extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('logged') == 1){

		$this->load->view('bar_inventory_main');
        }
        else{
            redirect(base_url().'main/login'); 
        }
	}


	public function inserted()
	{
		$this->index();
	}

	public function delete()
	{
		$this->load->model("Main_bar_model");
		$this->Main_bar_model->delete();
		$this->load->view('bar_inventory_main');
		redirect(base_url()."Main_bar");
	}

	public function newday()
	{
	  $this->load->model("Main_bar_model");
	  $this->Main_bar_model->newday();
		redirect(base_url()."Main_bar");

	}

	public function newmonth()
	{
	  $this->load->model("Main_bar_model");
	  $this->Main_bar_model->newmonth();
		redirect(base_url()."Main_bar");

	}
}
