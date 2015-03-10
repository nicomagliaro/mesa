<?php /* Smarty version Smarty-3.1.8, created on 2014-05-30 12:57:15
         compiled from "/var/www/mesa/views/legajo/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208423325552d6e8a2dba428-24522463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90f15382406060fa652b5b81400267b4fa788aa9' => 
    array (
      0 => '/var/www/mesa/views/legajo/index.tpl',
      1 => 1401465347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208423325552d6e8a2dba428-24522463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d6e8a2e6c251_45585629',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'result' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6e8a2e6c251_45585629')) {function content_52d6e8a2e6c251_45585629($_smarty_tpl) {?><!-- Modal -->
<div class="modal fade bs-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog v">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seguimiento Legajos</h4>
      </div>
      <div class="modal-body">
           <div id='titulo'></div>
            <table id="legDetalle" class="table table-striped table-hover small">
                <tr>
                    <th>Entregado</th>
                    <th>Recibido</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                </tr>
            </table>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary nuevo">Agregar Entrada</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>   <!-- Fin Modal -->          
<form class="form-inline" id="search-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
legajo/"> 
   <fieldset>
       <legend>Seguimiento de Legajos</legend> 
       <div class="input-append">
            <input type="hidden" name="buscar" value="1" />
            <input type="text" name="title" placeholder="Ingrese búsqueda…">&nbsp;&nbsp;&nbsp;
            <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
       </div> 
   </fieldset>
</form>
<?php if (isset($_smarty_tpl->tpl_vars['result']->value)&&count($_smarty_tpl->tpl_vars['result']->value)){?>    
<table class="table table-bordered table-condensed table-striped" id="leg">
    <tr>
        <th>Num Legajo</th>
        <th>Apellido</th>
        <th>Nombre</th>   
    </tr>    
    <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['legajo'];?>
</td>                
            <td>                        
                 <a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['datos']->value['apellido'];?>
</a>
            </td>
            <td> 
                 <a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</a>
            </td>
        </tr>
    <?php } ?>
<?php }?>            
</table>

<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>




<?php }} ?>