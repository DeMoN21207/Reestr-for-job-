$(document).ready(function () {
    $("#name_SMP" ).rules( "add", {
        required: true,
        digits: true,
        minlength: 1,
        messages: {
            required: "Введите длительность проверки",
            digits:'Только числа'
        }
    });


    $('#addcontr').click(function () {
        var name_contr = $("#name_contr").val();
        $.ajax({
            method:'post',
            url:'addorgan/valid',
            data:{name_contr:name_contr},
            dataType:'json',
            success:function (data) {
                if(data.result=='exist'){
                    new Noty({
                        theme: 'sunset',
                        type: 'error',
                        text: 'Орган уже существует в системе!'
                    }).show();
                }
                if (data.result=='notexist'){
                    $.ajax({
                        method: 'post',
                        url: 'addorgan/addcontr',
                        data: {
                            'name_contr': name_contr
                        },
                        success: function () {
                            new Noty({
                                theme: 'sunset',
                                type: 'success',
                                text: 'Орган успешно добавлен!'
                            }).show();
                        }
                    });
                }
            }
        })
    });
});