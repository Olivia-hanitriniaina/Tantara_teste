<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class Auth_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();
    }
    public function index(){

        $this->load->view('index.php');

    }
    public function user_login()
    {
        try
        {
            $this->form_validation->set_rules('email', 'Email d utilisateur','required');
            $this->form_validation->set_rules('motdepasse', 'mot de passe','required');
            if($this->form_validation->run()==FALSE){
                if(isset($this->session->userdata['logged_in'])){
                    redirect('Acceuil_controlleur/');
                }else{
                    $this->load->view('index.php');
                }
            }
            else{
                $password =$this->input->post('motdepasse');
                $data=array(
                    'email'=>$this->input->post('email'),
                    'motdepasse'=> md5($password)
                );
                $result = $this->Seconnecter_model->login($data);
                if($result== TRUE){
                    $email = $this->input->post('email');
                    $result=$this->Seconnecter_model->read_user_information($email);
                    if($result!=FALSE){
                        $session_data=array(
                            'id'=>$result[0]->id_utilisateur,
                            'nom'=>$result[0]->nom,
                            'prenom'=>$result[0]->prenom,
                            'adresse_email'=>$result[0]->email,
                            'type_utilisateur'=>$result[0]->type_utilisateur
                        );
                        $_SESSION ['loggen_in']= $session_data;
                        redirect('Acceuil_controlleur/');
                    }
                    
                   
                   // $_SESSION ['loggen_in']= $session_data;
                   // redirect('Acceuil_controlleur/');
                }
                else {
                    $data=array(
                        'error_message'=> "L'Email ou le mot de passe est invalide"
                    );
                    $this->load->view('index.php',$data);
                }
            }
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        } 
    }
    public function sedeconnecter(){
        $session=$_SESSION ['loggen_in'];
        $array_items=array('id','nom','prenom','adresse_email','type_utilisateur');
        if(isset($session)){
            session_destroy();
            redirect('Auth_controlleur/');
        }
    }
}
?>