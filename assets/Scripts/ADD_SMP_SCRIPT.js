$(document).ready(function () {


    $("#AddSMP").validate({
        rules: {
            name_SMP1: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            name_SMP1: {
                required: "Введите текст",
                minlength: 'Не короче 3 символов',
            }
        }

    });


    $('#addsmp').click(function () {
        if ($("#name_SMP").valid()) {
            var name_smp = $("#name_SMP").val();
            $.ajax({
                method: 'post',
                url: 'addsmp/valid',
                data: {name_smp: name_smp},
                dataType: 'json',
                success: function (data) {
                    if (data.result == 'exist') {
                        new Noty({
                            theme: 'sunset',
                            type: 'error',
                            text: 'СМП уже существует в системе!'
                        }).show();
                    }
                    if (data.result == 'notexist') {
                        $.ajax({
                            method: 'post',
                            url: 'addsmp/addsmp',
                            data: {
                                'name_smp': name_smp
                            },
                            success: function (data) {
                                new Noty({
                                    theme: 'sunset',
                                    type: 'success',
                                    text: 'СМП успешно добавлен!'
                                }).show();
                            }
                        });
                    }
                }

            })
        } else {
            new Noty({
                theme: 'sunset',
                type: 'error',
                text: 'Поле не должно быть пустым!'
            }).show();
        }
    });
});

