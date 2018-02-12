<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen extends CI_Controller {

	public function index()
	{
	    if($this->session->userdata('logged') == 1){
    		$this->load->model("Kitchen_model");
    		$data['infos'] = $this->Kitchen_model->tableMainStock();
    		$data['avail'] = $this->Kitchen_model->tableAvailableStock();
    		$data['month'] = $this->Kitchen_model->tableMonthlyUsage();
    		$data['outcome'] = $this->Kitchen_model->tableExpenditures();
    
    		$this->load->view('kitchen_inventory',$data);
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
            $this->load->model("Kitchen_model");
			$id = $this->input->post("item_code");
			$item_name = $this->Kitchen_model->getItemName($id);
			$data = array(
				"kitchen_item_id"  =>$this->input->post("item_code"),
				"kitchen_item_name" =>$item_name,
				"used_quantity"  =>$this->input->post("item_quantity"),
				"date"  =>$this->input->post("date")
			);

			$this->Kitchen_model->insert_data($data);

			$this->load->model("Kitchen_model");
			$tmp = $this->input->post("item_quantity");
			$ava = (float)$tmp;

			$new  = $this->Kitchen_model->get_data($id);
			$new_ava = (-1)*$ava + (float)$new;
			$dt = array(
				"item_quantity"   =>$new_ava
			);
			$this->Kitchen_model->update_data($dt,$id);

			$available = $this->Kitchen_model->monthly($id);
			$pass = $available + $ava;
			$dtt = array(
				"available_stock"  =>$pass,
				"date_inserted"  =>$this->input->post("date")
			);
			$this->Kitchen_model->monthly_update($dtt,$id);
			redirect(base_url()."kitchen");
    }
    else
    {
      redirect(base_url()."kitchen");
    }
  }
  
    public function getSearch()
    {
        $name = $this->input->post("item_name");
        $bdate = $this->input->post("b_date");
        $ldate = $this->input->post("l_date");
        
        $this->load->model("Kitchen_model");
        $data['filter'] = $this->Kitchen_model->tableFilterStock($name,$bdate,$ldate);
        $this->load->view("date_range_view",$data);
    }

}
