<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$vulnerabilidad_id= (isset($_POST['vulnerabilidad_id'])) ? $_POST['vulnerabilidad_id'] : '';
$usuario_id= (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
$mayor60= (isset($_POST['mayor60'])) ? $_POST['mayor60'] : '';
$enfermedadRenal= (isset($_POST['enfermedadRenal'])) ? $_POST['enfermedadRenal'] : '';
$enfermedadPulmonar= (isset($_POST['enfermedadPulmonar'])) ? $_POST['enfermedadPulmonar'] : '';
$asma= (isset($_POST['asma'])) ? $_POST['asma'] : '';
$hipertensionArterial= (isset($_POST['hipertensionArterial'])) ? $_POST['hipertensionArterial'] : '';
$enfermedadCardiaca= (isset($_POST['enfermedadCardiaca'])) ? $_POST['enfermedadCardiaca'] : '';
$sistemaInmunitario= (isset($_POST['sistemaInmunitario'])) ? $_POST['sistemaInmunitario'] : '';
$obesidad= (isset($_POST['obesidad'])) ? $_POST['obesidad'] : '';
$diabetes= (isset($_POST['diabetes'])) ? $_POST['diabetes'] : '';
$enfermedadHepatica= (isset($_POST['enfermedadHepatica'])) ? $_POST['enfermedadHepatica'] : '';
$tabaquismo= (isset($_POST['tabaquismo'])) ? $_POST['tabaquismo'] : '';
$fallaRespiratoria= (isset($_POST['fallaRespiratoria'])) ? $_POST['fallaRespiratoria'] : '';
$transplantes= (isset($_POST['transplantes'])) ? $_POST['transplantes'] : '';
$cancer= (isset($_POST['cancer'])) ? $_POST['cancer'] : '';
$embarazo= (isset($_POST['embarazo'])) ? $_POST['embarazo'] : '';
$aceptoTerminos= (isset($_POST['aceptoTerminos'])) ? $_POST['aceptoTerminos'] : '';
$aceptoTerminosFecha= (isset($_POST['aceptoTerminosFecha'])) ? $_POST['aceptoTerminosFecha'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO vulnerabilidad (vulnerabilidad_id, usuario_id, mayor60, enfermedadRenal, enfermedadPulmonar, asma, hipertensionArterial, enfermedadCardiaca, sistemaInmunitario,obesidad, diabetes,enfermedadHepatica,tabaquismo,fallaRespiratoria,transplantes, cancer, embarazo,aceptoTerminos, aceptoTerminosFecha) 
        VALUES('$vulnerabilidad_id','$usuario_id','$mayor60','$enfermedadRenal','$enfermedadPulmonar','$asma','$hipertensionArterial','$enfermedadCardiaca','$sistemaInmunitario','$obesidad','$diabetes','$enfermedadHepatica','$tabaquismo','$fallaRespiratoria','$transplantes','$cancer','$embarazo','$aceptoTerminos','$aceptoTerminosFecha') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM vulnerabilidad ORDER BY vulnerabilidad_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE vulnerabilidad SET vulnerabilidad_id='$vulnerabilidad_id, usuario_id='$usuario_id', mayor60='$mayor60', enfermedadRenal='$enfermedadRenal', enfermedadPulmonar='$enfermedadPulmonar', asma='$asma', hipertensionArterial='$hipertensionArterial', enfermedadCardiaca='$enfermedadCardiaca', sistemaInmunitario='$sistemaInmunitario',obesidad='$obesidad', diabetes='$diabetes',enfermedadHepatica='$enfermedadHepatica',tabaquismo='$tabaquismo',fallaRespiratoria='$fallaRespiratoria',transplantes='$transplantes', cancer='$cancer', embarazo='$embarazo',aceptoTerminos='$aceptoTerminos', aceptoTerminosFecha='$aceptoTerminosFecha'
            WHERE vulnerabilidad_id='$vulnerabilidad_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM vulnerabilidad WHERE vulnerabilidad_id='$vulnerabilidad_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM vulnerabilidad WHERE vulnerabilidad_id='$vulnerabilidad_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM vulnerabilidad";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;