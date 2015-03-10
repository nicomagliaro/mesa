<?php

class indexController extends Controller
{    
    public function __construct() {
        parent::__construct();        
    }
    
    public function index()
    {
        //print_r($this->_view->getLayoutPositions());
        $this->_view->assign('titulo', 'Sistema de Personal');
        //$this->_view->assign('session', $_SESSION);
        //$this->_view->assign('widget', $this->_view->widget('menu', 'getMenu'));
        $this->_view->renderizar('index', 'inicio');
        $this->logg(1,1,false,false,false,5555);
        
    }

}

?>