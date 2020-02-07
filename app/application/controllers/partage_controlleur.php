<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class Partage_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();
    }
    public function index(){
        try{
            if(isset($_SESSION ['loggen_in'])){
                
                $this->load->view('common/Script.php');
                $this->load->view('common/header.php');
                $this->Menu();
                $data['Montantara']=$this->Profil_model->getMontantara($_SESSION ['loggen_in']['id']);
                $data['partage']=$this->Profil_model->getPartage($_SESSION ['loggen_in']['id'],0);
                $this->load->view('profil/Profil_utilisateur.php',$data);
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
 
    public function partage(){
        try
        {
            if(isset($_SESSION ['loggen_in'])){
                $id_tantara = $this->input->get('id_tantara');
                $envoyer = $this->input->get('envoyer');
                date_default_timezone_set('Asia/Karachi');
                $date= date('Y-m-d H:i:s');
                $this->Partage_model->getAutoriter($id_tantara,$envoyer,1,$date);
                $this->Partage_model->updateAutorisation($id_tantara,$_SESSION ['loggen_in']['id']);
                redirect("Acceuil_controlleur/");
            }
            else{
                redirect("Auth_controlleur/");
            }
        }
        catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
    }
    public function partager(){
        try
        {
            if(isset($_SESSION ['loggen_in'])){
                $id_tantara = $this->input->get('id_tantara');
                date_default_timezone_set('Asia/Karachi');
                $date= date('Y-m-d H:i:s');
                $this->Partage_model->getAutoriter($id_tantara,$_SESSION ['loggen_in']['id'],0,$date);
                redirect("partage_controlleur/");
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