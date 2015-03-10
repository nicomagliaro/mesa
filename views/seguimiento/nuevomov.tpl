<form id="nuevomov" method="post" action="{$_layoutParams.root}seguimiento/inSeg">
    <input type="hidden" name="guardar" value="1" />
    <input type="hidden" name="tipo" value="{$params.tipo}" />
    <input type="hidden" name="num" value="{$params.num}" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Recibido: </td>
            <td><input type="texto" name="recibido" value="{$form.0.remitido|default:""}" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr>   
        <tr>
            <td style="text-align: right;">Referente a: </td>
            <td><input type="texto" name="referente" value="{$form.0.referente|default:""}" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr> 
        <tr>
            <td style="text-align: right;">Observaciones: </td>
            <td><textarea name="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" >{$datos.observacion|default:""}</textarea></td>
        </tr> 
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form>