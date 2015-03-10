<?php /* Smarty version Smarty-3.1.8, created on 2014-02-28 17:37:05
         compiled from "/var/www/mesa/views/seguimiento/nuevomov.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102224688252fbcd7d9d3717-74215304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76b28c6bbeedb4d04407ce680075cdc4903ac65d' => 
    array (
      0 => '/var/www/mesa/views/seguimiento/nuevomov.tpl',
      1 => 1393619816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102224688252fbcd7d9d3717-74215304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52fbcd7da43437_49081986',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'params' => 0,
    'form' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fbcd7da43437_49081986')) {function content_52fbcd7da43437_49081986($_smarty_tpl) {?><form id="nuevomov" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
seguimiento/inSeg">
    <input type="hidden" name="guardar" value="1" />
    <input type="hidden" name="tipo" value="<?php echo $_smarty_tpl->tpl_vars['params']->value['tipo'];?>
" />
    <input type="hidden" name="num" value="<?php echo $_smarty_tpl->tpl_vars['params']->value['num'];?>
" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Recibido: </td>
            <td><input type="texto" name="recibido" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value[0]['remitido'])===null||$tmp==='' ? '' : $tmp);?>
" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr>   
        <tr>
            <td style="text-align: right;">Referente a: </td>
            <td><input type="texto" name="referente" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value[0]['referente'])===null||$tmp==='' ? '' : $tmp);?>
" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
        </tr> 
        <tr>
            <td style="text-align: right;">Observaciones: </td>
            <td><textarea name="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observacion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr> 
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form><?php }} ?>