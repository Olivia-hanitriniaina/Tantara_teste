<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class AjouterTantara_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();

    }
    public function index(){
        try{
            if(isset( $_SESSION ['loggen_in'])){
                
                $this->load->view('common/Script.php');
                $this->load->view('common/header.php');
                $this->Menu();
                $this->getFunction();
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

    public function getFunction(){
        try{
            if(isset( $_SESSION ['loggen_in'])){
                $data = array();
                $data['erreur']="";
                $data['information'] = $_SESSION ['loggen_in']['nom'] .'  '.$_SESSION ['loggen_in']['prenom'];
                $data['genre'] = $this->Genre_model->getAllGenre();
                $this->load->view('ajout/Ajouter_tantara.php',$data);
            }
            else{
                redirect("Auth_controlleur/");
            }
        }
        catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
        
    }

    function upload(){
        try{
            if(isset( $_SESSION ['loggen_in'])){
                $this->load->view('common/Script.php');
                $this->load->view('common/header.php');
                $this->Menu();
                $data['genre'] = $this->Genre_model->getAllGenre();
                $this->load->view('common/footer.php');

                $titre = $this->input->post('titre');
                $date = $this->input->post('date');
                $texte = $this->input->post('texte');
                $genre = $this->input->post('genre');
                $file = $this->input->post('file');
                $data['message'] = "";
                
                $data['information'] = $_SESSION ['loggen_in']['nom'] .'  '.$_SESSION ['loggen_in']['prenom'];
                if($titre!=null || $date!=null  || $texte!=null || $genre!=null || $file!=null){
                    if(!empty($_FILES['files']['name'])){
                   
                        $filesCount = count($_FILES['files']['name']);
                    
                        for($i = 0; $i < $filesCount; $i++){
                            
                            $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                            $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                            $uploadPath = './assets/image';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif|txt';
                            $this->load->library('upload', $config);
                            
                            $this->upload->initialize($config);
                            
                            // Upload file to server
                            if($this->upload->do_upload('file')){
                                // Uploaded file data
                                $fileData = $this->upload->data();
                                $uploadData[$i]['file_name'] = $fileData['file_name'];
                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                            }
                        }         
                        $i = 0;
                        foreach($uploadData as $row){
                            $chemin = $row['file_name'];
                        } 
                        
                        $data = $this->Tantara_model->insertTantara($genre,$_SESSION ['loggen_in']['id'],$titre,$date,$chemin);  
                    }
                    $max =  $this->Ajouter_model->getMaxAjouter();
                    if(count($max)!=null){
                        $data['notification2'] = $this->DetailTantara_model->detail($max,$texte);
                        redirect("Acceuil_controlleur/");
                    }
                   
                }
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
      