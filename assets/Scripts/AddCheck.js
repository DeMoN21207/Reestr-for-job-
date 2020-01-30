$(document).ready(function () {
    $('#form_valid').validate({ //создание правил и сообщений для валидации формы
        rules: {
            name1: {
                required: true
            },
            name2: {
                required: true
            },
            name3: {
                required: true
            },
            name4: {
                required: true
            },
        },
        messages: {
            name1: {
                required: 'Выберите СМП',

            },
            name2: {
                required: 'Выберите контролирующий орган',

            },
            name3: 'Введите дату начала проверки',
            name4: 'Введите дату окончания проверки'
        },

    });

    $("#period").rules("add", {     //добавление правил для поля формы длительность
        required: true,
        digits: true,
        minlength: 1,
        maxlength: 2,
        messages: {
            required: "Введите длительность проверки",
            digits: 'Только числа',
            maxlength: 'Не более 2 символов'
        }
    });

    $("#add_to_bd").on('click', function () {
        if ($("#form_valid").valid()) {
            var smp = $('#input_smp').val();
            var control = $('#input_control').val();
            var DateStart = $('#date_start').val();
            var DateEnd = $('#date_end').val();
            var period = $('#period').val();
            $.ajax({                              //проверка на наличии записи в бд
                method: 'POST',
                url: 'addcheck/valid',
                data: {
                    smp: smp,
                    control: control,
                    DateStart: DateStart,
                    DateEnd: DateEnd,
                    period: period
                },
                dataType: 'json',
                success: function (data) {
                    if (data.result == "exist") {
                        new Noty({
                            theme: 'sunset',
                            type: 'error',
                            text: 'Такая проверка уже есть в системе!'
                        }).show();
                    }
                    if (data.result == "notexist") {
                        $.ajax({                    //добавление в систему если уникальна
                            method: 'POST',
                            url: 'addcheck/addcheck',
                            data: {
                                smp: smp,
                                control: control,
                                DateStart: DateStart,
                                DateEnd: DateEnd,
                                period: period
                            },
                            success: function () {
                                new Noty({
                                    theme: 'sunset',
                                    type: 'success',
                                    text: 'Проверка успешно добавлена!'
                                }).show();
                            }

                        })
                    }


                }
            })

        } else {
            new Noty({
                theme: 'sunset',
                type: 'error',
                text: 'Заполните все поля!'
            }).show();
        }

    })
});





