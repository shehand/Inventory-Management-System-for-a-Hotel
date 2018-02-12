<?php
class Soft_drink_inventory_model extends CI_Model
{
  function new_stock_insert($data)
  {
    $this->db->insert("soft_drink_inventory",$data);
  }

  function brand_insert($data)
  {
    $this->db->insert("soft_drink_inventory_brands",$data);
  }

  function soft_drink_inventory_history($data)
  {
    $this->db->insert("soft_drink_inventory_history",$data);
  }

  function insert_soft_drink_inventory_brands($data)
  {
    $this->db->insert("soft_drink_inventory_brands",$data);
  }

  function insert_month_null($data)
  {
    $this->db->insert("soft_drink_month_usage",$data);
  }
  function insert_day_null($data)
  {
    $this->db->insert("soft_drink_day_usage",$data);
  }

  function update_soft_drink_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("soft_drink_inventory",$data_array);
  }

  function update_month_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("soft_drink_month_usage",$data_array);
  }

  function update_day_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("soft_drink_day_usage",$data_array);
  }

  function get_q_half($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("half");
    $query=$this->db->get("soft_drink_inventory");
    $query=$query->row();
    $query =$query->half;

    return $query;
  }

  function get_q_litre($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("litre");
    $query=$this->db->get("soft_drink_inventory");
    $query=$query->row();
    $query =$query->litre;

    return $query;
  }

  function month_half($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("half");
    $query=$this->db->get("soft_drink_month_usage");
    $query=$query->row();
    $query =$query->half;

    return $query;
  }

  function month_litre($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("litre");
    $query=$this->db->get("soft_drink_month_usage");
    $query=$query->row();
    $query =$query->litre;

    return $query;
  }

  //day stock out
  function day_half($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("half");
    $query=$this->db->get("soft_drink_day_usage");
    $query=$query->row();
    $query =$query->half;

    return $query;
  }

  function day_litre($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("litre");
    $query=$this->db->get("soft_drink_day_usage");
    $query=$query->row();
    $query =$query->litre;

    return $query;
  }

  function tableAvailableStock()
  {
  $this->db->select("*");
  $query = $this->db->get("soft_drink_inventory");
  return $query->result();
  }

  function tableMonthStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("soft_drink_month_usage");
  return $query->result();
  }

  function tableDayStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("soft_drink_day_usage");
  return $query->result();
  }

  function get_day_usage($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("soft_drink_day_usage");
    return $query->result();
  }

  function get_month_usage($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("soft_drink_month_usage");
    return $query->result();
  }
}


 ?>
