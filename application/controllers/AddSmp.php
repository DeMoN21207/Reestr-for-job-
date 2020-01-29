<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddSmp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('addsmp_db', 'm');
    }

    public function index()
    {
        $title['title'] = 'Добавить СМП';
        $this->load->view('layout/header', $title);
        $this->load->view('addsmp/addsmp');
        $this->load->view('layout/footer');

    }

    public function AddSMP()
    {
        $name_smp = $this->input->post('name_smp');
        if (!empty($name_smp)) {
            $this->m->addsmp($name_smp);
        }
    }

    public function valid()
    {
        $value = $this->input->post('name_smp');
        if (isset($value)) {
            $query = $this->m->valid($value);
            if ($query) {
                echo json_encode(array('result' => 'exist'));
            } else {
                echo json_encode(array('result' => 'notexist'));
            }
        }
        else{

        }
    }

}