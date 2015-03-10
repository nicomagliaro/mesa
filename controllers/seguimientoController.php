<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seguimientoController
 *
 * @author nico
 */

class seguimientoController extends Controller {
    //put your code here
    private $_seguimiento;
    private $_control;
    
    public function __construct() {
        parent::__construct();
        $this->_seguimiento = $this->loadModel('seguimiento');
        $this->_control = array();
        
        if(!Session::get('autenticado')){
            $this->redireccionar('error/access/5050');
        }
    }
    
    public function index($pagina = false) 
    {
        $paginador = new Paginador();
        
        if(!$this->filtrarInt($pagina)){
           $pagina = false;
        }
        else{
           $pagina = (int) $pagina;
        }
        
        if($this->getInt('buscar') == 1){
            
            if(!empty($this->getParam('title')) and (empty($this->getParam('from')) and empty($this->getParam('to'))))
            {
                $this->_view->assign('busqueda',$paginador->paginar($this->_seguimiento->busquedaInicio($this->getParam('title')), $pagina));
                $this->_view->assign('paginacion', $paginador->getView('prueba', 'seguimiento/index'));
                $this->_view->assign('titulo', 'Resultados de Busqueda');
            }
            elseif (!empty($this->getParam('from')) or !empty($this->getParam('to')))             
            {   
                $this->_from = str_replace('/', '-', $this->getParam('from')); 
                $this->_to = str_replace('/', '-', $this->getParam('to'));
                $this->_view->assign('titulo', 'Resultados de Busqueda');
                $this->_view->assign('busqueda', $this->_seguimiento->getSalidaByDate($this->_from, $this->_to));              
            }else{
                $this->_view->assign('_mensaje', 'No se ha podido completar la búsqueda requerida');
            }
                        
        }   
        $this->_view->assign('titulo', 'Mesa de Entradas');        
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('datepicker'));
        $this->_view->renderizar('index', 'seguimiento');
        
    }
    
    public function nuevo() {
               
        if($this->getInt('guardar') == 1)
        {
            // Se hace una verificacion en la Base para no insertar el mismo acto administrativo, 
            // sino redirige a ese acto administrativo           
            $this->_control = $this->_seguimiento->checkMatch($this->getParam('num_ref'));  
            
            for($i=0; count($this->_control) > $i ;$i++){
                if($this->_control[$i]['tipo_num'] == $this->getParam('num_ref') and $this->_control[$i]['fk_id_tipo'] == $this->getParam('tipo') and $this->_control[$i]['year'] == $this->getParam('year')){
                        $this->_view->assign('titulo', 'Mesa de Entradas');
                        $this->_view->assign('_error', 'Este registro ya existe en la base de datos');
                        //$this->_view->setJs(array('nuevo'));
                        $this->_view->assign('busqueda',$this->_seguimiento->busquedaInicio($this->getParam('num_ref')));
                        //$this->redireccionar('seguimiento');
                        $this->_view->renderizar('index', 'seguimiento');                        
                        exit;
                        
                }        
            }    
            if($this->getParam('tipo') == 3)
            {
                $id = $this->_seguimiento->insertarNuevoSeg(
                        $this->getParam('tipo'),
                        $this->getParam('caracteristica'),
                        $this->getParam('alcance'),
                        $this->getParam('num_ref'), 
                        $this->getParam('year'),
                        Session::get('usuario')
                        );
                
            }else{
                $id = $this->_seguimiento->insertarNuevoSeg(
                       $this->getParam('tipo'),
                       '',
                       '', 
                       $this->getParam('num_ref'), 
                       $this->getParam('year'),
                       Session::get('usuario')
                       );                 
                
            }                      
            $this->_seguimiento->insertarSeg(
                    $this->getParam('tipo'),
                    $id,
                    $this->getParam('recibido'),
                    $this->getParam('referente'),
                    $this->getParam('observacion'),
                    Session::get('usuario')
                    );

            $this->_seguimiento->updateEstadoEntrada($id, 0);

            $this->redireccionar('seguimiento');              
            
        }    
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('nuevo'));
        $this->_view->assign('titulo', 'Nueva Entrada');
        $this->_view->assign('data1', $this->_seguimiento->getData());
        $this->_view->assign('data2', $this->_seguimiento->getYears());
        $this->_view->renderizar('nuevo', 'nuevo');
       
    }
    
    public function editar() {
        ;
    }
    
    public function eliminar() {
        ;
    }
    
    public function verDetalle() {
        echo json_encode($this->_seguimiento->getDetalle($_POST['id']));
    }
    
    public function inSeg($tipo='',$num='') {
        if($this->getInt('guardar') == 1){
            
            $this->_seguimiento->insertarSeg(
                    $this->getParam('tipo'),
                    $this->getParam('num'),
                    $this->getParam('recibido'),
                    $this->getParam('referente'),
                    $this->getParam('observacion'),
                    Session::get('usuario')
                    );
            $this->_seguimiento->updateEstadoEntrada($this->getParam('num'), 0);
            $this->redireccionar('seguimiento');
        }
        $this->_view->assign('form', $this->_seguimiento->getLastInfo($num));
        $this->_view->assign('params', array('tipo' => $tipo, 'num' => $num));
        $this->_view->assign('titulo', 'Ingresar');
        $this->_view->renderizar('nuevomov', 'nuevo');
    }
}
