<?php

class legajoModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getLegajos()
    {
        $query = $this->_db->query("SELECT a.legajo,a.nombre,a.apellido, 'false' as 'check' "
                                 ."FROM agentes a "
                                 ."WHERE legajo "
                                 ."NOT IN (SELECT fk_legajo FROM legajos) "
                                 ."UNION "
                                 ."SELECT a.legajo,a.nombre,a.apellido, 'true' as 'check' "
                                 ."FROM agentes a,legajos l where a.legajo = l.fk_legajo "
                                 ."GROUP BY a.legajo");
        
        return $query->fetchAll();
    }
    
    public function getLegajo($id)
    {
        $id = (int) $id;
        $row = $this->_db->query("select * from agentes where legajo = $id");
        return $row->fetch();
    }
    
    public function insertarLegajo($remite, $recibe, $legajo, $destino,$estado, $user, $observacion)
    {
        //func_get_args();exit;
        $this->_db->prepare("INSERT INTO legajos VALUES (null, :entregado, :recibido, :fk_legajo, :fk_destino, :estado, :date, :user, :detalle)")
                ->execute(
                        array(
                           ':entregado' => $remite,
                           ':recibido' => $recibe,
                           ':fk_legajo' => $legajo,
                           ':fk_destino' => $destino,
                           ':estado' => $estado,                            
                           ':date' => date("Y-m-d H:i:s"),
                           ':user' => $user,
                           ':detalle' => $observacion
                        ));
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

    public function getEstado()
    {
  
        $result = $this->_db->query("SELECT estado FROM estado");
        return $result->fetchAll();
    }

    public function get_search_legajos($title)
    {
        $query = "SELECT legajo,nombre,apellido "
                 ."FROM agentes "                 
                 ."WHERE concat_ws(' ',apellido,nombre) "
                 ."LIKE ? "
                 ."OR legajo "
                 ."LIKE ?";
        $stmt = $this->_db->prepare($query);
        $title = '%' . $title . '%';
        $stmt ->execute(array($title,$title));
        //print_r($stmt->fetchAll(PDO::FETCH_ASSOC));exit;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result) or $result == false)
            return array();
        else
            return $result;
    }
    
    public function getDetalle($id)
    {
        $id = (int) $id;
        $query = "SELECT agen.legajo,agen.apellido,agen.nombre,leg.entregado,leg.recibido,leg.estado,leg.date,leg.detalle,des.destinos "
                  ."FROM legajos leg, agentes agen, destinos des "
                  ."WHERE leg.fk_legajo = :id "
                  ."AND agen.legajo = leg.fk_legajo "
                  ."AND leg.fk_destino = des.id_destinos "  
                  ."ORDER BY leg.date DESC";
        $stmt = $this->_db->prepare($query);
        $stmt->execute(array(':id' => $id));
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function getCount(){
        $query = "SELECT a.legajo, 'false' as 'check' "
                 ."FROM agentes a "
                 ."WHERE legajo "
                 ."NOT IN (SELECT fk_legajo FROM legajos) "
                 ."UNION "
                 ."SELECT a.legajo, 'true' as 'check' "
                 ."FROM agentes a,legajos l "
                 ."WHERE a.legajo = l.fk_legajo "
                 ."GROUP BY a.legajo";
        $stmt = $this->_db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }

        public function insertarPrueba($nombre)
    {
        $this->_db->prepare("INSERT INTO prueba VALUES (null, :nombre)")
                ->execute(
                        array(
                           ':nombre' => $nombre
                        ));
    }
    
    public function getDestino()
    {
        $stmt = $this->_db->prepare("SELECT id_destinos, destinos FROM destinos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getReportByNum($id) {
        $id = (int) $id;
        $row = $this->_db->query("SELECT tipo.tipo,mesa.exp_caracteristica,mesa.tipo_num,mesa.year, "
                            ."mov.fecha_mov,mov.recibido,mov.remitido,mov.referente,mov.detalle "
                            ."FROM seguimiento_mesa mesa, seguimiento_mov mov, seguimiento_tipo tipo "
                            ."WHERE mesa.id = $id " 
                            ."AND mesa.id = mov.fk_id_mesa_num "
                            ."AND tipo.id = mesa.fk_id_tipo " 
                            ."ORDER BY mov.fecha_mov DESC");
        
        return $row->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function getLegData($id) {
        $id = (int) $id;
        $stmt = $this->_db->query("SELECT leg.recibido, des.destinos,leg.estado "
                                   ."FROM legajos leg, destinos des "
                                   ."WHERE leg.fk_legajo = $id " 
                                   ."AND des.id_destinos = leg.fk_destino "
                                   ."ORDER BY leg.id DESC "
                                   ."LIMIT 1");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>
