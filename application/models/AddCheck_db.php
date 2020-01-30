<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCheck_db extends CI_Model
{
    public function GetOrgan() //получение контролирующего органа
    {
        $sql = $this->db->select('*')->from('contr')->get()->result_array();
        return $sql;
    }

    public function GetSMP()//получение субьекта предпринимательства
    {
        $sql = $this->db->select('*')->from('smp')->get()->result_array();
        return $sql;
    }

    public function GetIDNameSMP($NameSmp) //получение id по названию SMP из бд smp
    { //получение id по названию SMP
        return $this->db->select('id_smp')->from('smp')->where('Name_SMP', $NameSmp)->get()->result_array();
    }

    public function GetIDContOrgan($ContOrgan)//получение id по названию контролирующего органа
    { //получение id по названию контролирующего органа
        return $this->db->select('id_contr')->from('contr')->where('Name_contr', $ContOrgan)->get()->result_array();
    }

    public function InsertCheck() //вставка проверки СМП в бд
    {
        $name_smp = $this->input->post('smp');
        $name_organ = $this->input->post('control');
        $id_smp = $this->GetIDNameSMP($name_smp);
        $id_organ = $this->GetIDContOrgan($name_organ);

        $data = array(
            'id_smp1' => $id_smp[0]['id_smp'],
            'id_contr1' => $id_organ[0]['id_contr'],
            'date_start' => $this->input->post('DateStart'),
            'date_end' => $this->input->post('DateEnd'),
            'period_prov' => $this->input->post('period')
        );
        return $this->db->insert('period', $data);
    }

    public function valid($smp,$control,$DateStart,$DateEnd,$period){ //проверка наличия Новой проверки СМП в бд
           $idSMP1=$this->GetIDNameSMP($smp);
           $idCONTR1=$this->GetIDContOrgan($control);
           $idSMP=$idSMP1[0]['id_smp'];
           $idCONTR=$idCONTR1[0]['id_contr'];
           return $this->db->select('*')->from('period')->where('id_smp1',$idSMP)->where('id_contr1',$idCONTR)->where('date_start',$DateStart)->where("date_end",$DateEnd)->where('period_prov',$period)->get()->result_array();
    }
}