<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddOrgan_db extends CI_Model
{
    public function addcontr($name_contr) //добавление нового контролирующего органа(метод модели)
    {
        $data = array('Name_contr' => $name_contr);
        $this->db->insert('contr', $data);

    }

    public function valid($value)   //проверка на существование нового контр.органа в бд
    {
        return $this->db->select('*')->from('contr')->where('Name_contr', $value)->get()->result_array();
    }

}