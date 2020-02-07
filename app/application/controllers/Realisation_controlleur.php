<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class Realisation_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();
    }
    public function get_realisation(){
        try{
            if(isset( $_SESSION ['loggen_in'])){
                
                $id_envoyer = $_SESSION ['loggen_in']['id'];
                $id_tantara = $this->input->get('id_tantara');
                $id_recipient = $this->input->get('id_utilisateur');
                $radio = $this->input->get('radio');
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT into notification (envoye_id, recipient_id,id_tantara,etat,date,id_radio) values (".$id_envoyer.",".$id_recipient.",".$id_tantara.",0,'".$date."',".$radio.")";
                echo $id_recipient ;
                $this->db->query($sql); 
            }
            else{
                redirect("Auth_controlleur/");
            }
        }
        catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
         
    }
    public function ListeAutorisation(){
        try
        {
            if(isset( $_SESSION ['loggen_in'])){

                $id_envoyer = $_SESSION ['loggen_in']['id'];
                $this->load->view('common/Script.php');
                $this->load->view('common/header.php');
                $this->Menu();
                $data['auto'] = $this->Profil_model->getPartage($id_envoyer,1);
                $this->load->view('Validation/autorisation.php',$data);
                $this->load->view('common/footer.php');
            }
            else{
                redirect("Auth_controlleur/");
            }
        }
        catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
    }
}
?>