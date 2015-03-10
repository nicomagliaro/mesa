/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).on('ready', function(){    
    var leg = '';
    var getData = function(){
        return $("#detalle td:first").text();
        
    };
    
    $('.nuevo').on('click', function(){
       $(window.location).attr('href', 'nuevo/' + leg); 
    });
    
    $('#volver').on('click', function(){
        $(window.location).attr('href', '/mesa/legajo');
    });
    
    $('#leg tr').on('click',  function() {
        // Do stuff, such as opening the modal window.
        var datos = $(this).find('td:first').text();
        var uri = 'verDetalle';
        $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: uri,
            dataType: 'json',
            //json object to sent to the authentication url
            data: { 'leg' : datos },
            success: function ( result ) {
                if ($.isEmptyObject(result)){
                    $(window.location).attr('href', 'nuevo/' + datos);
                }else{
                    leg = result[0].legajo;
                    $("#legDetalle td").remove();
                    for (var i=0;i<result.length;++i)
                    {
                        $("#titulo").html("<h5>AGENTE:&nbsp" + result[0].apellido + ", " + result[0].nombre + "- LEG:&nbsp" + result[0].legajo + "&nbsp&nbsp&nbsp DESTINO:&nbsp" + result[0].destinos + "</h5>");
                        $("#legDetalle").append("<tr><td>" + result[i].entregado + "</td><td>" + result[i].recibido + "</td><td>" + result[i].estado + "</td><td>" + result[i].date + "</td><td>" + result[i].detalle + "</td></tr>");            
                    }
                }                
                $('#Modal').modal({
                        backdrop: true,
                        keyboard: true,
                        show: true
                    }).css({
                        // make width #% of screen
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
 });       

