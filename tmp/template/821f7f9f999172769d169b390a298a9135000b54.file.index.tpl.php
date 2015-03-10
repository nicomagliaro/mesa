<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 18:48:23
         compiled from "/var/www/mesa/views/acl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26248654652d6d7f7cd9837-12118267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '821f7f9f999172769d169b390a298a9135000b54' => 
    array (
      0 => '/var/www/mesa/views/acl/index.tpl',
      1 => 1352151370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26248654652d6d7f7cd9837-12118267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6d7f7cfdfa2_61964259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6d7f7cfdfa2_61964259')) {function content_52d6d7f7cfdfa2_61964259($_smarty_tpl) {?><h2>Listas de control de acceso</h2>

<ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a></li>
</ul><?php }} ?>