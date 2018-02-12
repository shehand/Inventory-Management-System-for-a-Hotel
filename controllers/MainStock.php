<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainStock extends CI_Controller {
public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }
	public function index()
	{
		if($this->session->userdata('logged') == 1){
		redirect(base_url()."Kitchen");
		}
		else{
            redirect(base_url().'main/login'); 
        }
	}

  public function form_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules("item_code","Item Code",'required');
        $this->form_validation->set_rules("item_quantity","Item Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');
		$this->form_validation->set_rules("item_exp","Item Expenditures",'required');

    if($this->form_validation->run())
     {

  			$this->load->model("Kitchen_model");
  			$tmp = $this->input->post("item_quantity");
  			$ava = (float)$tmp;
  			$id = $this->input->post("item_code");

  			$new  = $this->Kitchen_model->get_data($id);
  			$new_ava = $ava + (float)$new;
  			$dt = array(
  				"item_quantity"   =>$new_ava,
  				"date_inserted" =>$this->input->post("date")
  			);

				$currency = $this->input->post("item_exp");
				$ncurrency = (float)$currency;
				$currentCurrency = $this->Kitchen_model->getExp($id);
				$addingCurrency = $ncurrency + (float)$currentCurrency;
				$narr = array(
						"kitchen_item_id" =>$this->input->post("item_code"),
						"item_outcome" =>$addingCurrency,
						"date_inserted" =>$this->input->post("date")
				);
			$this->Kitchen_model->updateExpenditures($id,$narr);
  			$this->Kitchen_model->insertMain($dt,$id);
  			redirect(base_url()."Kitchen");
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  }
