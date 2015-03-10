<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 20:00:07
         compiled from "/var/www/mesa/views/post/nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25886745152d6e8c70b3699-88101560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36ff866622f9f9d695059cf9b9ea24aa9c29b101' => 
    array (
      0 => '/var/www/mesa/views/post/nuevo.tpl',
      1 => 1352150412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25886745152d6e8c70b3699-88101560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6e8c712c5e4_84099771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6e8c712c5e4_84099771')) {function content_52d6e8c712c5e4_84099771($_smarty_tpl) {?><form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Titulo: </td>
            <td><input type="texto" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
    
        <tr>
            <td style="text-align: right;">Cuerpo: </td>
            <td><textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr>

        <tr>
            <td colspan="4">
                Imagen: <input type="file" name="imagen" />
            </td>
        </tr>
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form><?php }} ?>