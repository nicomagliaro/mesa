<?php

class menuModelWidget extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getMenu($menu)            
    {
        $menus['sidebar'] = array(
            array(
                'id' => 'usuarios',
                'titulo' => 'Usuarios',
                'enlace' => BASE_URL . 'usuarios',
                'imagen' => 'icon-user'
                ),
            array(
                'id' => 'registro',
                'titulo' => 'Registro',
                'enlace' => BASE_URL . 'usuarios/registro',
                'imagen' => 'icon-user'
                ),
            
            array(
                'id' => 'acl',
                'titulo' => 'Listas de control de acceso',
                'enlace' => BASE_URL . 'acl',
                'imagen' => 'icon-list-alt'
                )
            
            /*array(
                'id' => 'ajax',
                'titulo' => 'Ejemplo uso de AJAX',
                'enlace' => BASE_URL . 'ajax',
                'imagen' => 'icon-refresh'
                ),
            
            array(
                'id' => 'prueba',
                'titulo' => 'Prueba paginaci&oacute;n',
                'enlace' => BASE_URL . 'post/prueba',
                'imagen' => 'icon-random'
                ),
            
            array(
                'id' => 'pdf',
                'titulo' => 'Documento PDF 1',
                'enlace' => BASE_URL . 'pdf/pdf1/param1/param2',
                'imagen' => 'icon-file'
                ),
            
            array(
                'id' => 'pdf',
                'titulo' => 'Documento PDF 2',
                'enlace' => BASE_URL . 'pdf/pdf2/param1/param2',
                'imagen' => 'icon-file'
                )*/
        );
        
        
        $menus['top'] = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL,
                'imagen' => 'icon-home'
                ),                      
            
            array(
                'id' => 'reportes',
                'titulo' => 'Reportes',
                'enlace' => BASE_URL . 'reportes/index/reportes',
                'imagen' => 'icon-flag'
                )
        );
        
        if( Session::get('level') == 1 || Session::get('level') == 5 ){
            $menus['top'][2] = array(
                'id' => 'legajos',
                'titulo' => 'Legajos',
                'enlace' => BASE_URL . 'legajo',
                'imagen' => 'icon-flag'
            );  
        }
        
        if( Session::get('level') == 1 || Session::get('level') == 6 ){
            $menus['top'][3] = array(
                'id' => 'entrada',
                'titulo' => 'Entrada',
                'enlace' => BASE_URL . 'seguimiento',
                'imagen' => 'icon-flag'
                );
        }
        
        if( Session::get('level') == 1 || Session::get('level') == 6 ){
            $menus['top'][4] = array(
                'id' => 'salida',
                'titulo' => 'Salida',
                'enlace' => BASE_URL . 'salida',
                'imagen' => 'icon-flag'
                );
        }
        
        if(!Session::get('autenticado')){
            $menus['top'][] = array(
                'id' => 'registro',
                'titulo' => 'Registro',
                'enlace' => BASE_URL . 'usuarios/registro',
                'imagen' => 'icon-book'
                );
        }
        
        return $menus[$menu];
    }
}

?>