<?php /* Smarty version Smarty-3.1.8, created on 2014-05-27 13:55:17
         compiled from "/var/www/mesa/views/acl/nuevo_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2314230335384c375ad6625-02525873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1713155d065ab7b851562a93223fcae31b8e0d3c' => 
    array (
      0 => '/var/www/mesa/views/acl/nuevo_role.tpl',
      1 => 1352213198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2314230335384c375ad6625-02525873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5384c375c70396_42709538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5384c375c70396_42709538')) {function content_5384c375c70396_42709538($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Nuevo Role</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="guardar">
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Role: </td>
            <td><input type="text" name="role" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['role'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Guardar</button></p>
</form><?php }} ?>