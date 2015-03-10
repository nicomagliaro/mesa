<?php /* Smarty version Smarty-3.1.8, created on 2014-01-16 19:46:21
         compiled from "/var/www/mesa/views/legajo/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14871010052d6f868358bb5-45110121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3002dbe582a0e12919212766ce14f14decd6b829' => 
    array (
      0 => '/var/www/mesa/views/legajo/editar.tpl',
      1 => 1389912352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14871010052d6f868358bb5-45110121',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6f868377355_81685297',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6f868377355_81685297')) {function content_52d6f868377355_81685297($_smarty_tpl) {?><form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Remite: </td>
            <td><input type="text" name="remite" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['entregado'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Recibe: </td>
            <td><input type="text" name="recibe" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['recibido'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Legajo: </td>
            <td><input type="text" name="legajo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['leg'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Nombre: </td>
            <td><input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['agente'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Motivo: </td>
            <td><input type="text" name="motivo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['motivo'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Observacion: </td>
            <td><textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['detalle'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr>
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form><?php }} ?>