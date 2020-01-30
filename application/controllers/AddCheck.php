<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCheck extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('addcheck_db', 'm');

    }

    public function index()  //загрузка основной страницы
    {
        $title['title'] = 'Добавление проверки';
        $data['organ'] = $this->m->GetOrgan();
        $data['smp'] = $this->m->GetSMP();
        $this->load->view('layout/header', $title);
        $this->load->view('addcheck/addcheck', $data);
        $this->load->view('layout/footer');
    }

    public function AddCheck() //добавление проверки в
    {
        $this->m->InsertCheck();

    }

    public function valid() //проверка на существование данных из формы в бд
    {
        $smp = $this->input->post('smp');
        $control = $this->input->post('control');
        $DateStart = $this->input->post('DateStart');
        $DateEnd = $this->input->post('DateEnd');
        $period = $this->input->post('period');
        $query = $this->m->valid($smp, $control, $DateStart, $DateEnd, $period);

        if ($query) {
            echo json_encode(array('result' => 'exist'));
        } else {
            echo json_encode(array('result' => 'notexist'));
        }
    }
}