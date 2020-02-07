<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Radio_model extends CI_Model{
    
    public function getAll(){

        try {
                $query = $this->db->query("SELECT * from Radio");
                $rows = $query->result();
                return $rows;
        
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
?>