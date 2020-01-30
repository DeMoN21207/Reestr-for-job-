$("#form_valid").validate({
    messages: {
        name1: {
            required:'Выберите СМП',
            minlength:'не короче 4 символов'
        },
        name2: {
            required:'Выберите контролирующий орган',
            minlength:'не короче 4 символов'
        },
        name3:'Введите дату начала проверки',
        name4:'Введите дату окончания проверки'
    },
    submitHandler: function(form) {
        




    }
});

$("#period" ).rules( "add", {
    required: true,
    digits: true,
    minlength: 1,
    messages: {
        required: "Введите длительность проверки",
        digits:'Только числа'
    }
});





