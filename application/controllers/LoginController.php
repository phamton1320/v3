<?php
class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('LoginModel');
    }
    public function index()
    {
        //$this->LoginModel->LoginUser();
        $this->load->view('LoginView');
    }
    public function PostLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if(isset($_POST['btn_login'])){
            $check = $this->LoginModel->Validation($username,$password);
            if($check == true){
                $this->LoginModel->LoginUser($username,$password);
                redirect(base_url());
            } 
        }
    }
}
?>