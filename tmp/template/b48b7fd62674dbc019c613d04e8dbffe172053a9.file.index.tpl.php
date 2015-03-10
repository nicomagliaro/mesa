<?php /* Smarty version Smarty-3.1.8, created on 2014-06-05 17:34:53
         compiled from "/var/www/mesa/modules/reportes/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7358494305314a7dceaf503-93540634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b48b7fd62674dbc019c613d04e8dbffe172053a9' => 
    array (
      0 => '/var/www/mesa/modules/reportes/views/index/index.tpl',
      1 => 1401999270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7358494305314a7dceaf503-93540634',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5314a7dd56c961_62537344',
  'variables' => 
  array (
    'report_list' => 0,
    'repo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5314a7dd56c961_62537344')) {function content_5314a7dd56c961_62537344($_smarty_tpl) {?><form id="reportes" class="form-inline" method="POST">
    <fieldset>
      <legend>Reportes</legend>

      <label>Seleccione un reporte</label>

      <select name="id">
          <?php  $_smarty_tpl->tpl_vars['repo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['report_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repo']->key => $_smarty_tpl->tpl_vars['repo']->value){
$_smarty_tpl->tpl_vars['repo']->_loop = true;
?>
              <?php if ($_smarty_tpl->tpl_vars['repo']->value['status']){?>
      <option id="<?php echo $_smarty_tpl->tpl_vars['repo']->value['reports'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['repo']->value['idreports'];?>
"><?php echo $_smarty_tpl->tpl_vars['repo']->value['idreports'];?>
 - <?php echo $_smarty_tpl->tpl_vars['repo']->value['reports'];?>
</option>
              <?php }?>
          <?php } ?>
      </select><br><br>
      <div id="data">
          <div id="num">
              <input class="form-control input-medium" type="text" name="num" placeholder="Núm Interno"><HR>
          </div>        
          <div id="estado">
              <input class="form-control input-medium" type="text" name="estado" placeholder="Estado" onkeyup="javascript:this.value=this.value.toUpperCase()" ><HR>
          </div>        
          <div id="fecha">
              <input type="text" class="form-control input-medium" id="datepicker" name="fecha" size="30" placeholder="Fecha"><HR>
          </div>        
          <div id="fecha-form" class="fecha-form">            
              <input class="form-control input-small" type="text" id="from" name="from" placeholder="Fecha desde...">&nbsp;&nbsp;
              <input class="form-control input-small" type="text" id="to" name="to" placeholder="Fecha hasta...">                 
          </div>  
      </div>
      <br><br><br>
      <button id="enviarRepo" class="btn btn-medium btn-primary"><i class="icon-search"> </i> Enviar</button>
    </fieldset>
</form>

<?php }} ?>