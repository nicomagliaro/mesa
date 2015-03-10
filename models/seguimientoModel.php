<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seguimientoModel
 *
 * @author nico
 */
class seguimientoModel extends Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getData() {
       $query =  $this->_db->prepare('SELECT * FROM seguimiento_tipo');
       $query->execute();
       return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function getYears() {
       $query =  $this->_db->prepare('SELECT * FROM years');
       $query->execute();
       return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function insertarNuevoSeg($tipo, $ca, $alcance, $num , $year, $user) {
        
        if(empty($alcance) || $alcance == 0)
        {
            $alcance = 'null';
        }else{
            $alcance = (int) $alcance;
        }
        
        $query = "INSERT INTO seguimiento_mesa VALUES (null, :tipo, :caracteristica, :alcance, :num, 0, :year, :fecha,:user)";
        
        try{
            $this->_db->beginTransaction();
            $this->_db->prepare($query)
                ->execute(
                        array(
                           ':tipo' => $tipo,
                           ':caracteristica' => $ca,
                           ':alcance' => $alcance, 
                           ':num' => $num,
                           ':year' => $year, 
                           ':fecha' => date("Y-m-d H:i:s"),
                           ':user' => $user
                        ));
            $id = $this->_db->lastInsertId();
            $this->_db->commit();
            //$this->_db->autocommit(TRUE);
            return $id;
        }catch(PDOException $e){
            $this->_db->rollback();
            //$this->_db->autocommit(TRUE);
        }
        
    }
    
    public function insertarSeg($tipo, $num, $recibido, $referente,$detalle, $user)
    {
        $query = "INSERT INTO seguimiento_mov VALUES (null, :fk_id_tipo, :fk_id_mesa_num, :fecha_mov, :recibido, null, :referente, :detalle, 0, :user)";
        
        try{
               
            $this->_db->beginTransaction();
            $this->_db->prepare($query)
                ->execute(
                        array(
                           ':fk_id_tipo' => $tipo,
                           ':fk_id_mesa_num' => $num,
                           ':fecha_mov' => date("Y-m-d H:i:s"),
                           ':recibido' => $recibido,
                           ':referente' => $referente,
                           ':detalle' => $detalle,
                           ':user' => $user                          
                        ));
            $this->_db->commit();
            //$this->_db->autocommit(TRUE);
            
        }catch(PDOException $e){
            $this->_db->rollback();
            //$this->_db->autocommit(TRUE);
        }
     
    }
    
    public function editarLegajo($remite, $recibe, $leg, $agente, $motivo,$observacion)
    {
        $id = (int) $id;
        
        $this->_db->prepare("UPDATE legajos SET remite = :remite, recibe = :recibe, agente = :agente, motivo = :motivo, observacion = :observacion WHERE legajo = :legajo")
                ->execute(
                       array(
                           
                           ':remite' => $remite,
                           ':recibe' => $recibe,
                           ':leg' => $leg,
                           ':agente' => $agente,
                           ':motivo' => $motivo,
                           ':observacion' => $observacion 
                        ));
    }
    
    public function eliminarLegajo($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM legajos WHERE id = $id");
    }
    
    public function busquedaInicio($title) {
        
        $query = "SELECT tipo.tipo,mesa.id,mesa.exp_caracteristica,mesa.tipo_num,mesa.year,mesa.fk_estado "
               ."FROM seguimiento_tipo tipo, seguimiento_mesa mesa "
               ."WHERE mesa.tipo_num LIKE :search "
               ."AND tipo.id = mesa.fk_id_tipo "
               ."GROUP BY mesa.id "
               ."ORDER BY mesa.fecha DESC";
        
        try{
            
            $stmt = $this->_db->prepare($query);
            $stmt ->execute(array(':search' => '%'.$title.'%'));
            //print_r($stmt->fetchAll(PDO::FETCH_ASSOC));exit;
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result) or $result == false){
                return array();
            }else{
                return $result;
            }
        }catch(Exception $e){
            die("Failed to run query: " . $e->getMessage());
        }
        
    }
    
    public function getSalidaByDate($from,$to){

          $query = "SELECT tipo.tipo,mesa.id,mesa.exp_caracteristica,mesa.tipo_num,mesa.year,mesa.fk_estado "
                  ."FROM seguimiento_tipo tipo,seguimiento_mesa mesa,seguimiento_mov mov "
                  ."WHERE mov.fecha_mov "               
                  ."BETWEEN "
                  ."STR_TO_DATE(:from,'%d-%m-%Y') "
                  ."AND "
                  ."STR_TO_DATE(:to,'%d-%m-%Y') "
                  ."AND tipo.id = mesa.fk_id_tipo "
                  ."GROUP BY mesa.id "
                  ."ORDER BY mesa.fecha DESC";

          try{

              //$stmt->beginTransaction();
              $stmt = $this->_db->prepare($query);
              $stmt ->execute(array(
                                ':from' => $from, 
                                ':to' => $to
                              ));
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
              
              if(empty($result) or $result == false){
                  return array();
              }else{
                  //print_r($result);exit;
                  return $result;
              }
          }catch(PDOException $e){

              die("Failed to run query: " . $e->getMessage());

          }
    }
    
    public function getDetalle($id){
        
        $id = (int) $id;
        $row = $this->_db->query("SELECT tipo.id as tipo_id,tipo.tipo,mesa.id as mesa_id,"
                                 ."mesa.exp_caracteristica,mesa.tipo_num,mesa.alcance,mesa.year,"
                                 ."mov.fecha_mov,mov.recibido,mov.remitido,mov.referente,mov.detalle,mov.estado "
                                 ."FROM seguimiento_mesa mesa, seguimiento_mov mov, seguimiento_tipo tipo "
                                 ."WHERE mesa.id = $id "
                                 ."AND mesa.id = mov.fk_id_mesa_num AND tipo.id = mesa.fk_id_tipo "
                                 ."ORDER BY mov.fecha_mov DESC");
        
        $row->setFetchMode(PDO::FETCH_ASSOC);
        return $row->fetchAll();
    }
     
    public function checkMatch($id) {
        $row = $this->_db->query(  "SELECT fk_id_tipo, tipo_num, year "
                                 . "FROM seguimiento_mesa "
                                 . "WHERE tipo_num = $id ");
        $row->setFetchMode(PDO::FETCH_ASSOC);
        return $row->fetchAll();
    }
  
    public function updateEstadoEntrada($id) {
        
    $id = (int) $id;
    $query = "UPDATE seguimiento_mesa SET fk_estado = 0 WHERE id = :id";
    
        try{

            $this->_db->beginTransaction();
            $this->_db->prepare($query)
            ->execute(
                    array(
                       ':id' => $id
                    ));
             $this->_db->commit();
             //$this->_db->autocommit(TRUE);
        }  catch (PDOException $e){
             $this->_db->rollback();
             //$this->_db->autocommit(TRUE);
        }

    }
    
    public function getLastInfo($id) {
              
        try{
            $row = $this->_db->query("SELECT remitido, referente "
                                      ."FROM seguimiento_mov "
                                      ."WHERE fk_id_mesa_num = $id "
                                      ."ORDER BY fecha_mov DESC LIMIT 1 ");
                          
            $row->setFetchMode(PDO::FETCH_ASSOC);
            return $row->fetchAll();

            
        }  catch (PDOException $e){
            throw new Exception("Ha ocurrido un error.<br>".$e->getMessage());
        }
    }
    
    
    
}
