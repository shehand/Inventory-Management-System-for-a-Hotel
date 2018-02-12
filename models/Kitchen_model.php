<?php
class Kitchen_model extends CI_Model
{
 public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }

  function insert_data($data)
  {
    $this->db->insert("daily_consumptions",$data);
  }

  function update_data($data,$id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->update("kitchen_stock_inventory",$data);
  }

  function get_data($id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->select("item_quantity");
    $quary = $this->db->get("kitchen_stock_inventory");
    $quary = $quary->row();
    $quary = $quary->item_quantity;

    return $quary;
  }

  function monthly($id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->select_sum("available_stock");
    $quary = $this->db->get("monthly_usage");
    $quary = $quary->row();
    $quary = $quary->available_stock;

    return $quary;
  }

  function monthly_update($data,$id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->update("monthly_usage",$data);
  }

  function tableMainStock()
  {
    $this->db->select("*");
    $this->db->order_by("date_inserted","DESC");
    $query = $this->db->get("kitchen_stock_inventory");
    return $query->result();
  }

  function tableAvailableStock()
  {
    $this->db->select("*");
    $this->db->order_by("date","DESC");
    $query = $this->db->get("daily_consumptions");
    return $query->result();
  }

  function tableMonthlyUsage()
  {
    $this->db->select("*");
    $query = $this->db->get("monthly_usage");
    return $query->result();
  }

  function insertMain($data,$id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->update("kitchen_stock_inventory",$data);
  }

  function insertMainStock($data)
  {
    $this->db->insert("kitchen_stock_inventory",$data);
  }

  function getItemName($id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->select("kitchen_item_name");
    $query = $this->db->get("kitchen_stock_inventory");
    $query = $query->row();
    $query = $query->kitchen_item_name;
    return $query;
  }
  function monthlyInsert($data)
  {
    $this->db->insert("monthly_usage",$data);
  }

  function itemExpenditures($data)
  {
    $this->db->insert("item_expenditures",$data);
  }

  function tableExpenditures()
  {
    $this->db->select("*");
    $query = $this->db->get("item_expenditures");
    return $query->result();
  }

  function updateExpenditures($id,$data)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->update("item_expenditures",$data);
  }

  function getExp($id)
  {
    $this->db->where("kitchen_item_id",$id);
    $this->db->select_sum("item_outcome");
    $quary = $this->db->get("item_expenditures");
    $quary = $quary->row();
    $quary = $quary->item_outcome;
    return $quary;
  }
  
  function tableFilterStock($name,$sdate,$ldate)
  {
      $this->db->where("kitchen_item_name",$name);
      $this->db->where("date BETWEEN '$sdate' AND '$ldate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') >= ","'$sdate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') <  ","'$ldate' + INTERVAL 1 DAY");
      $query = $this->db->get("daily_consumptions");
      return $query->result();
  }
}
?>
