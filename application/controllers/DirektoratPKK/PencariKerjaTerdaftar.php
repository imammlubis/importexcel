<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PencariKerjaTerdaftar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('TahunModel');
    }

    function index()
    {
        $data ['main_content'] = 'DirektoratPKK/PencariKerjaTerdaftar';
        $this->load->view('layout/MainLayout', $data);
    }

    function UploadExcel(){
        $file = $_FILES['upload']['tmp_name'];
        //load the excel library
        $this->load->library('excel');
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);

        for ($i = 2; $i<=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $i++)
        {
            $dataVal = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $i)->getValue();
            $dataVal2 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $i)->getValue();
            $dataInput = array(
                'IDTAHUN' => $dataVal,
                'TAHUN' => $dataVal2
            );
            $this->TahunModel->AddTahun($dataInput);
        }
    }
}

