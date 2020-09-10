<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$incapacidad_id= (isset($_POST['incapacidad_id'])) ? $_POST['incapacidad_id'] : '';
$incapacidad_ausencia_id= (isset($_POST['incapacidad_ausencia_id'])) ? $_POST['incapacidad_ausencia_id'] : '';
$usuario_id= (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
$incapacidad_estado= (isset($_POST['incapacidad_estado'])) ? $_POST['incapacidad_estado'] : '';
$incapacidad_tipo_ausencia= (isset($_POST['incapacidad_tipo_ausencia'])) ? $_POST['incapacidad_tipo_ausencia'] : '';
$incapacidad_diagnostico= (isset($_POST['incapacidad_diagnostico'])) ? $_POST['incapacidad_diagnostico'] : '';
$incapacidad_entidad= (isset($_POST['incapacidad_entidad'])) ? $_POST['incapacidad_entidad'] : '';
$incapacidad_compania= (isset($_POST['incapacidad_compania'])) ? $_POST['incapacidad_compania'] : '';
$incapacidad_codigocie= (isset($_POST['incapacidad_codigocie'])) ? $_POST['incapacidad_codigocie'] : '';
$incapacidad_perdidalaboral= (isset($_POST['incapacidad_perdidalaboral'])) ? $_POST['incapacidad_perdidalaboral'] : '';
$incapacidad_medico_nombre = (isset($_POST['incapacidad_medico_nombre'])) ? $_POST['incapacidad_medico_nombre'] : '';
$incapacidad_medico_codigo= (isset($_POST['incapacidad_medico_codigo'])) ? $_POST['incapacidad_medico_codigo'] : '';
$incapacidad_responsable= (isset($_POST['incapacidad_responsable'])) ? $_POST['incapacidad_responsable'] : '';
$incapacidad_responsable_ath_analista= (isset($_POST['incapacidad_responsable_ath_analista'])) ? $_POST['incapacidad_responsable_ath_analista'] : '';
$incapacidad_responsable_ath_gerente= (isset($_POST['incapacidad_responsable_ath_gerente'])) ? $_POST['incapacidad_responsable_ath_gerente'] : '';
$incapacidad_comentarios = (isset($_POST['incapacidad_comentarios'])) ? $_POST['incapacidad_comentarios'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
switch($opcion){
    case 1:
        $consulta = "INSERT INTO incapacidad( incapacidad_id, incapacidad_ausencia_id, usuario_id, incapacidad_estado, incapacidad_tipo_ausencia, incapacidad_diagnostico, incapacidad_entidad, incapacidad_compania, incapacidad_codigocie, incapacidad_perdidalaboral, incapacidad_medico_nombre, incapacidad_medico_codigo, incapacidad_responsable, incapacidad_responsable_ath_analista, incapacidad_responsable_ath_gerente, incapacidad_comentarios ) 
        VALUES('$incapacidad_id','$incapacidad_ausencia_id','$usuario_id','$incapacidad_estado','$incapacidad_tipo_ausencia','$incapacidad_diagnostico','$incapacidad_entidad','$incapacidad_compania','$incapacidad_codigocie','$incapacidad_perdidalaboral','$incapacidad_medico_nombre','$incapacidad_medico_codigo','$incapacidad_responsable','$incapacidad_responsable_ath_analista','$incapacidad_responsable_ath_gerente','$incapacidad_comentarios'  ) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM incapacidad ORDER BY incapacidad_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE incapacidad SET incapacidad_id='$incapacidad_id', incapacidad_ausencia_id='$incapacidad_ausencia_id', usuario_id='$usuario_id', incapacidad_estado='$incapacidad_estado', incapacidad_tipo_ausencia='$incapacidad_tipo_ausencia', incapacidad_diagnostico='$incapacidad_diagnostico', incapacidad_entidad='$incapacidad_entidad', incapacidad_compania='$incapacidad_compania', incapacidad_codigocie='$incapacidad_codiocie', incapacidad_perdidalaboral='$incapacidad_perdidalaboral', incapacidad_medico_nombre='$incapacidad_medico_nombre', incapacidad_medico_codigo='$incapacidad_medico_codigo', incapacidad_responsable='$incapacidad_responsable', incapacidad_responsable_ath_analista='$incapacidad_responsable_ath_analista', incapacidad_responsable_ath_gerente='$incapacidad_responsable_ath_erente', incapacidad_comentarios='$incapacidad_comentarios' WHERE incapacidad_id ='$incapacidad_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM incapacidad WHERE incapacidad_id='$incapacidad_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM incapacidad WHERE incapacidad_id='$incapacidad_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM incapacidad";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;