$(document).ready(function (){
    $('#addsmp').click(function(){
        var name_smp=$("#name_SMP").val();

      $.ajax({
          method:'post',
          url:'addsmp/valid',
          data:{name_smp:name_smp},
          dataType:'json',
          success:function (data) {
            if(data.result=='exist'){
                new Noty({
                    theme: 'sunset',
                    type:'error',
                    text: 'СМП уже существует в системе!'
                }).show();
            }
            if(data.result=='notexist'){
                $.ajax({
                    method:'post',
                    url:'addsmp/addsmp',
                    data:{
                        'name_smp':name_smp
                    },
                    success:function () {
                        new Noty({
                            theme: 'sunset',
                            type:'success',
                            text: 'СМП успешно добавлен!'
                        }).show();
                    }
                });
            }
          }

      })

    });
});

