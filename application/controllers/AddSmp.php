<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddSmp extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reestr_db','m');
    }
    public function index(){
        $title['title']='Добавить СМП';
        $this->load->view('layout/header',$title);
        $this->load->view('addsmp/addsmp');
        $this->load->view('layout/footer');

    }
    public function AddSMP(){
        $name_smp=$this->input->post('name_smp');
        if(!empty($name_smp)) {
            $this->m->addsmp($name_smp);
        }
    }

}