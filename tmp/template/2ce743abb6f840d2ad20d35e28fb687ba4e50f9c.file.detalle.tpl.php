<?php /* Smarty version Smarty-3.1.8, created on 2014-01-23 19:08:39
         compiled from "/var/www/mesa/views/legajo/detalle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42258557952d9aa47eaea78-94842371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ce743abb6f840d2ad20d35e28fb687ba4e50f9c' => 
    array (
      0 => '/var/www/mesa/views/legajo/detalle.tpl',
      1 => 1390514914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42258557952d9aa47eaea78-94842371',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d9aa48004a45_84099804',
  'variables' => 
  array (
    'detalle' => 0,
    '_acl' => 0,
    '_layoutParams' => 0,
    'detalles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d9aa48004a45_84099804')) {function content_52d9aa48004a45_84099804($_smarty_tpl) {?><h4>Detalle de Legajos</h4>
<h5>AGENTE: <?php echo $_smarty_tpl->tpl_vars['detalle']->value[0]['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['detalle']->value[0]['apellido'];?>
 - LEG: <?php echo $_smarty_tpl->tpl_vars['detalle']->value[0]['legajo'];?>
</h5>
<p>
    <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('nuevo_post')){?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
legajo/nuevo/<?php echo $_smarty_tpl->tpl_vars['detalle']->value[0]['legajo'];?>
" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar </a>
    <?php }?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pdf/printDetalle/<?php echo $_smarty_tpl->tpl_vars['detalle']->value[0]['nombre'];?>
" class="btn btn-primary"><i class="icon-print icon-white"> </i> Imprimir </a>
</p>
<table class="table table-bordered table-condensed table-striped">
    <tr>
        <th>Entregado</th>
        <th>Recibido</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Observaciones</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['detalles'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['detalles']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['detalle']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['detalles']->key => $_smarty_tpl->tpl_vars['detalles']->value){
$_smarty_tpl->tpl_vars['detalles']->_loop = true;
?>
     
        <tr>            
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['detalles']->value['entregado'])===null||$tmp==='' ? "No" : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['detalles']->value['recibido'])===null||$tmp==='' ? "No" : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['detalles']->value['estado'])===null||$tmp==='' ? "No" : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['detalles']->value['date'])===null||$tmp==='' ? "No" : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['detalles']->value['detalle'])===null||$tmp==='' ? "No" : $tmp);?>
</td>
        </tr>
     <?php } ?>   
</table>
<?php }} ?>