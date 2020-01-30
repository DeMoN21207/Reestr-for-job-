<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddOrgan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('addorgan_db', 'm');
    }

    public function index() //загрузка начальной страницы
    {
        $title['title'] = "Контролирующий орган";
        $this->load->view('layout/header', $title);
        $this->load->view('addcontr/addcontr');
        $this->load->view('layout/footer');

    }

    public function AddContr() //добавление контролирующего органа в бд
    {
        $name_contr = $this->input->post('name_contr');
        if (!empty($name_contr)) {
            $this->m->addcontr($name_contr);
        }
    }

    public function valid() //проверка на существование нового органа в бд
    {
        $value = $this->input->post('name_contr');

        $query = $this->m->valid($value);
        if ($query) {
            echo json_encode(array('result' => 'exist'));
        } else {
            echo json_encode(array('result' => 'notexist'));
        }

    }
}