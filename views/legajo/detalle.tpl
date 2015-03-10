<h4>Detalle de Legajos</h4>
<h5>AGENTE: {$detalle.0.nombre} {$detalle.0.apellido} - LEG: {$detalle.0.legajo}</h5>
<p>
    {if $_acl->permiso('nuevo_post')}
        <a href="{$_layoutParams.root}legajo/nuevo/{$detalle.0.legajo}" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar </a>
    {/if}
    <a href="{$_layoutParams.root}pdf/printDetalle/{$detalle.0.nombre}" class="btn btn-primary"><i class="icon-print icon-white"> </i> Imprimir </a>
</p>
<table class="table table-bordered table-condensed table-striped">
    <tr>
        <th>Entregado</th>
        <th>Recibido</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Observaciones</th>
    </tr>
    {foreach item=detalles from=$detalle}
     
        <tr>            
            <td>{$detalles.entregado|default:"No"}</td>
            <td>{$detalles.recibido|default:"No"}</td>
            <td>{$detalles.estado|default:"No"}</td>
            <td>{$detalles.date|default:"No"}</td>
            <td>{$detalles.detalle|default:"No"}</td>
        </tr>
     {/foreach}   
</table>
