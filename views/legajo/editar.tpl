<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Remite: </td>
            <td><input type="text" name="remite" value="{$datos.entregado|default:""}" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Recibe: </td>
            <td><input type="text" name="recibe" value="{$datos.recibido|default:""}" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Legajo: </td>
            <td><input type="text" name="legajo" value="{$datos.leg|default:""}" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Nombre: </td>
            <td><input type="text" name="nombre" value="{$datos.agente|default:""}" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Motivo: </td>
            <td><input type="text" name="motivo" value="{$datos.motivo|default:""}" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Observacion: </td>
            <td><textarea name="observacion">{$datos.detalle|default:""}</textarea></td>
        </tr>
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form>