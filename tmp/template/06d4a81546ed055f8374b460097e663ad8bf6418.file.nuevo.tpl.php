<?php /* Smarty version Smarty-3.1.8, created on 2014-05-22 19:18:42
         compiled from "/var/www/mesa/views/legajo/nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171039045252d6f874658831-16054111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06d4a81546ed055f8374b460097e663ad8bf6418' => 
    array (
      0 => '/var/www/mesa/views/legajo/nuevo.tpl',
      1 => 1400793849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171039045252d6f874658831-16054111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6f874676ab8_09526582',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'agente' => 0,
    'form' => 0,
    'estado' => 0,
    'e' => 0,
    'destino' => 0,
    'd' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6f874676ab8_09526582')) {function content_52d6f874676ab8_09526582($_smarty_tpl) {?><form id="leg-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
legajo/nuevo">
    <input type="hidden" name="guardar" value="1" />
    <input type="hidden" name="legajo" value="<?php echo $_smarty_tpl->tpl_vars['agente']->value['legajo'];?>
" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Remite: </td>
            <td><input type="texto" name="remite" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value[0]['recibido'])===null||$tmp==='' ? '' : $tmp);?>
" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr>    
        <tr>
            <td style="text-align: right;">Recibe: </td>
            <td><input type="texto" name="recibe" value="" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Estado: </td>
            <td>
                <select name="estado">
                    <?php if (count($_smarty_tpl->tpl_vars['estado']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estado']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
                            <option <?php if (count($_smarty_tpl->tpl_vars['form']->value)){?><?php if ($_smarty_tpl->tpl_vars['e']->value['estado']==$_smarty_tpl->tpl_vars['form']->value[0]['estado']){?> selected="selected" <?php }else{ ?> <?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['e']->value['estado'];?>
</option>
                        <?php } ?>
                    <?php }else{ ?>
                            <option>No existe registro</option>
                    <?php }?>                    
                </select>
            </td>    
        </tr>
        <tr>
            <td style="text-align: right;">Destinos: </td>
            <td>
                <select name="destino">
                    <?php if (count($_smarty_tpl->tpl_vars['destino']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['destino']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                            <option <?php if (count($_smarty_tpl->tpl_vars['form']->value)){?><?php if ($_smarty_tpl->tpl_vars['d']->value['destinos']==$_smarty_tpl->tpl_vars['form']->value[0]['destinos']){?> selected="selected" <?php }else{ ?> <?php }?><?php }?> value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_destinos'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['destinos'];?>
</option>
                        <?php } ?>
                    <?php }else{ ?>
                            <option>No existe registro</option>
                    <?php }?>                    
                </select>
            </td>    
        </tr>
        <tr>
            <td style="text-align: right;">Observacion: </td>
            <td><textarea name="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observacion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr>    
    </table>
        
    <p> 
        <button class="btn btn-primary"> <i class="icon-ok icon-white"> </i> Guardar</button>
        
    </p>
</form>
<button id="volver" class="btn btn-primary"> <i class="icon-white"> </i> Volver</button>       
     
        
        <?php }} ?>