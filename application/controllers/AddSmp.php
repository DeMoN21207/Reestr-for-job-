<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddSmp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('addsmp_db', 'm');
    }

    public function index() //загрузка основной страницы добавления смп
    {
        $title['title'] = 'Добавить СМП';
        $this->load->view('layout/header', $title);
        $this->load->view('addsmp/addsmp');
        $this->load->view('layout/footer');

    }

    public function AddSMP() //добавление нового СМП в бд
    {
        $name_smp = $this->input->post('name_smp');
        if (!empty($name_smp)) {
            $this->m->addsmp($name_smp);
        }
    }

    public function valid() //проверка на существование нового СМП в бд
    {
        $value = $this->input->post('name_smp');

        $query = $this->m->valid($value);
        if ($query) {
            echo json_encode(array('result' => 'exist'));
        } else {
            echo json_encode(array('result' => 'notexist'));
        }


    }

}