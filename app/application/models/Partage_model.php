<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Partage_model extends CI_Model{
    
    public function getAutoriter($id_tantara,$id_utilisateur,$etat,$date){

        try {
            $sql = "INSERT into autoriter (id_tantara,id_utilisateur,etat,date) values (".$id_tantara.",".$id_utilisateur.",".$etat.",'".$date."')";
            $this->db->query($sql); 
             $this->db->affected_rows();   
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function updateAutorisation($id_tantara,$id_utilisateur){
        try{
            $sql = "UPDATE notification SET etat= 1  where  id_tantara='".$id_tantara."' And recipient_id='".$id_utilisateur."'";
            $this->db->query($sql);
            echo $this->db->affected_rows();
       }
       catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
?>