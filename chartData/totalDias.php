 <?php
 header('Content-Type: application/json');
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT totalDias  as name, COUNT(totalDias) as total
FROM usuarios 
GROUP BY totalDias ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

//sistemaAfectado = pie = ?
// mes = pie = Line = ?
//totalDias = bar = ? = Bar OK
//empresaUsuaria =  pie = 
?>

