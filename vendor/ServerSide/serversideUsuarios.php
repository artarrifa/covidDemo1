<?php
require 'serverside.php';
$table_data->get('vista_usuarios','user_id',array('user_id', `fecha`, `mes`,`cedula` ,`datosDelTrabajador`, `fechaIngreso` , `razonSocial` , `empresaUsuaria` ,`entidad`,`tipo`,`codigoDiagnostico`, `descripcion` ,`sistemaAfectado` ,`fechaInicial`,`fechaFinal` ,`totalDias`, `lugarDeTrabajo`,`salario`,`recobro`));

?>