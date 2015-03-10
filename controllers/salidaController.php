<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salidaController
 *
 * @author nico
 */
class salidaController extends Controller {
    //put your code here
    //put your code here
    private $_salida;
    private $_from;
    private $_to;
    
    public function __construct() {
        parent::__construct();
        
        if(!Session::get('autenticado')){
            $this->redireccionar('error/access/5050');
        }
        $this->_salida = $this->loadModel('salida');
    }
    
    public function index($pagina = false) 
    {
        if($this->getParam('buscar') == 1){
            
            if($this->getParam('title'))
            {
                $this->_view->assign('titulo', 'Resultados de Busqueda');
                $this->_view->assign('result', $this->_salida->getSalidaByString($this->getParam('title')));
                //exit;
            }
            if(empty($this->getParam('title'))){
                if((!empty($this->getParam('from')) and !empty($this->getParam('to'))) and (strtotime($this->getParam('from')) < strtotime($this->getParam('to'))))
                {
                    $this->_from = str_replace('/', '-', $this->getParam('from')); 
                    $this->_to = str_replace('/', '-', $this->getParam('to'));
                    $this->_view->assign('titulo', 'Resultados de Busqueda');
                    $this->_view->assign('result', $this->_salida->getSalidaByDate($this->_from, $this->_to));
                   
                }else{
                    $this->_view->assign('_mensaje','El formato de fecha ingresado no es válido');
                }
            }
        }
     
        $this->_view->assign('titulo', 'Mesa de Salida');
        $this->_view->setJs(array('datepicker', 'salida'));
        $this->_view->renderizar('index', 'salida');
        
      
    }
    
    public function procesarSalida() {
        $this->_salida->insertarSalida(
                $this->getParam('tipo'),
                $this->getParam('num'),
                $this->getParam('remitido'),
                $this->getParam('referente'),
                $this->getParam('observacion'),
                Session::get('usuario')                
                );        
        $this->_salida->updateEstadoSalida($this->getParam('num'), 1);
        exit;
    }
        
}
