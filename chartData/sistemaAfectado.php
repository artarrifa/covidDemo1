 <?php
 header('Content-Type: application/json');
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT sistemaAfectado  as name, COUNT(sistemaAfectado) as total
FROM usuarios 
GROUP BY sistemaAfectado ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

//sistemaAfectado = pie = ?
// mes = pie = Line = ?
//totalDias = bar = ? = Bar OK
//empresaUsuaria =  pie = 
?>

