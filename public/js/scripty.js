/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on('ready', function(){
    var tipo = '';
    var num  = '';                 
    
    /* controla la busqueda por string o rango de fechas */
    $('#fecha-form2').hide();
    
    $('.icon-calendar').on('click', function(){
        if($('#salida-form2').is(':visible')) {
            $('#salida-form2').fadeOut(350);
            $('#salida-form2 input').val('');
            $('#fecha-form2').fadeIn(500);
        }else{
            $('#fecha-form2').fadeOut(350);
            $('#fecha-form2 input').val('');
            $('#salida-form2').fadeIn(500);
        }       
    });
    
    /* Oculta y muestra la caracteristica y el alcance si el tipo es expediente */
    $('#caracteristica').hide('fast');
    $('#alcance').hide('fast');
    $('#form2 tr:first').change(function(){ 
        var selected = $('option:selected').val();
        //alert(selected);
        if( selected === '3')
        {
            //alert(selected);
            $('#caracteristica').show('fast');
            $('#alcance').show('fast');
        }else{
            $('#caracteristica').hide('fast');
            $('#alcance').hide('fast');
        }
    });
    
    /* Consulta mesa de entradas */
    $('#detalle tr').on('click', function(e){
        e.preventDefault();
        var datos = $(this).find('td:first').text();
        var uri = 'verDetalle';
   
        $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: uri,
            dataType: 'json',
            //json object to sent to the authentication url
            data: { 'id' : datos },
            success: function ( result ) {
                var estado = '';              
                $("#tableDetalle td").remove();                                  
                for (var i=0;i<result.length;++i)
                {
                    if(result[i].estado === '0'){
                        estado = 'ENTRADA';

                    }else{
                        estado = 'SALIDA';
                    }                    
                    $("#titulo").html("<h5>" + result[0].tipo + " - " + result[0].tipo_num + " / " + result[0].year + (result[0].alcance >= 1 ? ' - Alcance: '+result[0].alcance : '') + "</h5>");
                    $("#tableDetalle").append("<tr><td>" + (result[i].recibido === null ? '->' : result[i].recibido) + "</td><td>" + (result[i].remitido === null ? '<-' : result[i].remitido) + "</td><td>" + result[i].referente + "</td><td>" + result[i].detalle + "</td><td>" + result[i].fecha_mov + "</td><td>" + estado + "</td></tr>"); 
                    //$('#vars').append('<p name="tipo">' + result[0].tipo + '</p><p name="num">' + result[0].tipo_num + '</p>').hide('fast');
                    tipo = result[0].tipo_id;
                    num  = result[0].mesa_id;
                }
                if(result[0].estado === '0'){
                    //do something                        
                    if($(".redirect").is(":visible")){
                        $(".redirect").hide();
                    }
                }else{
                    if($(".redirect").is(":hidden")){
                        $(".redirect").show();
                    }
                }
                //$('#myModal').modal('show');
                $('#myModal').modal({
                        backdrop: true,
                        keyboard: true,
                        show: true
                    }).css({
                        // make width 90% of screen
                       'width': function () { 
                           return ($(document).width() * .8) + 'px';  
                       },
                        // center model
                       'margin-left': function () { 
                           return -($(this).width() / 2); 
                       }
                });
                
            },
            error: function () { 
                alert("error de conexion: 601"); 
            }            
               
        });
        
        });
    
        /* Redirige a la carga de nueva entrada de expediente */
        
        $('.redirect').on('click', function(){
           $(window.location).attr('href', 'inSeg/' + tipo + "/" + num); 
        });
    
        $('#form2').validate({
        rules:{
            tipo:{
                required: true
            },
            num_ref:{
                number: true
            },
            alcance:{
                number: true
            },
            year:{
                required: true
            },
            recibido:{
                required: true
            },
            referente:{
                required: true
            }
        },
        messages:{
            tipo: {
                required: "Debe seleccionar un tipo de acto administrativo"
            },
            num_ref: {
                required: "Debe introducir un número"
            },
            alcance: {
                required: "Debe introducir un valor numérico"
            },
            year: {
                required: "Debe seleccionar un año de caratulación"
            },
            recibido: {
                required: "Debe introducir un remitente"
            },
            referente:{
                required: "Debe introducir un referente"
            }
       }    
    });
});



