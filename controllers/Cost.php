<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cost extends CI_Controller {
public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }    
	public function index()
	{
	    if($this->session->userdata('logged') == 1){
		redirect(base_url()."Hotel");
	}
        else{
            redirect(base_url().'main/login'); 
        }
	}

  public function form_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules("item_code","Item Code",'required');
        $this->form_validation->set_rules("item_name","Name",'required');
        $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');
		$this->form_validation->set_rules("item_exp","Item Expenditures",'required');

    if($this->form_validation->run())
     {

  			$this->load->model("Hotel_mo");
			$id = $this->input->post("item_code");
			$tmp = 0;
      			$data = array(
                      "hotel_item_id"  =>$this->input->post("item_code"),
                      "hotel_item_name" =>$this->input->post("item_name"),
                      "quantity"  =>$this->input->post("item_quantity"),
                      "date"   =>$this->input->post("date")
                    );
			    $tdata = array(
					"hotel_item_id" =>$this->input->post("item_code"),
					"hotel_item_name" =>$this->input->post("item_name"),
					"quantity" =>$tmp,
					"date" =>$this->input->post("date")
				);
				$this->load->model("Hotel_mo");
				$currency = $this->input->post("item_exp");
				$ncurrency = (float)$currency;
				$currentCurrency = $this->Hotel_mo->getExp($id);
				$addingCurrency = $ncurrency + (float)$currentCurrency;
				$narr = array(
						"hotel_item_id" =>$this->input->post("item_code"),
						"cost" =>$addingCurrency,
						"date" =>$this->input->post("date")
				);
				
				$this->load->model("Hotel_mo");
				$tmp = $this->input->post("item_quantity");
				$ava = (int)$tmp;
				

				$new  = $this->Hotel_mo->get_data($id);
				$new_ava = $ava + (int)$new;
				$dtr = array(
					"quantity"   =>$new_ava,
					"date" =>$this->input->post("date")
				);
				
				
            
			$this->Hotel_mo->updateExpenditures($id,$narr);
			$this->Hotel_mo->insertMain($dtr,$id);
  			redirect(base_url()."Hotel");
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  }
 ?>
