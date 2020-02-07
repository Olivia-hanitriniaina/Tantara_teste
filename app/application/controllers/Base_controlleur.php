<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_controlleur extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent ::__construct();
		$this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("Seconnecter_model");
		$this->load->model("Tantara_model");
		$this->load->model("Genre_model");
		$this->load->model("Radio_model");
		$this->load->model("Notification_model");
		$this->load->model("DetailTantara_model");
		$this->load->model("Ajouter_model");
		$this->load->model("Profil_model");
		$this->load->model("Partage_model");
		$this->load->model("Autorisation_model");
		session_start();
   }
   public function Menu(){
	try{
		if(isset( $_SESSION ['loggen_in'])){
			$id_recipient = $_SESSION ['loggen_in']['id'];
			$data['profil'] = $_SESSION ['loggen_in']['type_utilisateur'];
			$data['count'] = $this->Notification_model->getNotificationcount($id_recipient);
			$data['notification'] = $this->Notification_model->getNotification($id_recipient);
			$data['autorisation'] = $this->Autorisation_model->Autorisationcount($id_recipient);
			$this->load->view('common/menu.php',$data);
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
