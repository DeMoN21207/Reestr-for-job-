$(document).ready(function () {

    $( "#contrForm" ).validate({
        rules:{
            name_contr:{
                required:true,
                minlength:3}
        },
        messages:{
            name_contr: {
                required:"Введите название контролирующего органа",
                minlength:'Не короче 3 символов',
            }
        }

    });

   $('#addcontr').click(function () {
        if($('#name_contr').valid()){
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
        }
        else {
            new Noty({
                theme: 'sunset',
                type: 'error',
                text: 'Поле не может быть пустым!'
            }).show();
        }

    });
});