<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("Base_controlleur.php");
class Notification_controlleur extends Base_controlleur{

    public function __construct(){
        parent ::__construct();
    }
    public function getNotification(){
        try{
            if(isset( $_SESSION ['loggen_in'])){
                
                $id_recipient = $_SESSION ['loggen_in']['id'];
                $data['notification'] = $this->Notification_model->getNotification($id_recipient);
                var_dump($data['notification']);
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