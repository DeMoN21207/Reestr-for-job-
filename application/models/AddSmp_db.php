<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddSmp_db extends CI_Model
{
    public function addsmp($name_smp)   //добавление нового СМП(метод модели)
    {
        $data = array('Name_SMP' => $name_smp);
        $this->db->insert('smp', $data);

    }

    public function valid($value) //проверка на существование нового смп в бд(метод модели)
    {
        return $this->db->select('*')->from('smp')->where('Name_SMP', $value)->get()->result_array();

    }
}