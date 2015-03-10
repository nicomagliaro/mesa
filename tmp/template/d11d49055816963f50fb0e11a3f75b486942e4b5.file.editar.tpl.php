<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 17:41:42
         compiled from "/var/www/mesa/views/post/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159972369452d6c856026ef2-92343015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd11d49055816963f50fb0e11a3f75b486942e4b5' => 
    array (
      0 => '/var/www/mesa/views/post/editar.tpl',
      1 => 1352152018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159972369452d6c856026ef2-92343015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6c85605d546_56156190',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6c85605d546_56156190')) {function content_52d6c85605d546_56156190($_smarty_tpl) {?><form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Titulo: </td>
            <td><input type="text" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
    
        <tr>
            <td style="text-align: right;">Cuerpo: </td>
            <td><textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr>
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form><?php }} ?>