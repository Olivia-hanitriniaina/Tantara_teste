<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Tantara_model extends CI_Model{

    public function getAll_tantara($limit,$start) {
        try
        {
            $this->db->select('*');
            $this->db->from('Tantara');
            $this->db->join('Utilisateur','Tantara.id_utilisateur=Utilisateur.id_utilisateur','left');
            $this->db->join('Profil_utilisateur','Utilisateur.id_profil=Profil_utilisateur.id_profil','left');
            $this->db->join('Genre','Tantara.id_genre=Genre.id_genre','left');
            $this->db->order_by('Tantara.date','DESC');
            $this->db->limit($limit,$start);
            $query=$this->db->get();
            return $query->result_array();
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }

    public function getcount(){
        try
        {
            $this->db->select('Tantara.*');
            $this->db->from('Tantara');
            $this->db->join('Utilisateur','Tantara.id_utilisateur=Utilisateur.id_utilisateur');
            $this->db->join('Profil_utilisateur','Utilisateur.id_profil=Profil_utilisateur.id_profil');
            $this->db->join('Genre','Tantara.id_genre=Genre.id_genre');
            return $this->db->count_all_results();
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function getDescriptionTanatra($id_tantara){
        try
        {
            $this->db->select('*');
            $this->db->from('Tantara');
            $this->db->join('Utilisateur','Tantara.id_utilisateur=Utilisateur.id_utilisateur');
            $this->db->join('Detail_tantara','Detail_tantara.id_tantara=Tantara.id_tantara');
            $this->db->join('Profil_utilisateur','Utilisateur.id_profil=Profil_utilisateur.id_profil');
            $this->db->join('Genre','Tantara.id_genre=Genre.id_genre');
            $this->db->where(array('Tantara.id_tantara'=>$id_tantara));
            $query=$this->db->get();
            return $query->result_array();
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function insertTantara($id_genre, $id_utilisateur, $titre,$date,$image){
        try
        {
            $sql = "INSERT into Tantara (id_genre, id_utilisateur, titre,date,image) values (".$id_genre.",".$id_utilisateur.",'".$titre."','".$date."','".$image."')";
            $this->db->query($sql); 
            $this->db->affected_rows();   
        }
        catch(Exception $e){
          show_error($e->getMessage().'-----'.$e->getTraceAsString());
      }
    }
}