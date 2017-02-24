$(document).ready(function () {
    $(function () {
        $("#OrderList ol").sortable({
            opacity: 0.6,
            cursor: 'move',
            update: function () {
                $("#Atualizar").click(function (e) {
                    e.preventDefault();
                    var order   = $("#OrderList ol").sortable('serialize');
                    var formu = document.getElementById('Atualizar').form ;
                    $.ajax({
                        url: formu,
                        type: "POST",
                        data:  order,
                        success: function (data, textStatus, xhr) {
                            console.log(data.some_parameter + data.success )
                            
                            $("#Array").html(data.resultad)
                        },
                        error: function (data , xhr, textStatus, errorThrown) {
                            console.log(data.error)
                        }
                    });
                });
            }
        });
    });
    /* $("#teste").click(function (e) {
     e.preventDefault();
     var teste = $("#val").val();
     $.ajax({
     url: "/dashboard/slider",
     type: "POST",
     data: {n1: teste},
     success: function (data, textStatus, xhr) {
     console.log(data.some_parameter + data.success)
     $("#Array").val(data.resultad)
     },
     error: function (xhr, textStatus, errorThrown) {
     
     }
     });
     
     });
     */
});