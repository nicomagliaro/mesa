$(document).on('ready', function(){
    $(".pagina").click(function(){
        paginacion($(this).attr("pagina"));
    });
    
    $(".pagina").live('click', function(){
        paginacion($(this).attr("pagina"));
    });
    
    var paginacion = function(pagina){
        var pagina = 'pagina=' + pagina;
        
        $.post(_root_ + 'post/pruebaAjax', pagina, function(data){
            $("#lista_registros").html('');
            $("#lista_registros").html(data);
        });
    };
});


