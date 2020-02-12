<?php

class Membership_model extends CI_Model{

  public function __contruct(){
    $this->load->database();
  }

  public function register_member($data){
     $this->db->insert(ACC_MEMBERS_TB, $data);
     // return $query->result_array();
  }

  public function getAllMembers(){
    $query = $this->db->get();
    // $query = $this->db->get_where('table_name',array('var'=> value));
    return $query->result_array();
  }

  public function getMembersByChurch($cid){
    $filter = array('cid' => $cid, 'isDelete'=> 'N');
    $query = $this->db->get_where(ACC_MEMBERS_TB,$filter);
    return $query->result_array();
  }

 public function getMemberById($id){
   $filter = array('id' => $id, 'isDelete'=> 'N');
   $query = $this->db->get_where(ACC_MEMBERS_TB,$filter);
   return $query->result_array();
 }

 public function editMembers($data,$id){
   $this->db->where('id',trim($id));
   $this->db->update(ACC_MEMBERS_TB,$data);
   return true;
 }

 public function delete_member($id){
   $this->db->set('isDelete', 'Y');
   $this->db->where('id', $id);
   $this->db->update(ACC_MEMBERS_TB);
   return true;
 }


}

 ?>
