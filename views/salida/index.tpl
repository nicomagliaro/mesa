<!-- Modal -->
<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog v">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Salida</h4>
      </div>
      <div class="modal-body">
           <div id='titulo'></div>   
           <form id="form-salida" method="POST">
            <table class="table table-bordered" style="width: 350px;">   
                <tr>
                    <td style="text-align: right;">Remitido: </td>
                    <td><input type="texto" name="remitido" value="" id="remitido" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
                </tr> 
                <tr>
                    <td style="text-align: right;">Referente a: </td>
                    <td><input type="texto" name="referente" value=""  id="referente" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
                </tr> 
                <tr>
                    <td style="text-align: right;">Observaciones: </td>
                    <td><textarea name="observacion" id="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" ></textarea></td>
                </tr> 
            </table>   
            <p><button class="btn btn-primary" id="send"><i class="icon-ok icon-white"> </i> Guardar </button></p>    
           </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div>
    <form class="form-inline"  id="search-form" method="post" action="{$_layoutParams.root}salida/">
    <fieldset>
        <legend>Mesa de Salida de Personal</legend>
        <p><img class="icon-calendar" src="{$_layoutParams.root}views/layout/twb/img/calendar-icon_1.png" /> Buscar por rango de fecha <strong>(dd-mm-aaaa)</strong></p>    
        <input type="hidden" name="buscar" value="1" />
        <div class="input-append">
            <div id="salida-form">    
                
                <input type="text" name="title" placeholder="Ingrese búsqueda…">
                <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
            </div>        
            <div id="fecha-form" class="fecha-form">            
                <input class="form-control input-small" type="text" id="from" name="from" placeholder="Fecha desde...">&nbsp;&nbsp;
                <input class="form-control input-small" type="text" id="to" name="to" placeholder="Fecha hasta..."> 
                <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
            </div>            
        </div>    
    </fieldset>     
    </form>
</div>        
{if isset($result) && count($result)}
<table class="table table-bordered table-condensed table-striped small" id="salida-table">
    <tr>
        <th>Núm Int</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Caracteristica</th>
        <th>Numero</th>
        <th>Año</th>
    </tr>    
    {foreach item=datos from=$result}
        <tr class="id-{$datos.id}">
            <td class="id">{$datos.id}</td>
            <td>{if $datos.fk_estado eq 0}ENTRADA{else}SALIDA{/if}</td>
            <td>{$datos.tipo}</td>                
            <td>{if $datos.exp_caracteristica neq '0'}{$datos.exp_caracteristica}{else}{/if}</td>
            <td> 
                 <a href="javascript:void(0)">{$datos.tipo_num}</a>
            </td>
            <td>{$datos.year}</td>
            <input type="hidden" name="id_tipo_{$datos.fk_id_tipo}" value="{$datos.fk_id_tipo}" />
        </tr>
    {/foreach}          
</table>
{else}
    <p>No se encontraron resultados. Intente otra busqueda.</p>
{/if}      
{$paginacion|default:""}        
        