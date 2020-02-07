<?php
defined('BASEPATH') OR exit('No direct script allowed');
class DetailTantara_model extends CI_Model{

    public function detail ($id_tantara,$description){

        try{

            $sql = "INSERT into Detail_tantara (id_tantara, description) VALUES (".$id_tantara.",'".$description."')";
            $this->db->query($sql); 
            $this->db->affected_rows();   
       }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
      
      }
}