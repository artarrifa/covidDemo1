<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$soporte_id = (isset($_POST['soporte_id'])) ? $_POST['soporte_id'] : '';
$usuario_id = (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
$soporte_ausencia_id = (isset($_POST['soporte_ausencia_id'])) ? $_POST['soporte_ausencia_id'] : '';
$soporte_location = (isset($_POST['soporte_location'])) ? $_POST['soporte_location'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO soportes (soporte_id,usuario_id, soporte_ausencia_id,soporte_location)
         VALUES('$soporte_id','$usuario_id','$soporte_ausencia_id','$soporte_location') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM soportes ORDER BY soporte_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE soportes SET soporte_id='$soporte_id',usuario_id='$usuario_id', soporte_ausencia_id='$soporte_ausencia_id',soporte_location='$soporte_location' WHERE soporte_id='$soporte_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM soportes WHERE soporte_id='$soporte_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM soportes WHERE soporte_id='$soporte_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM soportes";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;