<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$empresaUbicacion_id= (isset($_POST['empresaUbicacion_id'])) ? $_POST['empresaUbicacion_id'] : '';
$usuario_id= (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
 $razonSocialContratante= (isset($_POST['razonSocialContratante'])) ? $_POST['razonSocialContratante'] : '';
$sede= (isset($_POST['sede'])) ? $_POST['sede'] : '';
$piso= (isset($_POST['piso'])) ? $_POST['piso'] : '';
$lugarDeTrabajo= (isset($_POST['lugarDeTrabajo'])) ? $_POST['lugarDeTrabajo'] : '';
$ciudad= (isset($_POST['ciudad'])) ? $_POST['ciudad'] : '';
$empresaUsuaria= (isset($_POST['empresaUsuaria'])) ? $_POST['empresaUsuaria'] : '';
 $usuario_empresa= (isset($_POST['usuario_empresa'])) ? $_POST['usuario_empresa'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarioempresaubicacion (empresaUbicacion_id, usuario_id, razonSocialContratante, sede,piso,lugarDeTrabajo,ciudad,empresaUsuaria, usuario_empresa)
         VALUES('$empresaUbicacion_id','$usuario_id','$razonSocialContratante','$sede','$piso','$lugarDeTrabajo','$ciudad','$empresaUsuaria','$usuario_empresa') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarioempresaubicacion ORDER BY empresaUbicacion_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE usuarioempresaubicacion SET empresaUbicacion_id='$empresaUbicacion_id', usuario_id='$usuario_id', razonSocialContratante='$razonSocialContratante', sede='$sede',piso='$piso',lugarDeTrabajo='$lugarDeTrabajo',ciudad='$ciudad',empresaUsuaria='$empresaUsuaria', usuario_empresa='$usuario_empresa'
            WHERE empresaUbicacion_id='$empresaUbicacion_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM usuarioempresaubicacion WHERE empresaUbicacion_id='$empresaUbicacion_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM usuarioempresaubicacion WHERE empresaUbicacion_id='$empresaUbicacion_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM usuarioempresaubicacion";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;