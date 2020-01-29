<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCheck_db extends CI_Model
{
    public function GetOrgan()
    {             //для получения контролирующего органа
        $sql = $this->db->select('*')->from('contr')->get()->result_array();
        return $sql;
    }

    public function GetSMP()
    {
        $sql = $this->db->select('*')->from('smp')->get()->result_array();
        return $sql;
    }

    public function GetIDNameSMP($NameSmp)
    { //получение id по названию SMP
        return $this->db->select('id_smp')->from('smp')->where('Name_SMP', $NameSmp)->get()->result_array();
    }

    public function GetIDContOrgan($ContOrgan)
    { //получение id по названию контролирующего органа
        return $this->db->select('id_contr')->from('contr')->where('Name_contr', $ContOrgan)->get()->result_array();
    }

    public function InsertCheck()
    {                                                    //вставка проверки в бд
        $name_smp = $this->input->post('name1');
        $name_organ = $this->input->post('name2');
        $id_smp = $this->GetIDNameSMP($name_smp);
        $id_organ = $this->GetIDContOrgan($name_organ);

        $data = array(
            'id_smp1' => $id_smp[0]['id_smp'],
            'id_contr1' => $id_organ[0]['id_contr'],
            'date_start' => $this->input->post('name3'),
            'date_end' => $this->input->post('name4'),
            'period_prov' => $this->input->post('name5')
        );
        return $this->db->insert('period', $data);
    }
}