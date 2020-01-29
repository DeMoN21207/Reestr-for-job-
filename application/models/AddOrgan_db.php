<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddOrgan_db extends CI_Model
{
    public function addcontr($name_contr)
    {
        $data = array('Name_contr' => $name_contr);
        $this->db->insert('contr', $data);

    }

    public function valid($value)
    {
        return $this->db->select('*')->from('contr')->where('Name_contr', $value)->get()->result_array();
    }

}