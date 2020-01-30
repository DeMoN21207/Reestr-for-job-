$(document).ready(function () {

    $("#edit").click(function () {                            //разрешение редактирования

        $('.prop').prop('contenteditable', true);
    });

    $("#edit1").click(function () {                           //запрещение редактирования

        $('.prop').prop('contenteditable', false);
    });

    function load_data() {                                   //загрузка данных
        var name_smp, name_org, date_start, date_end, period;
        name_smp = $('#input_smp').val();
        name_org = $('#input_control').val();
        date_start = $('#date_start').val();
        date_end = $('#date_end').val();
        period = $('#period').val();
        $.ajax({
            url: 'find/param_table',
            method: 'post',
            data: {
                'name_smp': name_smp,
                'name_org': name_org,
                'date_start': date_start,
                'date_end': date_end,
                'period': period
            },
            dataType: 'JSON',
            success: function (data1) {                     //отрисовка таблицы по выбраным позициям пользователя
                var html1 = '<div class="ForReplace">';
                for (var count = 0; count < data1.length; count++) {
                    html1 += '<tr>';
                    html1 += '<td class="prop" data-row_id="' + data1[count].id_prov + '"data-column_name="id_smp1" contenteditable="false">' + data1[count].Name_SMP + '</td>';
                    html1 += '<td class="prop" data-row_id="' + data1[count].id_prov + '" data-column_name="id_contr1" contenteditable="false">' + data1[count].Name_contr + '</td>';
                    html1 += '<td class="prop" data-row_id="' + data1[count].id_prov + '" data-column_name="date_start" contenteditable="false">' + data1[count].date1 + '</td>';
                    html1 += '<td class="prop" data-row_id="' + data1[count].id_prov + '" data-column_name="date_end" contenteditable="false">' + data1[count].date2 + '</td>';
                    html1 += '<td class="prop" data-row_id="' + data1[count].id_prov + '" data-column_name="period_prov" contenteditable="false">' + data1[count].period_prov + '</td>';
                    html1 += '<td ><button type="button" data-delete="' + data1[count].id_prov + '" class="delete">Удалить</button></td>';
                    html1 += '</tr>';
                }
                html1 += '</div>';
                $('tbody').html(html1);
            }
        });
    }


    $('#add_to_bd').click(function () {                               //загрузка таблицы по клику
        load_data();
    });


    $(document).on('blur', '.prop', function () {                       //обновление данных
        var id = $(this).data('row_id');
        var table_column = $(this).data('column_name');
        var value = $(this).text();
        $.ajax({
            url: 'find/valid',
            method: 'POST',
            data: {
                id: id,
                table_column: table_column,
                value: value
            },
            dataType: 'json',
            success: function (data1) {

                if (data1.result == 'notexist') {
                    new Noty({
                        theme: 'sunset',
                        type: 'error',
                        text: 'Проверьте правильность введенных данных!'
                    }).show();
                    load_data();
                }
                if (data1.result == 'exist') {  //успешное обновление если данные есть в системе
                    $.ajax({
                        url: 'find/update',
                        method: 'POST',
                        data: {
                            id: id,
                            table_column: table_column,
                            value: value
                        },
                        success: function (data1) {
                            load_data();
                        }
                    });
                }

            }
        });
    });

    $(document).on('click', '.delete', function () {                    //удаление проверки
        var id = $(this).data('delete');
        $.ajax({
            url: "find/delete",
            method: "POST",
            data: {id: id},
            success: function (data1) {
                load_data();
            }
        });
    });

    $('#export').click(function () {                                  // экспорт таблицы в excel
        var name_smp, name_org, date_start, date_end, period;
        name_smp = $('#input_smp').val();
        name_org = $('#input_control').val();
        date_start = $('#date_start').val();
        date_end = $('#date_end').val();
        period = $('#period').val();
        $.ajax({
            type: 'POST',
            url: "find/export",
            data: {
                name_smp: name_smp,
                name_org: name_org,
                date_start: date_start,
                date_end: date_end,
                period: period
            },
            dataType: 'json'
        }).done(function (data) {
            var $a = $("<a>");
            $a.attr("href", data);
            $("body").append($a);
            $a.attr("download", "Proverka.xlsx");
            $a[0].click();
            $a.remove();
        });
    });

    var table = '#mytable';
    $('#maxRows').on('change', function () {    //скрипт для создания постраничной пагинации
        $('.pagination').html('');
        var trnum = 0;
        var maxRows = parseInt($(this).val());
        var totalRows = $(table + ' tbody tr').length;
        if (totalRows > maxRows) {
            var pagenum = Math.ceil(totalRows / maxRows);
            for (var i = 1; i <= pagenum;) {
                $('.pagination').append('<li class="page-item" data-page="' + i + '"><a class="page-link" href="#">' + i++ + '</a></li>').show()

            }
        }
        $(table + ' tr:gt(0)').each(function () {
            trnum++;
            if (trnum > maxRows) {
                $(this).hide()
            }
            if (trnum <= maxRows) {
                $(this).show()
            }
        });

        $('.pagination li:first-child').addClass('active');
        $('.pagination li').on('click', function () {
            var pageNum = $(this).attr('data-page');
            var trIndex = 0;
            $('.pagination li').removeClass('active');
            $(this).addClass('active');
            $(table + ' tr:gt(0)').each(function () {
                trIndex++;
                if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                    $(this).hide()
                } else {
                    $(this).show()
                }
            })
        })
    });

    $("#import_form").on('submit', function (event) {  //импорт данных
        event.preventDefault();
        $.ajax({
            url: "find/import",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#file').val('');
                load_data();
            }

        });
    });
});

