<?php
class Hotel_mo extends CI_Model
{
public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }

  function test_main()
  {
    echo "This is model function";
  }

  function insert_data($data)
  {
    $this->db->insert("daily_hotel_consumption",$data);
  }

  function update_data($data,$id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->update("hotel_stock_inventory",$data);
  }

  function get_data($id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->select("quantity");
    $quary = $this->db->get("hotel_stock_inventory");
	$quary = $quary->row();
    $quary = $quary->quantity;
    return $quary;
  }

  function monthly($id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->select("quantity");
    $quary = $this->db->get("monthly_hotel_usage");
	$quary = $quary->row();
    $quary = $quary->quantity;

    return $quary;
  }

  function monthly_update($data,$id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->update("monthly_hotel_usage",$data);
  }

  function tableMainStock()
  {
    $this->db->select("*");
	$this->db->order_by("date","DESC");
    $query = $this->db->get("hotel_stock_inventory");
    return $query->result();
  }

  function tableAvailableStock()
  {
    $this->db->select("*");
	$this->db->order_by("date","DESC");
    $query = $this->db->get("daily_hotel_consumption");
    return $query->result();
  }

  function tableMonthlyUsage()
  {
    $this->db->select("*");
    $query = $this->db->get("monthly_hotel_usage");
    return $query->result();
  }

  function insertMain($data,$id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->update("hotel_stock_inventory",$data);
  }
  
  function insertMainStock($data)
  {
    $this->db->insert("Hotel_stock_inventory",$data);
  }

  function getItemName($id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->select("hotel_item_name");
    $query = $this->db->get("hotel_stock_inventory");
    $query = $query->row();
    $query = $query->hotel_item_name;
    return $query;
  }
  function insert_monthly($data)
  {
    $this->db->insert("monthly_hotel_usage",$data);
  }
 function itemExpenditures($data)
  {
    $this->db->insert("hotel_cost",$data);
  }

  function tableExpenditures()
  {
    $this->db->select("*");
	$this->db->order_by("date","DESC");
    $query = $this->db->get("hotel_cost");
    return $query->result();
  }

  function updateExpenditures($id,$data)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->update("hotel_cost",$data);
	
  }

  function getExp($id)
  {
    $this->db->where("hotel_item_id",$id);
    $this->db->select_sum("cost");
    $quary = $this->db->get("hotel_cost");
    $quary = $quary->row();
    $quary = $quary->cost;
    return $quary;
  }
function tableFilterStock($name,$sdate,$ldate)
  {
      $this->db->where("hotel_item_name",$name);
      $this->db->where("date BETWEEN '$sdate' AND '$ldate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') >= ","'$sdate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') <  ","'$ldate' + INTERVAL 1 DAY");
      $query = $this->db->get("daily_hotel_consumption");
      return $query->result();
  }
  
  function insertMainStock2($data)
  {
    $this->db->insert("hotel_stock_inventory",$data);
  }
  
  function monthlyInsert($data)
  {
    $this->db->insert("monthly_hotel_usage",$data);
  }
  
  function itemExpenditures2($data)
  {
    $this->db->insert("hotel_cost",$data);
  }


}
?>