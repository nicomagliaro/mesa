<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 20:00:07
         compiled from "/var/www/mesa/views/error/access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81496995852d6e8c71624c1-35201846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43dca15aae87735301ae65f6fc7c25f23933ce9d' => 
    array (
      0 => '/var/www/mesa/views/error/access.tpl',
      1 => 1335208334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81496995852d6e8c71624c1-35201846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6e8c7197f89_01792907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6e8c7197f89_01792907')) {function content_52d6e8c7197f89_01792907($_smarty_tpl) {?><h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>