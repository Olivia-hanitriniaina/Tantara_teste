<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Genre_model extends CI_Model{  
    public function getAllGenre(){

        try {
                $query = $this->db->query("SELECT * from Genre");
                $rows = $query->result();
                return $rows;
        
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
?>