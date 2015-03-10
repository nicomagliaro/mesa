<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 20:37:56
         compiled from "/var/www/mesa/views/acl/nuevo_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8180644252d6f1a47516f0-40619348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '718d4efb6644af1798c3884f0830da85bf5d1290' => 
    array (
      0 => '/var/www/mesa/views/acl/nuevo_permiso.tpl',
      1 => 1352213364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8180644252d6f1a47516f0-40619348',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6f1a4777731_43458737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6f1a4777731_43458737')) {function content_52d6f1a4777731_43458737($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Nuevo Permiso</h2>

<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1">
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Permiso: </td>
            <td><input type="text" name="permiso" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['permiso'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>

        <tr>
            <td style="text-align: right;">Key: </td>
            <td><input type="text" name="key" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['key'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Guardar</button></p>
</form><?php }} ?>