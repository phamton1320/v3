<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends PBX_Controller {
   
	public function index()
	{   
        $this->load->helper('url');
        // $data['content'] = 'home';
        // $this->load->view('template/layout',  $data);
        if($this->session->userdata('username')){
            $this->load->view('template/layout');
        }else{
            $this->load->view('LoginView');
        }
        
    }
    
}
