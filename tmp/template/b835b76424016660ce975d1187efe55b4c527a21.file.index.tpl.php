<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 12:55:58
         compiled from "/var/www/mesa/views/salida/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17443358595303ab5e89f8d3-29013535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b835b76424016660ce975d1187efe55b4c527a21' => 
    array (
      0 => '/var/www/mesa/views/salida/index.tpl',
      1 => 1395933270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17443358595303ab5e89f8d3-29013535',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5303ab5e8b3982_10760212',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'result' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5303ab5e8b3982_10760212')) {function content_5303ab5e8b3982_10760212($_smarty_tpl) {?><!-- Modal -->
<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog v">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Salida</h4>
      </div>
      <div class="modal-body">
           <div id='titulo'></div>   
           <form id="form-salida" method="POST">
            <table class="table table-bordered" style="width: 350px;">   
                <tr>
                    <td style="text-align: right;">Remitido: </td>
                    <td><input type="texto" name="remitido" value="" id="remitido" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
                </tr> 
                <tr>
                    <td style="text-align: right;">Referente a: </td>
                    <td><input type="texto" name="referente" value=""  id="referente" onkeyup="javascript:this.value=this.value.toUpperCase()" /></td>
                </tr> 
                <tr>
                    <td style="text-align: right;">Observaciones: </td>
                    <td><textarea name="observacion" id="observacion" onkeyup="javascript:this.value=this.value.toUpperCase()" ></textarea></td>
                </tr> 
            </table>   
            <p><button class="btn btn-primary" id="send"><i class="icon-ok icon-white"> </i> Guardar </button></p>    
           </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div>
    <form class="form-inline"  id="search-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
salida/">
    <fieldset>
        <legend>Mesa de Salida de Personal</legend>
        <p><img class="icon-calendar" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/twb/img/calendar-icon_1.png" /> Buscar por rango de fecha <strong>(dd-mm-aaaa)</strong></p>    
        <input type="hidden" name="buscar" value="1" />
        <div class="input-append">
            <div id="salida-form">    
                
                <input type="text" name="title" placeholder="Ingrese búsqueda…">
                <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
            </div>        
            <div id="fecha-form" class="fecha-form">            
                <input class="form-control input-small" type="text" id="from" name="from" placeholder="Fecha desde...">&nbsp;&nbsp;
                <input class="form-control input-small" type="text" id="to" name="to" placeholder="Fecha hasta..."> 
                <button class="btn btn-medium btn-primary"><i class="icon-search"> </i> Buscar </button>
            </div>            
        </div>    
    </fieldset>     
    </form>
</div>        
<?php if (isset($_smarty_tpl->tpl_vars['result']->value)&&count($_smarty_tpl->tpl_vars['result']->value)){?>
<table class="table table-bordered table-condensed table-striped small" id="salida-table">
    <tr>
        <th>Núm Int</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Caracteristica</th>
        <th>Numero</th>
        <th>Año</th>
    </tr>    
    <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
        <tr class="id-<?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
">
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
            <input type="hidden" name="id_tipo_<?php echo $_smarty_tpl->tpl_vars['datos']->value['fk_id_tipo'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['fk_id_tipo'];?>
" />
        </tr>
    <?php } ?>          
</table>
<?php }else{ ?>
    <p>No se encontraron resultados. Intente otra busqueda.</p>
<?php }?>      
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
        
        <?php }} ?>