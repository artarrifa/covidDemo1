<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$usuario_id= (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
$usuario_nombre = (isset($_POST['usuario_nombre'])) ? $_POST['usuario_nombre'] : '';
$usuario_password = (isset($_POST['usuario_password'])) ? $_POST['usuario_password'] : '';
$usuario_estado_registro = (isset($_POST['usuario_estado_registro'])) ? $_POST['usuario_estado_registro'] : '';
$usuario_apellido = (isset($_POST['usuario_apellido'])) ? $_POST['usuario_apellido'] : '';
$usuario_tipo_documento = (isset($_POST['usuario_tipo_documento'])) ? $_POST['usuario_tipo_documento'] : '';
$usuario_documento = (isset($_POST['usuario_documento'])) ? $_POST['usuario_documento'] : '';
$usuario_cargo = (isset($_POST['usuario_cargo'])) ? $_POST['usuario_cargo'] : '';
$usuario_empresa = (isset($_POST['usuario_empresa'])) ? $_POST['usuario_empresa'] : '';
$usuario_foto = (isset($_POST['usuario_foto'])) ? $_POST['usuario_foto'] : '';
$usuario_responsable_ath_id = (isset($_POST['usuario_responsable_ath_id'])) ? $_POST['usuario_responsable_ath_id'] : '';
$usuario_celular = (isset($_POST['usuario_celular'])) ? $_POST['usuario_celular'] : '';
$usuario_email = (isset($_POST['usuario_email'])) ? $_POST['usuario_email'] : '';
$usuario_estado_ausencia = (isset($_POST['usuario_estado_ausencia'])) ? $_POST['usuario_estado_ausencia'] : '';
$usuario_salario_ausencia = (isset($_POST['usuario_salario_ausencia'])) ? $_POST['usuario_salario_ausencia'] : '';
$usuario_salario_mensual = (isset($_POST['usuario_salario_mensual'])) ? $_POST['usuario_salario_mensual'] : '';
$usuario_rol = (isset($_POST['usuario_rol'])) ? $_POST['usuario_rol'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarios (usuario_id,usuario_nombre, usuario_password, usuario_estado_registro, usuario_apellido, usuario_tipo_documento, usuario_documento, usuario_cargo, usuario_empresa, usuario_foto, usuario_responsable_ath_id, usuario_celular, usuario_email, usuario_estado_ausencia, usuario_salario_ausencia, usuario_salario_mensual, usuario_rol) 
        VALUES('$usuario_id','$usuario_nombre','$usuario_password','$usuario_estado_registro','$usuario_apellido','$usuario_tipo_documento','$usuario_documento','$usuario_cargo','$usuario_empresa','$usuario_foto','$usuario_responsable_ath_id','$usuario_celular','$usuario_email','$usuario_estado_ausencia','$usuario_salario_ausencia','$usuario_salario_mensual','$usuario_rol') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY  usuario_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE usuarios SET usuario_id='$usuario_id',usuario_nombre='$usuario_nombre', usuario_password='$usuario_password', usuario_estado_registro='$usuario_estado_registro', usuario_apellido='$usuario_apellido', usuario_tipo_documento='$usuario_tipo_documento', usuario_documento='$usuario_documento', usuario_cargo='$usuario_cargo', usuario_empresa='$usuario_empresa', usuario_foto='$usuario_foto', usuario_responsable_ath_id='$usuario_responsable_ath_id', usuario_celular='$usuario_celular', usuario_email='$usuario_email', usuario_estado_ausencia='$usuario_estado_ausencia', usuario_salario_ausencia='$usuario_salario_ausencia', usuario_salario_mensual='$usuario_salario_mensual', usuario_rol='$usuario_rol'
            WHERE  usuario_id='$ usuario_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM usuarios WHERE  usuario_id='$ usuario_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE  usuario_id='$ usuario_id' ";		
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