<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddOrgan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reestr_db', 'm');
    }

    public function index()
    {
        $title['title'] = "Контролирующий орган";
        $this->load->view('layout/header', $title);
        $this->load->view('addcontr/addcontr');
        $this->load->view('layout/footer');

    }

    public function AddContr()
    {
        $name_contr = $this->input->post('name_contr');
        if (!empty($name_contr)) {
            $this->m->addcontr($name_contr);
        }
    }

}