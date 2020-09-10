<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$tXd_id= (isset($_POST['tXd_id'])) ? $_POST['tXd_id'] : '';
$date= (isset($_POST['date'])) ? $_POST['date'] : '';
$msb_d= (isset($_POST['msb_d'])) ? $_POST['msb_d'] : '';
$msm_d= (isset($_POST['msm_d'])) ? $_POST['msm_d'] : '';
$ti_d= (isset($_POST['ti_d'])) ? $_POST['ti_d'] : '';
$dc_d= (isset($_POST['dc_d'])) ? $_POST['dc_d'] : '';
$sc_d= (isset($_POST['sc_d'])) ? $_POST['sc_d'] : '';
$telTra_d= (isset($_POST['telTra_d'])) ? $_POST['telTra_d'] : '';
$ofi_d= (isset($_POST['ofi_d'])) ? $_POST['ofi_d'] : '';
$reu_d= (isset($_POST['reu_d'])) ? $_POST['reu_d'] : '';
$perLab_d= (isset($_POST['perLab_d'])) ? $_POST['perLab_d'] : '';
$pub_d= (isset($_POST['pub_d'])) ? $_POST['pub_d'] : '';
$par_d= (isset($_POST['par_d'])) ? $_POST['par_d'] : '';
$bic_d= (isset($_POST['bic_d'])) ? $_POST['bic_d'] : '';
$aTra_d= (isset($_POST['aTra_d'])) ? $_POST['aTra_d'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO totalesxdia (tXd_id, date, msb_d, msm_d, ti_d,dc_d,sc_d,telTra_d,ofi_d,reu_d,perLab_d,pub_d,par_d,bic_d,aTra_d)
         VALUES('$tXd_id','$date','$msb_d','$msm_d','$ti_d','$dc_d','$sc_d','$telTra_d','$ofi_d','$reu_d','$perLab_d','$pub_d','$par_d','$bic_d','$aTra_d') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM totalesxdia ORDER BY txd_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;       
        case 2:        
            $consulta = "UPDATE totalesxdia SET tXd_id='$txd_id', date='$date', msb_d='$msb_d', msm_d='$msm_d', ti_d='$ti_d',dc_d='$dc_d',sc_d='$sc_d',telTra_d='$telTra_d',ofi_d='$ofi_d',reu_d='$reu_d',perLab_d='$perLab_d',pub_d='$pub_d',par_d='$par_d',bic_d='$bic_d',aTra_d='$aTra_d' 
            WHERE txd_id='$txd_id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM totalesxdia WHERE txd_id='$txd_id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    case 3:        
        $consulta = "DELETE FROM totalesxdia WHERE txd_id='$txd_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                          
        break;
    case 4:    
        $consulta = "SELECT * FROM totalesxdia";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;