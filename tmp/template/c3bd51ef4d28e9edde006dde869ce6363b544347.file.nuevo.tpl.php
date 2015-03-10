<?php /* Smarty version Smarty-3.1.8, created on 2014-03-12 18:54:28
         compiled from "/var/www/mesa/views/seguimiento/nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69954038052f947a38b10e0-85919457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3bd51ef4d28e9edde006dde869ce6363b544347' => 
    array (
      0 => '/var/www/mesa/views/seguimiento/nuevo.tpl',
      1 => 1394660567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69954038052f947a38b10e0-85919457',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52f947a39410e6_22029209',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'data1' => 0,
    'e' => 0,
    'datos' => 0,
    'data2' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f947a39410e6_22029209')) {function content_52f947a39410e6_22029209($_smarty_tpl) {?><form id="form2" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
seguimiento/nuevo">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
       <tr>
            <td style="text-align: right;">Tipo: </td>
            <td>
                <select name="tipo">
                    <?php if (count($_smarty_tpl->tpl_vars['data1']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['tipo'];?>
</option>
                        <?php } ?>
                    <?php }else{ ?>
                            <option>No existe registro</option>
                    <?php }?>                    
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
            <td><input type="texto" name="alcance" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['alcance'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Número: </td>
            <td><input type="texto" name="num_ref" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['remite'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
            <tr>
            <td style="text-align: right;">Año: </td>
            <td>
                <select  name="year">
                     <?php if (count($_smarty_tpl->tpl_vars['data2']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                            <option><?php echo $_smarty_tpl->tpl_vars['i']->value['year'];?>
</option>
                        <?php } ?>
                    <?php }else{ ?>
                            <option>No existe registro</option>
                    <?php }?> 
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;">Recibido: </td>
            <td><input type="texto" name="recibido" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['remite'])===null||$tmp==='' ? '' : $tmp);?>
" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr> 
        <tr>
            <td style="text-align: right;">Referente a: </td>
            <td><input type="texto" name="referente" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observacion'])===null||$tmp==='' ? '' : $tmp);?>
" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr> 
        <tr>
            <td style="text-align: right;">Observaciones: </td>
            <td><textarea name="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observacion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr> 
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form>
        <?php }} ?>