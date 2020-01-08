$(document).ready(function (){
    $('#addsmp').click(function(){
        var name_smp=$("#name_SMP").val();
        Toast.add({
            header: "Внимание",
            body:"Запись успешно добавлена",
            color:'#17a2b8',
            autohide: 'true',
            delay: 5000
        });
        $.ajax({
            method:'post',
            url:'addsmp/addsmp',
            data:{
                'name_smp':name_smp
            },


        });

    });
});

