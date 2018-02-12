<?php
class Inventory_list_model extends CI_Model
{
  function new_stock_insert($data)
  {
    $this->db->insert("inventory_list",$data);
  }

  function items_insert($data)
  {
    $this->db->insert("inventory_list_items",$data);
  }

  function inventory_list_history($data)
  {
    $this->db->insert("inventory_list_history",$data);
  }

  function insert_inventory_list_items($data)
  {
    $this->db->insert("inventory_list_items",$data);
  }

  function insert_month_null($data)
  {
    $this->db->insert("inventory_list_month_usage",$data);
  }
  function insert_day_null($data)
  {
    $this->db->insert("inventory_list_day_usage",$data);
  }

  function update_inventory_list($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("inventory_list",$data_array);
  }

  function update_month_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("inventory_list_month_usage",$data_array);
  }

  function update_day_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("inventory_list_day_usage",$data_array);
  }
  function get_quantity($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("quantity");
    $query=$this->db->get("inventory_list");
    $query=$query->row();
    $query =$query->quantity;

    return $query;
  }

  function month_quantity($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("quantity");
    $query=$this->db->get("inventory_list_month_usage");
    $query=$query->row();
    $query =$query->quantity;

    return $query;
  }
  function day_quantity($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("quantity");
    $query=$this->db->get("inventory_list_day_usage");
    $query=$query->row();
    $query =$query->quantity;

    return $query;
  }

  function tableMonthStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("inventory_list_month_usage");
  return $query->result();
  }
  function tableAvailableStock()
  {
  $this->db->select("*");
  $query = $this->db->get("inventory_list");
  return $query->result();
  }
  function tableDayStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("inventory_list_day_usage");
  return $query->result();
  }

  function get_day_usage($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("inventory_list_day_usage");
    return $query->result();
  }

  function get_month_usage($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("inventory_list_month_usage");
    return $query->result();
  }

}

 ?>
