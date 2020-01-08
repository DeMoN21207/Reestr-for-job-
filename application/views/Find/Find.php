<body>

<link rel="stylesheet" type="text/css" href="/assets/css/MyStyle.css">
<div class="container" >

    <div style="margin-top: 5%">
        <form id="form_valid" >
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label>Название СМП</label>
                    <select type="text" name="name_smp" class="form-control form-control-lg"   id="input_smp">
                        <option value="">Выберите из списка</option>
                        <? foreach ($smp as $value){?>
                            <option ><?php echo $value['Name_SMP'];?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Название контролирующего органа</label>
                    <select type="text" name="name_org" class="form-control form-control-lg"   id="input_control" >
                        <option value="">Выберите из списка </option>
                        <? foreach ($organ as $value){?>
                            <option ><?php echo $value['Name_contr'];?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_start">Дата начала проверки</label>
                    <input type="date" name="date_start" class="form-control form-control-lg"  id="date_start" >
                </div>
                <div class="form-group col-md-4">
                    <label for="date_end">Дата окончания проверки</label>
                    <input type="date" name="date_end" class="form-control form-control-lg"  id="date_end" >
                </div>
                <div class="form-group col-md-4">
                    <label for="period">Длительность</label>
                    <input type="text" name="period" class="form-control form-control-lg" placeholder="Введите длительность проверки" id="period">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <input type="button" class="btn btn-success " value="Построить таблицу" id="add_to_bd">
                </div>
                <div class="form-group col-md-3">
                    <input type="button" class="btn btn-primary " value="Разрешить редактировать" id="edit">
                </div>
                <div class="form-group col-md-3">
                    <input type="button" class="btn btn-warning " value="Запретить редактировать" id="edit1">
                </div>
                <div class="col-md-3">
                    <a href="<?php echo base_url()?>" class="btn btn-danger">Вернуться</a>
                </div>
            </div>

        </form>
        <form method="post" id="import_form" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-3">
                    <input type="file" name="file" id="file" required accept=" .xls, .xlsx"/>
                    <input type="submit" class="btn btn-primary" value="Импорт" id="import" style="margin-top: 5px">
                </div>
                <div class="form-group col-md-3">
                    <img src="/assets/Images/Find/Excel.png" width="60" height="60" id="export" style ='cursor: pointer;'>
                </div>

                <div class="form-group col-md-3"></div>
            </div>
        </form>

    </div>
</div>

<div class="container">
<table class="table table-bordered table-hover">
    <thead class="table-dark"">
    <tr>
    <td>Название СМП</td>
    <td>Контролирующий орган</td>
    <td>Начало проверки</td>
    <td>Окончание проверки</td>
    <td>Длительность проверки</td>
    <td>Действие</td>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
<script type="text/javascript" src="/assets/Scripts/findReestr.js"></script>





