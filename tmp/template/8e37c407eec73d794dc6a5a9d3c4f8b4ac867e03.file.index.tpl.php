<?php /* Smarty version Smarty-3.1.8, created on 2014-08-16 10:07:01
         compiled from "/var/www/mesa/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16658823852d45cb646cc74-52144159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e37c407eec73d794dc6a5a9d3c4f8b4ac867e03' => 
    array (
      0 => '/var/www/mesa/views/index/index.tpl',
      1 => 1408194418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16658823852d45cb646cc74-52144159',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d45cb646ec67_15865963',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d45cb646ec67_15865963')) {function content_52d45cb646ec67_15865963($_smarty_tpl) {?><!-- Modal -->
<div id="indexModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Sistema de Personal</h3>
</div>
<div class="modal-body">
<p>Seguimiento de Legajos y Mesa de Entradas y Salidas</p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>
    
Mesa de Entradas - Dirección de Personal
<BR>
<h3>Sistema de Personal</h3>
<?php echo print_r($_SESSION);?>



   <?php }} ?>