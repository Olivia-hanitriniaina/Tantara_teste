<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Autorisation_model extends CI_Model{
    
    function Autorisationcount($id_utilisateur){
        try{
            $query = $this->db->query("SELECT count(*) as isa from Autoriter where etat = 1 and id_utilisateur= $id_utilisateur");
            $rows = $query->result();
            return $rows[0]->isa;
        }       
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    
}
?>