<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }


    public function index()
    {
        $title['title'] = 'Главная';
        $this->load->view("layout/header", $title);
        $this->load->view('general/general_panel');
        $this->load->view("layout/footer");
    }


}