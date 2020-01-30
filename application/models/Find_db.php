<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_db extends CI_Model
{
    public function GetOrgan()  //контролирующего органа(метод модели)
    {
        $sql = $this->db->select('*')->from('contr')->get()->result_array();
        return $sql;
    }

    public function GetSMP() //получение названия СМП (метод модели)
    {
        $sql = $this->db->select('*')->from('smp')->get()->result_array();
        return $sql;
    }


    public function GetIDNameSMP($NameSmp)//получение id по названию SMP из бд smp (метод модели)
    {
        return $this->db->select('id_smp')->from('smp')->where('Name_SMP', $NameSmp)->get()->result_array();
    }

    public function GetIDContOrgan($ContOrgan) //получение id по названию контролирующего органа (метод модели)
    {
        return $this->db->select('id_contr')->from('contr')->where('Name_contr', $ContOrgan)->get()->result_array();
    }

    public function update($data, $id) //обновление данных (метод модели)
    {
        $this->db->where('id_prov', $id);
        $this->db->update('period', $data);
    }

    public function delete($id) //удаление данных (метод модели)
    {
        $this->db->where('id_prov', $id);
        $this->db->delete('period');
    }

    public function param_table($name_smp, $name_org, $date_start, $date_end, $period)//формирование данных для таблицы по запросу пользователя (метод модели)
    {

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

    public function import($data) //импорт данных (метод модели)
    {
        $this->db->insert_batch('period', $data);

    }

    public function valid($table_column, $value) //проверка на существование данных в таблице (метод модели)
    {
        $sql = $this->db->select('*');
        if ($table_column == 'id_smp1') {
            $this->db->from('smp')->where('Name_SMP', $value);
        }
        if ($table_column == 'id_contr1') {
            $this->db->from('contr')->where('Name_contr', $value);

        }
        $sql = $this->db->get()->result_array();
        return $sql;
    }
}