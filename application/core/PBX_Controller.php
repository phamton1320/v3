<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PBX_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        
    }
    // public function index()
    // {

    // }
}
?>