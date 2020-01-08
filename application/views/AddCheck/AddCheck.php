<body style="background: url(/assets/Images/AddCheck/BackCheck.jpg); background-repeat: no-repeat">
<link rel="stylesheet" type="text/css" href="/assets/css/MyStyle.css">
<div class="container" >

    <div style="margin-top: 20%">
    <form id="form_valid" method="post" action="addcheck/addcheck">
        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label>Название СМП</label>
                <select type="text" name="name1" class="form-control form-control-lg"   id="input_smp" required >
                    <option value="">Выберите из списка</option>
                    <? foreach ($smp as $value){?>
                        <option ><?php echo $value['Name_SMP'];?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Название контролирующего органа</label>
                <select type="text" name="name2" class="form-control form-control-lg"   id="input_control" required >
                    <option value="">Выберите из списка </option>
                    <? foreach ($organ as $value){?>
                    <option ><?php echo $value['Name_contr'];?></option>
                <?php }?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="date_start">Дата начала проверки</label>
                <input type="date" name="name3" class="form-control form-control-lg"  id="date_start" required>
            </div>
            <div class="form-group col-md-4">
                <label for="date_end">Дата окончания проверки</label>
                <input type="date" name="name4" class="form-control form-control-lg"  id="date_end" required>
            </div>
            <div class="form-group col-md-4">
                <label for="period">Длительность</label>
                <input type="text" name="name5" class="form-control form-control-lg" placeholder="Введите длительность проверки" id="period" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input type="submit" class="btn btn-success " value="Добавить проверку" id="add_to_bd">
            </div>

            <div class="col-md-8">
                <a href="<?php echo base_url()?>" class="btn btn-danger">Вернуться</a>
            </div>
        </div>
    </form>
        </div>
</div>
<script type="text/javascript" src="/assets/Scripts/AddCheck.js"></script>





