<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 19:24:37
         compiled from "/var/www/mesa/views/post/ajax/prueba.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162572943552d6e075c75126-44434128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '406fe6588474b892c095df2c13add9d43011c43e' => 
    array (
      0 => '/var/www/mesa/views/post/ajax/prueba.tpl',
      1 => 1352494816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162572943552d6e075c75126-44434128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6e075cc4a66_72945944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6e075cc4a66_72945944')) {function content_52d6e075cc4a66_72945944($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&count($_smarty_tpl->tpl_vars['posts']->value)){?>
    <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Pais</th>
            <th>Ciudad</th>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['pais'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['ciudad'];?>
</td>
            </tr>
        <?php } ?>
    </table>
<?php }else{ ?>

    <p><strong>No hay posts!</strong></p>

<?php }?>

<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
<?php }} ?>