<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed, Hacking activity detected');

class DetailPKByProvinsiModel extends  CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function record_count() {
        return $this->db->count_all("detailpkbyprovinsi");
    }

    function AddDetailPKByProvinsi($data)
    {
        $this->db->insert('detailpkbyprovinsi', $data);
    }
}