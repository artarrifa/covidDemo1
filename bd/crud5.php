<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sintomas_id= (isset($_POST['sintomas_id'])) ? $_POST['sintomas_id'] : '';
$usuario_id= (isset($_POST['usuario_id'])) ? $_POST['usuario_id'] : '';
$date= (isset($_POST['date'])) ? $_POST['date'] : '';
$fatiga= (isset($_POST['fatiga'])) ? $_POST['fatiga'] : '';
$dolorMuscular= (isset($_POST['dolorMuscular'])) ? $_POST['dolorMuscular'] : '';
$escalofrios= (isset($_POST['escalofrios'])) ? $_POST['escalofrios'] : '';
$dolorDeCabeza= (isset($_POST['dolorDeCabeza'])) ? $_POST['dolorDeCabeza'] : '';
$diarrea= (isset($_POST['diarrea'])) ? $_POST['diarrea'] : '';
$dolorDeGarganta= (isset($_POST['dolorDeGarganta'])) ? $_POST['dolorDeGarganta'] : '';
$perdidaGusto= (isset($_POST['perdidaGusto'])) ? $_POST['perdidaGusto'] : '';
$nauseas= (isset($_POST['nauseas'])) ? $_POST['nauseas'] : '';
$diagnosticoCovid= (isset($_POST['diagnosticoCovid'])) ? $_POST['diagnosticoCovid'] : '';
$sospechaCovid= (isset($_POST['sospechaCovid='])) ? $_POST['sospechaCovid='] : '';
$otraEnfermedad= (isset($_POST['otraEnfermedad'])) ? $_POST['otraEnfermedad'] : '';
$tengoIncapacidad= (isset($_POST['tengoIncapacidad'])) ? $_POST['tengoIncapacidad'] : '';
$alta= (isset($_POST['alta'])) ? $_POST['alta'] : '';
$normal= (isset($_POST['normal'])) ? $_POST['normal'] : '';
$sinInformacion= (isset($_POST['sinInformacion'])) ? $_POST['sinInformacion'] : '';
$meSientoBien= (isset($_POST['meSientoBien'])) ? $_POST['meSientoBien'] : '';
$meSientoMal= (isset($_POST['meSientoMal'])) ? $_POST['meSientoMal'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO sintomas (sintomas_id, usuario_id, date, fatiga, dolorMuscular, escalofrios, dolorDeCabeza, diarrea, dolorDeGarganta, perdidaGusto, nauseas, diagnosticoCovid, sospechaCovid, otraEnfermedad, tengoIncapacidad,alta,normal,sinInformacion,meSientoBien,meSientoMal) 
        VALUES('$sintomas_id','$usuario_id','$date','$fatiga','$dolorMuscular','$escalofrios','$dolorDeCabeza','$diarrea','$dolorDeGarganta','$perdidaGusto','$nauseas','$diagnosticoCovid','$sospechaCovid','$otraEnfermedad','$tengoIncapacidad','$alta','$normal','$sinInformacion','$meSientoBien','$meSientoMal') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM sintomas ORDER BY sintomas_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE sintomas SET sintomas_id='$sintomas_id', usuario_id='$usuario_id', date='$date', fatiga='$fatiga', dolorMuscular='$dolorMuscular', escalofrios='$escalofrios', dolorDeCabeza='$dolorDeCabeza', diarrea='$diarrea', dolorDeGarganta='$dolorDeGarganta', perdidaGusto='$perdidaGusto', nauseas='$nauseas', diagnosticoCovid='$diagnosticoCovid', sospechaCovid='$sospechacovid', otraEnfermedad='$otraEnfermedad', tengoIncapacidad='$tengoIncapacidad',alta='$alta',normal='$normal',sinInformacion='$sinInformacion',meSientoBien='$meSientoBien',meSientoMal='$meSientoMal' WHERE sintomas_id='$sintomas_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM sintomas WHERE sintomas_id='$sintomas_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM sintomas WHERE sintomas_id='$sintomas_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM sintomas";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;