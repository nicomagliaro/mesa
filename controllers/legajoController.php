<?php

class legajoController extends Controller
{
    private $_legajo;
    private $_last_search;


    public function __construct() 
    {
        parent::__construct();
        
        if(!Session::get('autenticado')){
            $this->redireccionar('error/access/5050');
        }
        $this->_legajo = $this->loadModel('legajo');
        $this->_last_search = array();
    }
    
    public function index($pagina = false, $check = false)
    {         
        $paginador = new Paginador();
        
        if(!$this->filtrarInt($pagina)){
           $pagina = false;
        }
        else{
           $pagina = (int) $pagina;
        }
        
        if(!$this->filtrarInt($check)){
           $check = null;
        }
        else{
           $check = (int) $check;
        }
        
        # Esta comprobacion verifica que este activado el campo oculto del formulario de búsqueda 
        # y si se esta mandando la comprobacion GET de la paginacion
        
        if(isset($check))
        {                
            $this->_view->assign('ultima', Session::get('ultima_busqueda'));
            $this->_view->assign('result', $paginador->paginar(Session::get('ultima_busqueda'), $pagina));
            $this->_view->assign('paginacion', $paginador->getView('prueba', 'legajo/index'));
            $this->_view->setJs(array('ajax'));
            $this->_view->assign('titulo', 'Legajo');
                
        }else{
        
            if($this->getInt('buscar') == 1)
            {            
                if(!$this->getTexto('title')){
                    $this->_view->assign('_error','Por favor utilice un motivo de busqueda');
                    $this->_view->render('index', 'busqueda');
                    exit;
                }else{
                    Session::destroy('ultima_busqueda');
                    Session::setLastSearch('ultima_busqueda',$this->_legajo->get_search_legajos($this->getParam('title')));
                    $this->_view->assign('result', $paginador->paginar($this->_legajo->get_search_legajos($this->getParam('title'))));
                    $this->_view->assign('paginacion', $paginador->getView('prueba', 'legajo/index'));
                    $this->_view->setJs(array('ajax'));
                    $this->_view->assign('titulo', 'Legajo');

                }            

            }
        }
        
        $this->_view->assign('titulo', 'Legajo');
        $this->_view->renderizar('index', 'legajo');
    }
    
    public function nuevo($id='')
    {        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getTexto('remite')){
                $this->_view->assign('_error', 'Debe introducir un remitente');
                $this->_view->renderizar('nuevo', 'legajo');
                exit;
            }
            
            if(!$this->getTexto('recibe')){
                $this->_view->assign('_error', 'Debe introducir un receptor');
                $this->_view->renderizar('nuevo', 'legajo');
                exit;
            }
               
            if(!$this->getTexto('estado')){
                $this->_view->assign('_error', 'Debe introducir un motivo');
                $this->_view->renderizar('nuevo', 'legajo');
                exit;
            }
                
            $this->_legajo->insertarLegajo(
                    $this->getParam('remite'),
                    $this->getParam('recibe'),
                    $this->getParam('legajo'),
                    $this->getParam('destino'),
                    $this->getParam('estado'),
                    Session::get('usuario'),
                    $this->getParam('observacion')
                    );
                      
            $this->redireccionar('legajo');            
            
        }       
        $this->_acl->acceso('nuevo_post');        
        $this->_view->assign('titulo', 'Nuevo Legajo');
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('estado', $this->_legajo->getEstado());
        $this->_view->assign('destino', $this->_legajo->getDestino());
        $this->_view->assign('agente', $this->_legajo->getLegajo($id));
        $this->_view->assign('form', $this->_legajo->getLegData($id));
        $this->_view->renderizar('nuevo', 'legajo');
    }
    
    public function editar($id)
    {
        $this->_acl->acceso('editar_post');
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('legajo');
        }
        
        if(!$this->_legajo->getLegajo($this->filtrarInt($id))){
            $this->redireccionar('legajo');
        }
        
        $this->_view->assign('titulo', 'Editar Legajo');
        $this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getTexto('titulo')){
                $this->_view->assign('_error', 'Debe introducir el titulo del post');
                $this->_view->renderizar('editar', 'legajo');
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){
                $this->_view->assign('_error', 'Debe introducir el cuerpo del post');
                $this->_view->renderizar('editar', 'legajo');
                exit;
            }
            
            $this->_legajo->editarLegajo(
                    $this->filtrarInt($id),
                    $this->getLegajoParam('titulo'),
                    $this->getLegajoParam('cuerpo')
                    );
            
            $this->redireccionar('legajo');
        }
        
        $this->_view->assign('datos', $this->_legajo->getLegajo($this->filtrarInt($id)));
        $this->_view->renderizar('editar', 'legajo');
    }
    
    public function eliminar($id)
    {
        $this->_acl->acceso('eliminar_post');
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('legajo');
        }
        
        if(!$this->_legajo->getLegajo($this->filtrarInt($id))){
            $this->redireccionar('legajo');
        }
        
        $this->_legajo->eliminarLegajo($this->filtrarInt($id));
        $this->redireccionar('legajo');
    }

   public function verDetalle()            
   { 
       echo json_encode($this->_legajo->getDetalle($_POST['leg']));
   }
    
}

?>
