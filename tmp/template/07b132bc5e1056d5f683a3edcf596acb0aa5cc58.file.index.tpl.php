<?php /* Smarty version Smarty-3.1.8, created on 2014-01-15 17:41:19
         compiled from "/var/www/mesa/modules/usuarios/views/registro/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149252514152d6c83fc207f6-58446040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07b132bc5e1056d5f683a3edcf596acb0aa5cc58' => 
    array (
      0 => '/var/www/mesa/modules/usuarios/views/registro/index.tpl',
      1 => 1352115322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149252514152d6c83fc207f6-58446040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6c83fc36d87_11356879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6c83fc36d87_11356879')) {function content_52d6c83fc36d87_11356879($_smarty_tpl) {?><h2>Registro</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="enviar" />

        <p>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Usuario: </label>
            <input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Email: </label>
            <input type="text" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Password: </label>
            <input type="password" name="pass" />
        </p>

        <p>
            <label>Confirmar: </label>
            <input type="password" name="confirmar" />
        </p>    

        <p>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </p>
    </form>
</div><?php }} ?>