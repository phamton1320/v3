<?php
class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function LoginUser($username,$password)
    {
        $sql = $this->db->get_where("users",['username'=>$username,'pass'=>$password]);
        $rowdb = $sql->row();
        if(isset($rowdb)){
            //print_r($rowdb);
            //var_dump($rowdb);
            //Khi la object se dung $rowdb->username
            $newdata = array(
                'username'  => $rowdb->username,
                'fullname'  => $rowdb->fullname,
                'role_id'   => $rowdb->role_id,
                'phone'     => $rowdb->phone,
                'mail'      => $rowdb->mail,
                'status'    => $rowdb->status,
            );
            $this->session->set_userdata($newdata);
            
        }else{
            echo 'kiem tra user or pass';
        }
    }
    public function Validation($username,$password)
    {
        $username = $this->form_validation->set_rules('username', 'Username', 'required');
        $password = $this->form_validation->set_rules('password', 'Password', 'required',
                array('required' => 'You must provide a %s.')
        );
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('LoginView');
        }
        else
        {
            return true;
        }
    }
}
?>