<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #3</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT rechazoinc_id, rechazoinc_arg, rechazoinc_fecha, usuario_id FROM rechazo_incapacidad";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">RECHAZO INCAPACIDAD</span></h2> 
     </header> 
      <div class="container">
        <div class="row">
            <div class="col-lg-12" >            
            <!-- Amiriqbalmcs Code Start -->
                <!-- Button to Open the Modal -->
                <?php if(!isset($_SESSION['is_logged_in'])){ ?>
                <style>.btnEditar,.btnBorrar,#btnNuevo{display: none;}</style>
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
                <table id="tabladatos4" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                                    <th>ID RECHAZO INCAPACIDAD</th>
                                    <th>ARGUMENTO</th>
                                    <th>FECHA</th>
                                    <th>ID USUARIO</th>
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
        <form id="formUsuarios4">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">ARGUMENTO</label>
                    <input type="text" class="form-control" id="rechazoinc_arg">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA</label>
                    <input type="text" class="form-control" id="rechazoinc_fecha">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ID USUARIO</label>
                    <input type="text" class="form-control" id="usuario_id">
                    </div>
                    </div>  
                </div>      
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
 

<?php require_once "vistas/parte_inferior.php"?>
<script type="text/javascript" src="main/main4.js"></script> 