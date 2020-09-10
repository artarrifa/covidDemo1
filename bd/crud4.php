<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$rechazoinc_id = (isset($_POST['rechazoinc_id'])) ? $_POST['rechazoinc_id'] : '';
$rechazoinc_arg = (isset($_POST['rechazoinc_arg'])) ? $_POST['rechazoinc_arg'] : '';
$rechazoinc_fecha = (isset($_POST['rechazoinc_fecha'])) ? $_POST['rechazoinc_fecha'] : '';
$usuario_id = (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO rechazo_incapacidad (rechazoinc_id, rechazoinc_arg, rechazoinc_fecha, usuario_id) VALUES($rechazoinc_id','$rechazoinc_arg','$rechazoinc_fecha','$usuario_id') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM rechazo_incapacidad ORDER BY rechazoinc_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE rechazo_incapacidad SET rechazoinc_id='$rechazoinc_id', rechazoinc_arg='$rechazoinc_arg', rechazoinc_fecha='$rechazoinc_fecha', usuario_id='$usuario_id' WHERE rechazoinc_id='$rechazoinc_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM rechazo_incapacidad WHERE rechazoinc_id='$rechazoinc_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM rechazo_incapacidad WHERE rechazoinc_id='$rechazoinc_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM rechazo_incapacidad";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;