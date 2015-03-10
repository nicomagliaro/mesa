<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salidaModel
 *
 * @author nico
 */

class salidaModel extends Model {
    //put your code here

    public function __construct() {
        parent::__construct();
        
    }
    
    public function getSalidaByDate($from,$to){
        
        $query = "SELECT tipo.tipo,mesa.id,mesa.exp_caracteristica,mesa.fk_id_tipo,mesa.tipo_num,mesa.year,mesa.fk_estado "
                ."FROM seguimiento_tipo tipo,seguimiento_mesa mesa,seguimiento_mov mov "
                ."WHERE mov.fecha_mov  "               
                ."BETWEEN "
                ."STR_TO_DATE(:from,'%d-%m-%Y') "
                ."AND "
                ."STR_TO_DATE(:to,'%d-%m-%Y') "
                ."AND tipo.id = mesa.fk_id_tipo "
                ."AND mesa.fk_estado = 0 "
                ."GROUP BY mesa.id "
                ."ORDER BY mesa.fecha ASC";        
        try{ 
            $stmt = $this->_db->prepare($query);
            $stmt ->execute(array(
                              ':from' => $from, 
                              ':to' => $to
                            ));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result) or $result == false){
                return array();
            }else{
                return $result;
            }
        }catch(PDOException $e){
            
            die("Failed to run query: " . $e->getMessage());
          
        }
    }
    
    public function getSalidaByString($str) {
        $query = "SELECT tipo.tipo,mesa.id,mesa.fk_id_tipo,mesa.exp_caracteristica,mesa.tipo_num,mesa.year,mesa.fk_estado "
                ."FROM seguimiento_tipo tipo, seguimiento_mesa mesa "
                ."WHERE mesa.tipo_num LIKE :search "
                ."AND tipo.id = mesa.fk_id_tipo "
                ."AND mesa.fk_estado = 0 "
                ."ORDER BY mesa.fecha ASC";
        
        $stmt = $this->_db->prepare($query);
        $stmt ->execute(array(':search' => '%'.$str.'%'));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result) or $result == false){
            return array();
        }else{
            return $result;
        }
    }
    
    public function insertarSalida($tipo, $num, $remitido, $referente,$detalle, $user)
    {
        try{
            $this->_db->beginTransaction();
            $this->_db->prepare("INSERT INTO seguimiento_mov VALUES (null, :fk_id_tipo, :fk_id_mesa_num, :fecha_mov, null, :remitido, :referente, :detalle, 1, :user)")
                ->execute(
                        array(
                           ':fk_id_tipo' => $tipo,
                           ':fk_id_mesa_num' => $num,
                           ':fecha_mov' => date("Y-m-d H:i:s"),                           
                           ':remitido' => $remitido,
                           ':referente' => $referente,
                           ':detalle' => $detalle,
                           ':user' => $user                          
                        ));
            
            $this->_db->commit();
            
        }catch(Exception $e){
            $this->_db->rollback();
        }
        
    }
    
    public function updateEstadoSalida($id, $estado) {
    
        $id = (int) $id;
        $estado = (int) $estado;
    
        try{
             $this->_db->beginTransaction();
             $this->_db->prepare("UPDATE seguimiento_mesa SET fk_estado = :estado WHERE id = :id")
                    ->execute(
                        array( 
                           ':estado' => $estado, 
                           ':id' => $id
                         ));
             $this->_db->commit();

        }catch(Exception $e){
            $this->_db->rollback();
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
