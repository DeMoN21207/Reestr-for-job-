<body style="background: url(/assets/Images/AddSmp/BackCheck.jpg); background-repeat: no-repeat">
<form id="AddSMP">
    <div class="container" style="margin-top: 18%">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md">
                <label for="form">СМП</label>
                <input type="text" name="name_SMP1" class="form-control" id="name_SMP" placeholder="Введите СМП"
                       required>
            </div>
            <div class="col-md"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" style="margin-top: 4pt" id="addsmp" \> Добавить</button>
            <a href="<?php echo base_url(); ?>" class="btn btn-danger" style="margin-top: 4pt"> Вернуться</a>
        </div>
        <div class="col-md-4"></div>
    </div>
</form>
<script type="text/javascript" src="/assets/Scripts/ADD_SMP_SCRIPT.js"></script>
