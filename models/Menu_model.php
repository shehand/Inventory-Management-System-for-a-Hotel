<?php
class Menu_model extends CI_Model
{
 public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }
 
 function tableMenu()
 {
    $this->db->select("*");
    $query = $this->db->get("products");
    return $query->result();
 }
 
 function tableMenuUp()
 {
    $this->db->select("*");
    $query = $this->db->get("menu_details");
    return $query->result();
 }
 
 function insert_data($data)
 {
    $this->db->insert("products",$data);
 }
  
  function update_data($data,$id)
  {
    $this->db->where("menu_item_id",$id);
    $this->db->update("menu_details",$data);
  }
  
  function get_data($id)
  {
    $this->db->where("menu_item_id",$id);
    $this->db->select("item_quantity");
    $quary = $this->db->get("menu_details");
    $quary = $quary->row();
    $quary = $quary->item_quantity;

    return $quary;
  }
}

?>