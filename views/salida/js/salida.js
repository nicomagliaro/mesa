/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on('ready', function(){
    var id_num = '';
    var id_tipo = '';
    $('#fecha-form').hide();
    /* controla la busqueda por string o rango de fechas */
    $('.icon-calendar').on('click', function(){
        if($('#salida-form').is(':visible')) {
            $('#salida-form').fadeOut(350);
            $('#salida-form input').val('');
            $('#fecha-form').fadeIn(500);
        }else{
            $('#fecha-form').fadeOut(350);
            $('#fecha-form input').val('');
            $('#salida-form').fadeIn(500);
        }       
    });
   

$('#salida-table tr').on('click', function(e){
    e.preventDefault();
    
    id_num = $(this).find('td:first').text();
    id_tipo = $(this).find('input').val();
    //alert("num: " + id_num + " - tipo: " + id_tipo );
    $('#myModal').modal({
            backdrop: true,
            keyboard: true,
            show: true
        }).css({
            // make width 90% of screen
           'width': function () { 
               return ($(document).width() * .4) + 'px';  
           },
            // center model
           'margin-left': function () { 
               return -($(this).width() / 2); 
           }
    });
    
    });

    $('#send').on('click', function(e){
        /*$("input[type='hidden']").remove();

        in1 = $("<input>").attr("type", "hidden")
                            .attr("name", 'num')
                            .val(id_num);
        $(this).append($(in1));

        in2 = $("<input>").attr("type", "hidden")
                            .attr("name", 'tipo')
                            .val(id_tipo);            
        $(this).append($(in2));*/
        
        var params = { num:id_num,
                       tipo:id_tipo,
                       remitido:$.trim($('#remitido').val()),
                       referente:$.trim($('#referente').val()),
                       observacion:$.trim($('#observacion').val())
                      };
        e.preventDefault();
        var uri = 'procesarSalida';            
        $.ajax({
            type: 'POST',
            url: uri,
            data: params, 
            success: function (result) {
                // do something here with response;
                $('#myModal').modal('hide');
                $(".id-" + id_num).remove();
                id_num = '';
                id_tipo = '';

           },
           error: function() { 

               console.log("No ha sido posible completar el proceso!");
           }
       });  


    });

     

});
