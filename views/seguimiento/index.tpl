<!-- Modal -->
<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog v">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seguimiento</h4>
      </div>
      <div class="modal-body">
           <div id='titulo'></div>
            <table id="tableDetalle" class="table table-striped table-hover small">
                <tr>
                    <th>Recibido</th>
                    <th>Remitido</th>
                    <th>Referente</th>
                    <th>Observaciones</th>
                    <th>Fecha de mov</th>
                    <th>Estado</th>
                </tr>
            </table>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary redirect">Agregar Entrada</button>
      </div>
    </div>
  </div>
</div>

<form class="form-inline" id="search-form" method="post" action="{$_layoutParams.root}seguimiento/"> 
    <fieldset>
        <legend>Mesa de Entradas de Personal</legend>
    <p><img class="icon-calendar" src="{$_layoutParams.root}views/layout/twb/img/calendar-icon_1.png" /> Buscar por rango de fecha <strong>(dd-mm-aaaa)</strong></p>        
    <input type="hidden" name="buscar" value="1" />
    <div class="input-append">
        <div id="salida-form2">   
            <input type="text" name="title" placeholder="Ingrese búsqueda…">
            <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
        </div>        
        <div id="fecha-form2" class="fecha-form">            
            <input class="form-control input-small" type="text" id="from" name="from" placeholder="Fecha desde...">&nbsp;&nbsp;
            <input class="form-control input-small" type="text" id="to" name="to" placeholder="Fecha hasta..."> 
            <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
        </div>            
    </div> 
    </fieldset>   
</form>   
<div class="btn-group" data-toggle="buttons-radio">
    <a href="{$_layoutParams.root}seguimiento/nuevo"><button type="button" class="btn btn-primary">Nuevo</button></a>
    <!--<button type="button" class="btn btn-primary">Editar</button>
    <button type="button" class="btn btn-primary">Eliminar</button>-->
   
</div><br>  

{if isset($busqueda) && count($busqueda)}
<table class="table table-bordered table-condensed table-striped small" id="detalle">
    <tr>
        <th>Núm Int</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Caracteristica</th>
        <th>Numero</th>
        <th>Año</th>
    </tr>    
    {foreach item=datos from=$busqueda}
        <tr>
            <td class="id">{$datos.id}</td>
            <td>{if $datos.fk_estado eq 0}ENTRADA{else}SALIDA{/if}</td>
            <td>{$datos.tipo}</td>                
            <td>{if $datos.exp_caracteristica neq '0'}{$datos.exp_caracteristica}{else}{/if}</td>
            <td> 
                 <a href="javascript:void(0)">{$datos.tipo_num}</a>
            </td>
            <td>{$datos.year}</td>
        </tr>
    {/foreach}          
</table>
{else}
    <p>No se encontraron resultados. Intente otra busqueda.</p>    
{/if}      
{$paginacion|default:""} 