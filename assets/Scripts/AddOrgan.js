$(document).ready(function (){
    $('#addcontr').click(function(){
        var name_contr=$("#name_contr").val();

        $.ajax({
            method:'post',
            url:'addorgan/addcontr',
            data:{
                'name_contr':name_contr
            },


        });

    });
});