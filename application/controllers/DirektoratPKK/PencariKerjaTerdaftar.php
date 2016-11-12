<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PencariKerjaTerdaftar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data ['main_content'] = 'DirektoratPKK/PencariKerjaTerdaftar';
        $this->load->view('layout/MainLayout', $data);
    }
}

