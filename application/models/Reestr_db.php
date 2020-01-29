<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reestr_db extends CI_Model
{   //функции для работы с базой


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
    {                  //вставка проверки в бд
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

    public function load_data()
    {
        $sql = $this->db->select('period.id_prov,smp.Name_SMP,contr.Name_contr,date_format(period.date_start,\'%d/%m/%Y\') as date1,date_format(period.date_end,\'%d/%m/%Y\') as date2,period.period_prov')->from('period')->join('smp', 'period.id_smp1 = smp.id_SMP', 'inner')->join('contr', 'period.id_contr1 = contr.id_contr', 'inner');
        $sql = $this->db->get()->result_array();
        return $sql;
    }

    public function param_table($name_smp, $name_org, $date_start, $date_end, $period)
    { //вывод таблицы по запросу пользователя

        $sql = $this->db->select('period.id_prov,smp.Name_SMP,contr.Name_contr,date_format(period.date_start,\'%d/%m/%Y\') as date1,date_format(period.date_end,\'%d/%m/%Y\') as date2,period.period_prov')->from('period')->join('smp', 'period.id_smp1 = smp.id_SMP', 'inner')->join('contr', 'period.id_contr1 = contr.id_contr', 'inner');
        if (!empty($name_smp)) {
            $this->db->where('Name_SMP', $name_smp);
        }
        if (!empty($name_org)) {
            $this->db->where('Name_contr', $name_org);
        }
        if (!empty($date_start)) {
            $this->db->where('date_start', $date_start);
        }
        if (!empty($date_end)) {
            $this->db->where('date_end', $date_end);
        }
        if (!empty($period)) {
            $this->db->where('period_prov', $period);
        }
        $sql = $this->db->get()->result_array();
        return $sql;
    }

    public function update($data, $id)
    {                      //непосредственно обновление данных
        $this->db->where('id_prov', $id);
        $this->db->update('period', $data);
    }

    public function delete($id)
    {                            //удаление данных
        $this->db->where('id_prov', $id);
        $this->db->delete('period');
    }

    public function import($data)
    {                               //импорт данных
        $this->db->insert_batch('period', $data);

    }

    public function addsmp($name_smp)
    {
        $data = array('Name_SMP' => $name_smp);
        $this->db->insert('smp', $data);

    }

    public function addcontr($name_contr)
    {
        $data = array('Name_contr' => $name_contr);
        $this->db->insert('contr', $data);

    }

    public function valid($table_column, $value)
    {
        $sql = $this->db->select('*');
        if ($table_column == 'id_smp1') {
            $this->db->from('smp')->where('Name_SMP',$value);
        }
        if ($table_column == 'id_contr1') {
            $this->db->from('contr')->where('Name_contr',$value);

        }
        $sql = $this->db->get()->result_array();
        return $sql;
    }

}
