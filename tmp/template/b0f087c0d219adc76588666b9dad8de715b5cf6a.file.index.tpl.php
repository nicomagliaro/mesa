<?php /* Smarty version Smarty-3.1.8, created on 2014-03-31 16:38:50
         compiled from "/var/www/mesa/views/seguimiento/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137191358452f92a585e5668-08907035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0f087c0d219adc76588666b9dad8de715b5cf6a' => 
    array (
      0 => '/var/www/mesa/views/seguimiento/index.tpl',
      1 => 1396294718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137191358452f92a585e5668-08907035',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52f92a586e2602_35050080',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'busqueda' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f92a586e2602_35050080')) {function content_52f92a586e2602_35050080($_smarty_tpl) {?><!-- Modal -->
<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog v">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seguimiento</h4>
      </div>
      <div class="modal-body">
           <div id='titulo'></div>
            <table id="tableDetalle" class="table table-striped table-hover small">
                <tr>
                    <th>Recibido</th>
                    <th>Remitido</th>
                    <th>Referente</th>
                    <th>Observaciones</th>
                    <th>Fecha de mov</th>
                    <th>Estado</th>
                </tr>
            </table>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary redirect">Agregar Entrada</button>
      </div>
    </div>
  </div>
</div>

<form class="form-inline" id="search-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
seguimiento/"> 
    <fieldset>
        <legend>Mesa de Entradas de Personal</legend>
    <p><img class="icon-calendar" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/twb/img/calendar-icon_1.png" /> Buscar por rango de fecha <strong>(dd-mm-aaaa)</strong></p>        
    <input type="hidden" name="buscar" value="1" />
    <div class="input-append">
        <div id="salida-form2">   
            <input type="text" name="title" placeholder="Ingrese búsqueda…">
            <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
        </div>        
        <div id="fecha-form2" class="fecha-form">            
            <input class="form-control input-small" type="text" id="from" name="from" placeholder="Fecha desde...">&nbsp;&nbsp;
            <input class="form-control input-small" type="text" id="to" name="to" placeholder="Fecha hasta..."> 
            <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
        </div>            
    </div> 
    </fieldset>   
</form>   
<div class="btn-group" data-toggle="buttons-radio">
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
seguimiento/nuevo"><button type="button" class="btn btn-primary">Nuevo</button></a>
    <!--<button type="button" class="btn btn-primary">Editar</button>
    <button type="button" class="btn btn-primary">Eliminar</button>-->
   
</div><br>  

<?php if (isset($_smarty_tpl->tpl_vars['busqueda']->value)&&count($_smarty_tpl->tpl_vars['busqueda']->value)){?>
<table class="table table-bordered table-condensed table-striped small" id="detalle">
    <tr>
        <th>Núm Int</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Caracteristica</th>
        <th>Numero</th>
        <th>Año</th>
    </tr>    
    <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['busqueda']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
        <tr>
            <td class="id"><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['datos']->value['fk_estado']==0){?>ENTRADA<?php }else{ ?>SALIDA<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
</td>                
            <td><?php if ($_smarty_tpl->tpl_vars['datos']->value['exp_caracteristica']!='0'){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['exp_caracteristica'];?>
<?php }else{ ?><?php }?></td>
            <td> 
                 <a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo_num'];?>
</a>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['year'];?>
</td>
        </tr>
    <?php } ?>          
</table>
<?php }else{ ?>
    <p>No se encontraron resultados. Intente otra busqueda.</p>    
<?php }?>      
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
 <?php }} ?>