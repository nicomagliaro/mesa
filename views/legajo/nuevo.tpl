<form id="leg-form" method="post" action="{$_layoutParams.root}legajo/nuevo">
    <input type="hidden" name="guardar" value="1" />
    <input type="hidden" name="legajo" value="{$agente.legajo}" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Remite: </td>
            <td><input type="texto" name="remite" value="{$form.0.recibido|default:""}" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr>    
        <tr>
            <td style="text-align: right;">Recibe: </td>
            <td><input type="texto" name="recibe" value="" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Estado: </td>
            <td>
                <select name="estado">
                    {if count($estado)}
                        {foreach item=e from=$estado}
                            <option {if count($form)}{if $e.estado == $form.0.estado} selected="selected" {else} {/if}{/if}>{$e.estado}</option>
                        {/foreach}
                    {else}
                            <option>No existe registro</option>
                    {/if}                    
                </select>
            </td>    
        </tr>
        <tr>
            <td style="text-align: right;">Destinos: </td>
            <td>
                <select name="destino">
                    {if count($destino)}
                        {foreach item=d from=$destino}
                            <option {if count($form)}{if $d.destinos == $form.0.destinos} selected="selected" {else} {/if}{/if} value="{$d.id_destinos}">{$d.destinos}</option>
                        {/foreach}
                    {else}
                            <option>No existe registro</option>
                    {/if}                    
                </select>
            </td>    
        </tr>
        <tr>
            <td style="text-align: right;">Observacion: </td>
            <td><textarea name="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" >{$datos.observacion|default:""}</textarea></td>
        </tr>    
    </table>
        
    <p> 
        <button class="btn btn-primary"> <i class="icon-ok icon-white"> </i> Guardar</button>
        
    </p>
</form>
<button id="volver" class="btn btn-primary"> <i class="icon-white"> </i> Volver</button>       
     
        
        