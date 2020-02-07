<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class Acceuil_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();
    }
    public function index(){
        try{
            if(isset($_SESSION ['loggen_in'])){
                
                $this->load->view('common/Script.php');
                $this->load->view('common/header.php');
                $this->Menu();
                $this->liste_paginer(0);
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

    public function liste_paginer($rowno=1){
        try{
            if(isset($_SESSION ['loggen_in'])){

                $rowPerPage=3;
                $allcount=$this->Tantara_model->getcount();
                $data['radio']=$this->Radio_model->getAll();
                $data['page'] = $allcount/$rowPerPage;
                $data['tantara']=$this->Tantara_model->getAll_tantara($rowPerPage,$rowno);
                $data['count']=$allcount;
                $this->load->view('acceuil/Liste_tantara.php',$data);
            }
            else{
                redirect("Auth_controlleur/");
            }
        }
        catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
        
    }
    public function liste_paginer2($rowno){
        try{
            if(isset($_SESSION ['loggen_in'])){
                $this->load->view('common/Script.php');
                $this->load->view('common/header.php');    
                $rowPerPage=3;
                $limite = ($rowno-1)*$rowPerPage;
                $allcount=$this->Tantara_model->getcount();
                $data['page'] = $allcount/$rowPerPage;
                $data['radio']=$this->Radio_model->getAll();
                $this->Menu();
                $data['tantara']=$this->Tantara_model->getAll_tantara($rowPerPage,$limite);;
                $this->load->view('acceuil/Liste_tantara.php',$data);
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