<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Seconnecter_model extends CI_Model{
    
    public function login($data){

        try {
                $condition="email="."'".$data['email']."' AND "."motdepasse="."'".$data['motdepasse']."'";
                $query = $this->db->query("SELECT * from Utilisateur 
                where +$condition limit 1");
               $rows = $query->result();
               return $rows;
        
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function read_user_information($email){

        try {
                $query = $this->db->query("SELECT * from Utilisateur join profil_utilisateur on Utilisateur.id_profil = profil_utilisateur.id_profil
                where Utilisateur.email='".$email."'" );
                $rows = $query->result();
                return $rows;
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
?>