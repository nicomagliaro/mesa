<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 21:53:24
         compiled from "/var/www/mesa/modules/usuarios/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104519448252d703543a8237-91103684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0bb76cc9f8da0e0a8f403b4c0518283e857d540' => 
    array (
      0 => '/var/www/mesa/modules/usuarios/views/index/index.tpl',
      1 => 1352118068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104519448252d703543a8237-91103684',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarios' => 0,
    'us' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d703543de316_69826047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d703543de316_69826047')) {function content_52d703543de316_69826047($_smarty_tpl) {?><h2>Usuarios</h2>

<?php if (isset($_smarty_tpl->tpl_vars['usuarios']->value)&&count($_smarty_tpl->tpl_vars['usuarios']->value)){?>
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Role</th>
            <th></th>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['us'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['us']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['us']->key => $_smarty_tpl->tpl_vars['us']->value){
$_smarty_tpl->tpl_vars['us']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['us']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['us']->value['usuario'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['us']->value['role'];?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/index/permisos/<?php echo $_smarty_tpl->tpl_vars['us']->value['id'];?>
">
                   Permisos
                </a>
            </td>
        </tr>
            
        <?php } ?>
    </table>
<?php }?><?php }} ?>