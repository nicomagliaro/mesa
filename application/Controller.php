<?php

/*
 * -------------------------------------
 * www.dlancedu.com | Jaisiel Delance
 * framework mvc basico
 * Controller.php
 * -------------------------------------
 */

include  LOG_LIB;

abstract class Controller
{
    private $_registry; 
    private $_Log;
    protected $_view;
    protected $_acl;
    protected $_request;
    protected $_ip;
    
    public function __construct() 
    {
        $this->_registry = Registry::getInstancia();
        $this->_acl = $this->_registry->_acl;
        $this->_request = $this->_registry->_request;
        $this->_view = new View($this->_request, $this->_acl); 
        $this->_ip = new Env_ip();
        $this->_Log = new logsModel();
    }
    
    abstract public function index();
    
    protected function loadModel($modelo, $modulo = false)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        
        if(!$modulo){
            $modulo = $this->_request->getModulo();
        }
        
        if($modulo){
           if($modulo != 'default'){
               $rutaModelo = ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $modelo . '.php';
           } 
        }
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            
            throw new Exception('Error de modelo');
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    
    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        
        return '';
    }
    
    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }
    
    protected function redireccionar($ruta = false)
    {
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function filtrarInt($int)
    {
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }
    
    protected function getParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }
    
    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_real_escape_string($_POST[$clave], mysql_connect(DB_HOST, DB_USER, DB_PASS));
            }
            
            return trim($_POST[$clave]);
        }
    }
    
    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }
    
    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        
        return true;
    }
    
    protected function formatPermiso($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }
    
    /* Funciones del sistema de Loggin */
    
    public function newLog($msg,$by){
		$from = 'De: <'.EMAIL_FROM_ADDR.'>';
		$subject = 'Log de '.SITE_NAME.' ha sido modificado';
		$body = 'Hola, El log de '.SITE_NAME.' ha sido modificado:\n $msg\n Hi, '.EMAIL_FROM_ADDR;
		return mail(EMAIL_TO_ADDR,$subject,$body,$from);
	}
	
    //the following function will log any activity in the pages with the code "$log->logg(parameters);" in them:
    public function logg($page=1,$msg=1,$priority='notSet',$color='blue',$mail='no', $errorcode){
        
        Session::Log_env();
        
        if($page == 1 || $msg == 1){
            if($page == 1){
                $page = $_SERVER['PHP_SELF']; //get full page direction (Ej. /index.php
                $pages = explode('/',$page); //explode the / and take 1 (Only suitable for first level pages
                $name = explode('.',$pages[1]); //explode the .php, and leave only the "name" ($name[0])
                $page = $name[0]; //Now the page name is in the form of "log" for the page "/log.php"
            }
            //Use the following arrays to store the default pages:
            //
            $high = array('log'); //for the example the important page is log.php
            $medium = array('test'); //for the example the medium is test.php
            //
            if($priority == 'notSet'){ //If priority was left blank
                //Now perform the check to see if page is important:
                if(in_array($page,$high)){
                        $priority = 'High';
                        $color = 'red';
                }else if(in_array($page,$medium)){
                        $priority = 'Medium';
                        $color = 'yellow';
                }else{
                        $priority = 'Low';
                }
            }
            if($msg == 1){ //This are the default messages to use when no arguments are given.
                $msg = 'Se ha accedido al siguiente recurso '.$page;
            }
            //
        }
        if($mail=='yes'){
            $this->newLog($msg,Session::get('username'));
        }
        
        $this->_Log->addLog(
                            $msg,
                            Session::get('usuario'),
                            $this->_ip->ip(),
                            $priority,
                            $color,
                            $page,
                            $errorcode
                        );
    }
}

?>
