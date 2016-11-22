<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PencariKerjaTerdaftar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('DetailPKByProvinsiModel');
        $this->load->model('detailpkbyjeniskelaminModel');
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
        //$col = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();

        $this->db->empty_table('detailpkbyprovinsi');
        $rows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($objPHPExcel->setActiveSheetIndex(0)->getHighestColumn());

        for ($i = 2; $i<=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $i++)
        {
            $dataVal = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $i)->getValue();
            for($y=1; $y<$highestColumnIndex; $y++)
            {
                $dataVal2 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($y, $i)->getValue();
                $dataVal3 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($y, 1)->getValue();

                print_r($dataVal);print_r(',');
                print_r($dataVal2);print_r(',');
                print_r($dataVal3);
                print_r('<br/>');
                //disni

                $dataInput = array(
                    'IDPROVINSI' => $dataVal,
                    'IDTAHUN' => $dataVal3,
                    'JUMLAH' => $dataVal2
                );
                $this->DetailPKByProvinsiModel->AddDetailPKByProvinsi($dataInput);
            }
        }

    }

    function UploadExcelByJenisKelamin(){
        $file = $_FILES['upload']['tmp_name'];
        //load the excel library
        $this->load->library('excel');
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);

        $this->db->empty_table('detailpkbyjeniskelamin');

        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($objPHPExcel->setActiveSheetIndex(0)->getHighestColumn());
        $pria = 2;
        $wanita = 3;
        for($y=1; $y<$highestColumnIndex; $y++)
        {
            $dataTahun = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($y, 1)->getValue();
            $dataPria = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($y, $pria)->getValue();
            $dataWanita = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($y, $wanita)->getValue();

            print_r($dataPria);print_r(',');
            print_r($dataWanita);
            print_r('<br/>');
            //disni

            $dataInput = array(
                'IDTAHUN' => $dataTahun,
                'PRIA' => $dataPria,
                'WANITA' => $dataWanita
            );
            $this->detailpkbyjeniskelaminModel->Add($dataInput);
        }

    }
}

