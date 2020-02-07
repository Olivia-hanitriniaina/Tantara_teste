<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Profil_model extends CI_Model{  

    public function getMontantara($id_utilisateur){

        try {
            $query = $this->db->query("SELECT tantara.titre,tantara.image,tantara.date,utilisateur.nom,utilisateur.prenom,genre.name,'description' as type from tantara 
            JOIN Utilisateur on tantara.id_utilisateur = utilisateur.id_utilisateur 
            JOIN Genre on tantara.id_genre = Genre.id_genre
            where tantara.id_utilisateur = $id_utilisateur");
                $rows = $query->result();
            
            return $rows;            
        
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }  
    public function getPartage($id_utilisateur,$etat){

        try {
            $query2 = $this->db->query("SELECT radio.radio_name,tantara.titre,tantara.image,tantara.date,utilisateur.nom,utilisateur.prenom,genre.name,'partage' as type from autoriter as o 
            JOIN Utilisateur on o.id_utilisateur = utilisateur.id_utilisateur 
            join tantara as tantara on o.id_tantara = tantara.id_tantara  
            JOIN Genre on tantara.id_genre = Genre.id_genre 
            join notification on tantara.id_tantara = notification.id_tantara
            JOIN Radio on radio.radio_id = notification.id_radio
             where o.id_utilisateur = $id_utilisateur and o.etat=$etat
            ");
                $rows = $query2->result();
            
            return $rows;            
        
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }   
}
?>