<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$trabajarinicio_id= (isset($_POST['trabajarinicio_id'])) ? $_POST['trabajarinicio_id'] : '';
$usuario_id= (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
$date= (isset($_POST['date'])) ? $_POST['date'] : '';
$teleTrabajo= (isset($_POST['teleTrabajo'])) ? $_POST['teleTrabajo'] : '';
$oficina= (isset($_POST['oficina'])) ? $_POST['oficina'] : '';
$reunion= (isset($_POST['reunion'])) ? $_POST['reunion'] : '';
$permisoLaboral= (isset($_POST['permisoLaboral'])) ? $_POST['permisoLaboral'] : '';
$publico= (isset($_POST['publico'])) ? $_POST['publico'] : '';
$particular= (isset($_POST['particular'])) ? $_POST['particular'] : '';
$bicicleta= (isset($_POST['bicicleta'])) ? $_POST['bicicleta'] : '';
$aTrabajar= (isset($_POST['aTrabajar'])) ? $_POST['aTrabajar'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO trabajarinicio (trabajarinicio_id, usuario_id,date,teleTrabajo, oficina, reunion, permisoLaboral,publico,particular,bicicleta,aTrabajar)
        VALUES('$trabajarinicio_id','$usuario_id','$date','$teleTrabajo','$oficina','$reunion','$permisoLaboral','$publico','$particular','$bicicleta','$aTrabajar') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM trabajarinicio ORDER BY trabajarinicio_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE trabajarinicio SET trabajarinicio_id='$trabajarinicio_id', usuario_id='$usuario_id',date='$date',teleTrabajo='$teleTrabajo', oficina='$oficina', reunion='$reunion', permisoLaboral='$permisoLaboral',publico='$publico',particular='$particular',bicicleta='$bicicleta',aTrabajar='$aTrabajar'
            WHERE trabajarinicio_id='$trabajarinicio_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM trabajarinicio WHERE trabajarinicio_id='$trabajarinicio_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM trabajarinicio WHERE trabajarinicio_id='$trabajarinicio_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM trabajarinicio";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;