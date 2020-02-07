<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Ajouter_model extends CI_Model{
    
    public function getMaxAjouter(){

        try {

            $query = $this->db->query("SELECT Max(id_tantara) as max from Tantara");
            $rows = $query->result();
            return$rows[0]->max;
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
?>