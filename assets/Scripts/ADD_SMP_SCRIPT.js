$(document).ready(function() {

    $("#ok1").click(function () {
        var pust=$("#name_SMP").val();
        if(pust==""){
            $("#name_SMP").after("<p id='suc'>Введите название СМП</p>");
        }
        else
        {
            var name_smp=$("#name_SMP").val();
            $.ajax({
                type:'ajax',
                method:'post',
                url:'insertto',
                data:{
                    'name_smp':name_smp,
                    'name_contr'

                },
                dateType:'html'
            });


            if($("#suc").length>0){
                $("#suc").remove();
            }
        }

    });

});

