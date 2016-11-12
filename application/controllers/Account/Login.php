<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        //$data ['main_content'] = 'Account/Login';
        $this->load->view('Account/Login');
    }
}

