$(document).ready(function(){
    $('#leg-form').validate({
        rules:{
            remite:{
                required: true
            },
            recibe:{
                required: true
            },
            estado:{
                required: true
            }
        },
        messages:{
            remite: {
                required: "Debe introducir un remitente"
            },
            recibe: {
                required: "Debe introducir un receptor"
            },
            estado:{
                required: "Debe seleccionar un estado del legajo"
            }
       }    
    });
});