<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    public function index() //загрузка отображения главной страницы
    {
        $title['title'] = 'Главная';
        $this->load->view("layout/header", $title);
        $this->load->view('mainpage/mainpage');
        $this->load->view("layout/footer");
    }


}