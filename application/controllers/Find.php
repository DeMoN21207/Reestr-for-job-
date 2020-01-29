<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Find extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('find_db', 'm');
        $this->load->library('table');
    }


    public function index()
    {
        $title['title'] = 'Поиск по реестру';
        $data['organ'] = $this->m->GetOrgan();
        $data['smp'] = $this->m->GetSMP();
        $this->load->view('layout/header', $title);
        $this->load->view('find/find', $data);
        $this->load->view('layout/footer');
    }

    function load_data()
    {                              //для построения при загрузке
        $data = $this->m->load_data();
        echo json_encode($data);
    }

    function param_table()
    {//для построения таблицы по заданным параметрам
        $name_smp = $this->input->post('name_smp');
        $name_org = $this->input->post('name_org');
        $date_start = $this->input->post('date_start');
        $date_end = $this->input->post('date_end');
        $period = $this->input->post('period');
        $data1 = $this->m->param_table($name_smp, $name_org, $date_start, $date_end, $period);
        echo json_encode($data1);
    }

    function update()
    {                  //обновление данных
        $NameColumn = $this->input->post('table_column');
        echo $NameColumn;
        $value = $this->input->post('value');
        $id = $this->input->post('id');

        if ($NameColumn == "id_smp1") {
            $Name_SMP = $this->m->GetIDNameSMP($value);       //получаем новый id по названию нового смп
            $value = $Name_SMP[0]['id_smp'];
        }

        if ($NameColumn == "id_contr1") {
            $Name_Contr = $this->m->GetIDContOrgan($value);
            $value = $Name_Contr[0]['id_contr'];         //получаем новый id по названию нового органа
        }
        if ($NameColumn == 'date_start') {
            $new_Date = date("Y-m-d", strtotime($value));
            $value = $new_Date;
        }
        if ($NameColumn == 'date_end') {
            $new_Date = date("Y-m-d", strtotime($value));
            $value = $new_Date;
        }
        $data = array(
            $NameColumn => $value
        );
        $this->m->update($data, $id);

    }

    public function delete()
    {                           //удаление записи
        $this->m->delete($this->input->post('id'));

    }

    public function Export()  //Экспорт в Excel
    {
        header('Content-Type: application/json');
        require 'vendor/autoload.php';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $name_smp = $this->input->post('name_smp');
        $name_org = $this->input->post('name_org');
        $date_start = $this->input->post('date_start');
        $date_end = $this->input->post('date_end');
        $period = $this->input->post('period');
        $data = $this->m->param_table($name_smp, $name_org, $date_start, $date_end, $period);
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $table_array = array("Название СМП", "Контролирующий орган", "Дата начала проверки", "Дата конца проверки", "Длительность");
        $column = 1;
        foreach ($table_array as $field) {
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $excel_row = 2;
        foreach ($data as $row) {

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['Name_SMP']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['Name_contr']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['date1']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['date2']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['period_prov']);
            $excel_row++;
        }
        $writer = new Xlsx($spreadsheet);
        ob_start();
        $writer->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        echo json_encode('data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' . base64_encode($xlsData));
    }

    public function import()
    {                                   //импорт данных
        if (isset($_FILES['file']['name'])) {
            $path = $_FILES['file']['tmp_name'];
            $object = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $Name_SMP = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $Name_contr = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $date_start = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $date_end = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $period = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $new_DateStart = date("Y-m-d", strtotime($date_start));
                    $new_DateEnd = date("Y-m-d", strtotime($date_start));
                    $Name_SMP = $this->m->GetIDNameSMP($Name_SMP);
                    $value = $Name_SMP[0]['id_smp'];
                    $Name_contr1 = $this->m->GetIDContOrgan($Name_contr);
                    $value1 = $Name_contr1[0]['id_contr'];
                    if (!empty($value) and !empty($value1)) {
                        $data[] = array(
                            'id_smp1' => $value,
                            'id_contr1' => $value1,
                            'date_start' => $new_DateStart,
                            'date_end' => $new_DateEnd,
                            'period_prov' => $period
                        );
                    }
                }
                $this->m->import($data);
                echo 'Данные успешно добавлены';

            }
        }

    }

    public function valid()
    {
        $table_column=$this->input->post('table_column');
        $value=$this->input->post('value');
        $query=$this->m->valid($table_column,$value);
        if($query){
            echo  json_encode(array('result'=>'exist'));
        }
        else{
            echo json_encode(array('result'=>'notexist'));
        }
    }

}