<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LowonganKerjaTerdaftar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data ['main_content'] = 'DirektoratPKK/LowonganKerjaTerdaftar';
        $this->load->view('layout/MainLayout', $data);
    }
    function add()
    {

    }
}

