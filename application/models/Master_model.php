<?php

class Master_model extends CI_Model{

  public function __contruct(){
    $this->load->database();
  }

  public function get_registree($uniq){
    if(!empty($uniq)){
        $query = $this->db->get_where( MASTER ,array('uniqId'=> $uniq,'isReg'=>'N'));
        return $query->result_array();
    }
  }

  public function register_honor($uniq,$day1,$day2,$day3){

    $data = array(
            'day1'   => $day1,
            'day2'   => $day2,
            'day3'   => $day3,
            'isReg'  => 'Y'
    );
    $this->db->where('uniqId',trim($uniq));
    $this->db->update(MASTER,$data);
  }




}

 ?>
