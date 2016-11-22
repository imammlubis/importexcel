<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed, Hacking activity detected');

class detailpkbyjeniskelaminModel extends  CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function record_count() {
        return $this->db->count_all("detailpkbyjeniskelamin");
    }

    function Add($data)
    {
        $this->db->insert('detailpkbyjeniskelamin', $data);
    }
}