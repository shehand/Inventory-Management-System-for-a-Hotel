<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {


	public function index()
	{
	    if($this->session->userdata('logged') == 1){
    		$this->load->model("Hotel_mo");
    		$data['infos'] = $this->Hotel_mo->tableMainStock();
    		$data['avail'] = $this->Hotel_mo->tableAvailableStock();
    		$data['month'] = $this->Hotel_mo->tableMonthlyUsage();
    		$data['outcome'] = $this->Hotel_mo->tableExpenditures();
    
    		$this->load->view('hotel_inventory',$data);
	    }
        else{
            redirect(base_url().'main/login'); 
        }
	}

	public function form_validation()
	{
		$this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');

    if($this->form_validation->run())
     {
      $this->load->model("Hotel_mo");
	  $id = $this->input->post("item_code");
	  $item_name = $this->Hotel_mo->getItemName($id);
			$data = array(
				"hotel_item_id"  =>$this->input->post("item_code"),
				"hotel_item_name" =>$item_name,
				"quantity"  =>$this->input->post("item_quantity"),
				"date"  =>$this->input->post("date"),
				
				
			);

			$this->Hotel_mo->insert_data($data);

			$this->load->model("Hotel_mo");
			$tmp = $this->input->post("item_quantity");
			$ava = (int)$tmp;
			$id = $this->input->post("item_code");

			$new  = $this->Hotel_mo->get_data($id);
			$new_ava = (-1)*$ava + (int)$new;
			$dt = array(
				"quantity"   =>$new_ava
				
			);
			$this->Hotel_mo->update_data($dt,$id);

			$available = $this->Hotel_mo->monthly($id);
			$pass = $available + $ava;
			$dtt = array(
				"quantity"  =>$pass
			);
			$this->Hotel_mo->monthly_update($dtt,$id);
			redirect(base_url()."Hotel");
			
			
			
    }
    else
    {
      echo "wrong input";
    }
  }
    public function getSearch()
    {
        $name = $this->input->post("item_name");
        $bdate = $this->input->post("b_date");
        $ldate = $this->input->post("l_date");
        
        $this->load->model("Hotel_mo");
        $data['filter'] = $this->Hotel_mo->tableFilterStock($name,$bdate,$ldate);
        $this->load->view("hotel_date_range",$data);
    }

}