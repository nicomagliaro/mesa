<!-- Modal -->
<div class="modal fade bs-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog v">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seguimiento Legajos</h4>
      </div>
      <div class="modal-body">
           <div id='titulo'></div>
            <table id="legDetalle" class="table table-striped table-hover small">
                <tr>
                    <th>Entregado</th>
                    <th>Recibido</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                </tr>
            </table>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary nuevo">Agregar Entrada</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>   <!-- Fin Modal -->          
<form class="form-inline" id="search-form" method="post" action="{$_layoutParams.root}legajo/"> 
   <fieldset>
       <legend>Seguimiento de Legajos</legend> 
       <div class="input-append">
            <input type="hidden" name="buscar" value="1" />
            <input type="text" name="title" placeholder="Ingrese búsqueda…">&nbsp;&nbsp;&nbsp;
            <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
       </div> 
   </fieldset>
</form>
{if isset($result) && count($result)}    
<table class="table table-bordered table-condensed table-striped" id="leg">
    <tr>
        <th>Num Legajo</th>
        <th>Apellido</th>
        <th>Nombre</th>   
    </tr>    
    {foreach item=datos from=$result}
        <tr>
            <td>{$datos.legajo}</td>                
            <td>                        
                 <a href="javascript:void(0)">{$datos.apellido}</a>
            </td>
            <td> 
                 <a href="javascript:void(0)">{$datos.nombre}</a>
            </td>
        </tr>
    {/foreach}
{/if}            
</table>

{$paginacion|default:""}



