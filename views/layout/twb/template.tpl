<!DOCTYPE html>
<html lang="es">
    <head>
        <title>{$titulo|default:"Sin t&iacute;tulo"}</title>
        <meta charset="utf-8">
        <link href="{$_layoutParams.ruta_css}bootstrap.css" rel="stylesheet" type="text/css">
        <link href="{$_layoutParams.root}public/css/redmond/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        body{
            padding-top: 40px;
            padding-bottom: 40px;            
        }
        </style>
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
            {foreach item=css from=$_layoutParams.css}
        <link rel="stylesheet" type="text/css" href="{$css}" media="screen" />
            {/foreach}
        {/if}
        
        <link rel="icon" type="image/png" href="{$_layoutParams.root}public/img/icon.png">
    </head>
    
    <body>
        {if isset($widgets.top)}
            {foreach from=$widgets.top item=tp}
                {$tp}
            {/foreach}
        {/if}
                
        <div style="background: #515151; height: 110px; margin-bottom: 20px; width: 100%;">
            <div class="container">
                <div class="span4" style="height:110px; background: url('{$_layoutParams.ruta_img}logo.png') no-repeat center left"></div>
                <div class="span7"><h2 style="color: #fff; margin-top: 32px;">{$_layoutParams.configs.app_slogan}</h2></div>
            </div>
        </div>
        
        <div class="container" style="background: #fff;">
            <div class="span8">
                <noscript><p>Para el correcto funcionamiento debe tener el soporte para javascript habilitado</p></noscript>
                    
                {if isset($_error)}
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_error}
                    </div>
                {/if}

                {if isset($_mensaje)}
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_mensaje}
                    </div>
                {/if}

                {include file=$_contenido}
            </div>
            
            <div class="span3">
                {if isset($widgets.sidebar)}
                    {foreach from=$widgets.sidebar item=wd}
                        {$wd}
                    {/foreach}
                {/if}
            </div>
        </div>
        
        <!-- Footer -->
        <div class="navbar navbar-fixed-bottom">
            <div class="navbar-inner">
                <div class="container">
                    <div style="margin-top: 10px; text-align: left">Version: 1.0 <a href="#" target="_blank">Desarrollado por #### &COPY;{date('Y')}</a></div>
                </div>
            </div>
        </div>
            
        <!-- javascript -->
        
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.js"></script>
        <script type="text/javascript">
            var _root_ = '{$_layoutParams.root}';
        </script>
        
        {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
            {foreach item=plg from=$_layoutParams.js_plugin}
        <script src="{$plg}" type="text/javascript"></script>
            {/foreach}
        {/if}
        
        {if isset($_layoutParams.js) && count($_layoutParams.js)}
            {foreach item=js from=$_layoutParams.js}
        <script src="{$js}" type="text/javascript"></script>
            {/foreach}
        {/if}       
        <script src="http://localhost/mesa/public/js/scripty.js" type="text/javascript"></script>
    </body>
</html>