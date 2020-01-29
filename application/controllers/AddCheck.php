<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCheck extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('addcheck_db', 'm');

    }

    public function index()
    {            //стандартное отображение
        $title['title'] = 'Добавление проверки';
        $data['organ'] = $this->m->GetOrgan();
        $data['smp'] = $this->m->GetSMP();
        $this->load->view('layout/header', $title);
        $this->load->view('addcheck/addcheck', $data);
        $this->load->view('layout/footer');
    }

    public function AddCheck()
    {
        $this->m->InsertCheck();
        redirect(base_url().'/addcheck');

    }

}