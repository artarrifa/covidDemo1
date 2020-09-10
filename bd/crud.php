<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$mes= (isset($_POST['mes'])) ? $_POST['mes'] : '';
$cedula = (isset($_POST[' cedula'])) ? $_POST[' cedula'] : '';
$datosDelTrabajador = (isset($_POST['datosDelTrabajador'])) ? $_POST[' datosDelTrabajador'] : '';
$fechaIngreso = (isset($_POST['fechaIngreso'])) ? $_POST['fechaIngreso'] : '';
$razonSocial = (isset($_POST['razonSocial'])) ? $_POST['razonSocial'] : '';
$empresaUsuaria = (isset($_POST['empresaUsuaria'])) ? $_POST['empresaUsuaria'] : '';
$entidad = (isset($_POST['entidad'])) ? $_POST['entidad'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$codigoDiagnostico= (isset($_POST['codigoDiagnostico'])) ? $_POST['codigoDiagnostico'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$sistemaAfectado = (isset($_POST['sistemaAfectado'])) ? $_POST['sistemaAfectado'] : '';
$fechaInicial = (isset($_POST['fechaInicial'])) ? $_POST['fechaInicial'] : '';
$fechaFinal = (isset($_POST['fechaFinal'])) ? $_POST['fechaFinal'] : '';
$totalDias = (isset($_POST['totalDias'])) ? $_POST['totalDias'] : '';
$lugarDeTrabajo = (isset($_POST['lugarDeTrabajo'])) ? $_POST['lugarDeTrabajo'] : '';
$salario = (isset($_POST['salario'])) ? $_POST['salario'] : '';
$recobro = (isset($_POST['recobro'])) ? $_POST['recobro'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';



switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarios (fecha,mes,cedula,datosDelTrabajador,fechaIngreso,razonSocial,empresaUsuaria,entidad,tipo,codigoDiagnostico,descripcion,sistemaAfectado,fechaInicial,fechaFinal,totalDias,lugarDeTrabajo,salario,recobro) VALUES('$fecha','$mes','$cedula','$datosDelTrabajador','$fechaIngreso','$razonSocial','$empresaUsuaria','$entidad','$tipo','$codigoDiagnostico','$descripcion','$sistemaAfectado','$fechaInicial','$fechaFinal','$totalDias','$lugarDeTrabajo','$salario','$recobro') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY user_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE usuarios SET fecha='$fecha',mes='$mes',cedula='$cedula',datosDelTrabajador='$datosDelTrabajador',fechaIngreso='$fechaIngreso',razonSocial='$razonSocial',empresaUsuaria='$empresaUsuaria',entidad='$entidad',tipo='$tipo',codigoDiagnostico='$codigoDiagnostico',descripcion='$descripcion',sistemaAfectado='$sistemaAfectado',fechaInicial='$fechaInicial',fechaFinal='$fechaFinal',totalDias='$totalDias',lugarDeTrabajo='$lugarDeTrabajo',salario='$salario',recobro='$recobro' WHERE user_id='$user_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM usuarios WHERE user_id='$user_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE user_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;