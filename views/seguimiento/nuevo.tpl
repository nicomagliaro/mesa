<form id="form2" method="post" action="{$_layoutParams.root}seguimiento/nuevo">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
       <tr>
            <td style="text-align: right;">Tipo: </td>
            <td>
                <select name="tipo">
                    {if count($data1)}
                        {foreach item=e from=$data1}
                            <option value="{$e.id}">{$e.tipo}</option>
                        {/foreach}
                    {else}
                            <option>No existe registro</option>
                    {/if}                    
                </select>
            </td>    
        </tr>
        <tr id="caracteristica">
            <td style="text-align: right;">Característica: </td>
            <td>
                <select name="caracteristica">
                    <option>21211</option>
                    <option>21200</option>
                </select>
            </td>
        </tr>
        <tr id="alcance">
            <td style="text-align: right;">Alcance: </td>
            <td><input type="texto" name="alcance" value="{$datos.alcance|default:""}" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Número: </td>
            <td><input type="texto" name="num_ref" value="{$datos.remite|default:""}" /></td>
        </tr>
            <tr>
            <td style="text-align: right;">Año: </td>
            <td>
                <select  name="year">
                     {if count($data2)}
                        {foreach item=i from=$data2}
                            <option>{$i.year}</option>
                        {/foreach}
                    {else}
                            <option>No existe registro</option>
                    {/if} 
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;">Recibido: </td>
            <td><input type="texto" name="recibido" value="{$datos.remite|default:""}" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr> 
        <tr>
            <td style="text-align: right;">Referente a: </td>
            <td><input type="texto" name="referente" value="{$datos.observacion|default:""}" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr> 
        <tr>
            <td style="text-align: right;">Observaciones: </td>
            <td><textarea name="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" >{$datos.observacion|default:""}</textarea></td>
        </tr> 
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form>
        