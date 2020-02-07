<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Notification_model extends CI_Model{
    
    public function createNotification($envoye_id,$recipient_id,$id_tantara,$etat,$date,$id_radio){

        try { 
                $sql = "INSERT into notification (envoye_id, recipient_id,id_tantara,etat,date,id_radio) values (".$envoye_id.",".$recipient_id.",".$id_tantara.",".$etat.",'".$date."',".$id_radio.")";
                echo $sql;
                $this->db->query($sql); 
                 $this->db->affected_rows();     
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    function getNotification($id_recipient){
        try{
            $query = $this->db->query("SELECT notification.envoye_id as envoyer ,notification.id_tantara,notification.date,notification.etat,a2.nom as a2nom,a2.prenom as a2prenom,
            a1.nom as a1nom,a1.prenom as a1prenom,Radio.radio_name,Tantara.titre  from notification
            JOIN Utilisateur as a2 on notification.envoye_id = a2.id_utilisateur
            JOIN Utilisateur as a1 on notification.recipient_id = a1.id_utilisateur
            JOIN Tantara on notification.id_tantara = Tantara.id_tantara
            JOIN Radio on notification.id_radio=radio.radio_id where notification.recipient_id = ".$id_recipient." order by date Desc");
            $rows = $query->result();
            return $rows;
        }        catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getNotificationcount($id_recipient){
        try{
            $query = $this->db->query("SELECT count(*) from notification
            JOIN Utilisateur as a2 on notification.envoye_id = a2.id_utilisateur
            JOIN Utilisateur as a1 on notification.recipient_id = a1.id_utilisateur
            JOIN Tantara on notification.id_tantara = Tantara.id_tantara
            JOIN Radio on notification.id_radio=radio.radio_id where notification.recipient_id = ".$id_recipient."");
            $rows = $query->result();
            return $rows;
        }        catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    
}
?>