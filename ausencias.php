<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #1</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT   ausencia_id, ausencia_usuario_id, ausencia_tipo, ausencia_inicio ,ausencia_fin, ausencia_horas, ausencia_fecha_creacion , ausencia_estado, ausencia_responsable_ath , ausencia_observaciones , ausencia_sin_soporte FROM ausencias";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">AUSENCIAS</span></h2> 
     </header> 

      <div class="container">
        <div class="row">
            <div class="col-lg-12" >
            <!-- Amiriqbalmcs Code Start -->
                <!-- Button to Open the Modal -->
                <?php if(!isset($_SESSION['is_logged_in'])){ ?>
                <style>.btnEditar,.btnBorrar,#btnNuevo{display: none !important;}</style>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#loginModal">
                   <i class="fa fa-lock"></i> Login
                </button>
                <?php }else{?>
                <form action="" method="POST">
                    <button type="submit" name="logout" class="btn btn-warning" >
                       <i class="fa fa-lock-open"></i> Logout
                    </button>
                </form>
                
                <?php } ?>
                <!-- Amiriqbalmcs Code Ends -->  
            </div>    
        </div>    
    </div>    
    <br>  

        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tabladatos2" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                        <th>ID AUSENCIA</th>
                            <th> ID USUARIO</th>
                            <th>TIPO DE AUSENCIA</th>
                            <th>INICIO AUSENCIA </th>
                            <th>FIN AUSENCIA</th>
                            <th>HORAS AUSENCIA</th>
                            <th>FECHA CREACIÓN AUSENCIA</th>
                            <th>ESTADO AUSENCIA</th>
                            <th>RESPONSABLE ATH AUSENCIA </th> 
                            <th>OBSERVACIONES AUSENCIA </th>
                            <th>AUSENCIA SIN SOPORTE</th>
                            <th>ACCIONES</th>
                        </tr>
                        
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>             
            </div>
            </div>
        </div>  

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUsuarios2">  

<div class="modal-body">
    <div class="row">
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label">ID USUARIO</label>
        <input type="text" class="form-control" id="ausencia_usuario_id">
        </div> 
        </div>   
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label">TIPO DE AUSENCIA</label>
        <input type="text" class="form-control" id="ausencia_tipo">
        </div>               
        </div> 
    </div>
    <div class="row"> 
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label"> INICIO AUSENCIA </label>
        <input type="text" class="form-control" id="ausencia_inicio">
        </div>
        </div>  
        <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="col-form-label"> FIN AUSENCIA</label>
            <input type="text" class="form-control" id="ausencia_fin">
            </div>
        </div>   
    </div>
    <div class="row">
      
        <div class="col-lg-6">    
            <div class="form-group">
            <label for="" class="col-form-label">HORAS AUSENCIA</label>
            <input type="number" class="form-control" id="ausencia_horas">
            </div>            
        </div> 
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label">FECHA CREACION AUSENCIA</label>
        <input type="text" class="form-control" id="ausencia_fecha_creacion">
        </div>               
        </div>
    </div>  
    <div class="row"> 

        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label"> ESTADO AUSENCIA</label>
        <input type="text" class="form-control" id="ausencia_estado">
        </div>
        </div> 
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label"> RESPONSABLE ATH AUSENCIA </label>
        <input type="text" class="form-control" id="ausencia_responsable_ath">
        </div>               
        </div>
        </div>
        <div class="row"> 
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label"> OBSERVACIONES ASUENCIA </label>
        <input type="text" class="form-control" id="ausencia_observaciones">
        </div>
        </div>  
        <div class="col-lg-6">
        <div class="form-group">
        <label for="" class="col-form-label"> AUSENCIA SIN SOPORTE</label>
        <input type="text" class="form-control" id="ausencia_sin_soporte">
        </div>
        </div> 
        </div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-dismiss="modal">CANCELAR</button>
    <button type="submit" id="btnGuardar" class="btn btn-dark">GUARDAR</button>
</div>  
</div>
   </form>  
        </div>
    </div>
</div>  



<?php require_once "vistas/parte_inferior.php"?>
<script src="main/main2.js"></script> 