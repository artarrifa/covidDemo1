<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$ausencia_usuario_id = (isset($_POST['ausencia_usuario_id'])) ? $_POST['ausencia_usuario_id'] : '';
$ausencia_tipo = (isset($_POST['ausencia_tipo'])) ? $_POST['ausencia_tipo'] : '';
$ausencia_inicio  = (isset($_POST['ausencia_inicio '])) ? $_POST['ausencia_inicio'] : ''; 
$ausencia_fin = (isset($_POST['ausencia_fin'])) ? $_POST['ausencia_fin'] : '';
$ausencia_horas = (isset($_POST['ausencia_horas'])) ? $_POST['ausencia_horas'] : '';
$ausencia_fecha_creacion = (isset($_POST['ausencia_fecha_creacion'])) ? $_POST['ausencia_fecha_creacion'] : '';
$ausencia_estado = (isset($_POST['ausencia_estado'])) ? $_POST['ausencia_estado'] : '';
$ausencia_responsable_ath  = (isset($_POST['ausencia_responsable_ath'])) ? $_POST['ausencia_responsable_ath'] : ''; 
$ausencia_observaciones  = (isset($_POST['ausencia_observaciones '])) ? $_POST['ausencia_observaciones '] : '';
$ausencia_sin_soporte = (isset($_POST['ausencia_sin_soporte'])) ? $_POST['ausencia_sin_soporte '] : '';

$ausencia_id = (isset($_POST['ausencia_id'])) ? $_POST['ausencia_id'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
switch($opcion){
    case 1:
        $consulta = "INSERT INTO ausencias (ausencia_id, ausencia_usuario_id, ausencia_tipo, ausencia_inicio ,ausencia_fin, ausencia_horas, ausencia_fecha_creacion , ausencia_estado, ausencia_responsable_ath , ausencia_observaciones , ausencia_sin_soporte ) 
        VALUES('$ausencia_id', '$ausencia_usuario_id', '$ausencia_tipo', '$ausencia_inicio', '$ausencia_fin', '$ausencia_horas', '$ausencia_fecha_creacion', '$ausencia_estado', '$ausencia_responsable_ath', '$ausencia_observaciones', '$ausencia_sin_soporte' ) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM ausencias ORDER BY ausencia_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE ausencias SET ausencia_usuario_id='$ausencia_usuario_id', ausencia_tipo='$ausencia_tipo', ausencia_inicio='$ausencia_inicio',ausencia_fin= '$ausencia_fin', ausencia_horas='$ausencia_horas', ausencia_fecha_creacion='$ausencia_fecha_creacion', ausencia_estado='$ausencia_estado', ausencia_responsable_ath='$ausencia_responsable_ath', ausencia_observaciones='$ausencia_observaciones',ausencia_sin_soporte= '$ausencia_sin_soporte' 			
    WHERE ausencia_id='$ausencia_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM ausencias WHERE ausencia_id='$ausencia_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM ausencias WHERE ausencia_id='$ausencia_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 
    case 4:    
        $consulta = "SELECT * FROM ausencias";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;   
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=null;