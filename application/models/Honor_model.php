<?php

class Honor_model extends CI_Model{

  public function __contruct(){
    $this->load->database();
  }

  public function get_honor_list($day){
    if(!empty($day)){
        $query = $this->db->get_where( HONOR ,array('day'=> $day,'isDisplay'=>1));
        return $query->result_array();
    }
  }

  public function get_honor_name($id){
    if(!empty($id)){
        $query = $this->db->get_where( HONOR ,array('id'=> $id));
        return $query->result_array();
    }
  }

  public function honor_count($honor_id,$maxCount){

    $query = $this->db->get_where(HONOR ,array('id'=> $honor_id,'isDisplay'=>1));
    $query_arr = $query->result_array();

    if(!empty($query_arr)){
      $refillCount = $query_arr[0]['count'] + 1;

      $this->db->where('id',trim($query_arr[0]['id']));

      if($refillCount>= $maxCount){
        $data = array(
                'count'   => $refillCount,
                'isDisplay' => 0
        );
      }else{
        $data = array(
                'count'   => $refillCount
        );
      }
      $this->db->update(HONOR,$data);
    }else{

    }
  }

  public function getMaxCount($honor_id){
    if(!empty($honor_id)){
        $query = $this->db->get_where( HONOR ,array('id'=> $honor_id));
        $temp = $query->result_array();
        return $temp['0']['maxCount'];
    }
  }

  public function checkHonorAvailability($id1,$id2,$id3){

    $temp = true;

    $query1 = $this->db->get_where(HONOR ,array('id'=> $id1,'isDisplay'=>1));
    $queryArr1 = $query1->result_array();
    if(count($queryArr1) > 0 ){
      if($queryArr1['0']['count'] >= $queryArr1['0']['maxCount']){
        //echo '1';
        $temp = false;
      }
    }else{
      $temp = false;
    }
    $query2 = $this->db->get_where(HONOR ,array('id'=> $id2,'isDisplay'=>1));
    $queryArr2 = $query2->result_array();
    if(count($queryArr2) > 0 ){
      if($queryArr2['0']['count'] >= $queryArr2['0']['maxCount']){
        $temp = false;
      }
    }else{
      $temp = false;
    }
    $query3 = $this->db->get_where(HONOR ,array('id'=> $id3,'isDisplay'=>1));
    $queryArr3 = $query3->result_array();
    if(count($queryArr3) > 0 ){
      if($queryArr3['0']['count'] >= $queryArr3['0']['maxCount']){
        $temp = false;
      }
    }else{
      $temp = false;
    }
    return $temp;

  }
}

 ?>
