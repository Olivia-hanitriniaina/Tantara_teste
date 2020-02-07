<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class Description_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();
    }
    public function index(){
        try{
            if(isset( $_SESSION ['loggen_in'])){

                $id_tantara = $this->input->get('id_tantara');
                 $this->load->view('common/Script.php');
                 $this->load->view('common/header.php');
                 $this->Menu();
                 $this->getDescription($id_tantara);
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
    public function getDescription($id){
        try{
            if(isset( $_SESSION ['loggen_in'])){
                $data = array();
                $data['detail_tantara'] = $this->Tantara_model->getDescriptionTanatra($id);
                $this->load->view('Description/Description_tantara.php',$data);                                                     
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