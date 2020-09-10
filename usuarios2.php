<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #10</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT usuario_id,usuario_nombre, usuario_password, usuario_estado_registro, usuario_apellido, usuario_tipo_documento, usuario_documento, usuario_cargo, usuario_empresa, usuario_foto, usuario_responsable_ath_id, usuario_celular, usuario_email, usuario_estado_ausencia, usuario_salario_ausencia, usuario_salario_mensual, usuario_rol FROM usuarios";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">USUARIOS</span></h2> 
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
                <table id="tabladatos11" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                                   
                                    <th>ID USUARIO</th>
                                    <th>NOMBRE</th>
                                    <th>PASSWORD</th>
                                    <th>ESTADO REGISTRO</th>
                                    <th>APELLIDO</th>
                                     <th>TIPO DE DOCUMENTO</th>
                                     <th>DOCUMENTO</th>
                                    <th>CARGO</th>
                                     <th>EMPRESA</th>
                                     <th>FOTO</th>
                                     <th>ID RESPONSABLE ATH</th>
                                     <th>CELULAR</th>
                                    <th>EMAIL</th>
                                     <th>ESTADO AUSENCIA</th>
                                    <th>SALARIO MENSUAL</th>
                                     <th>ROL</th>
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
        <form id="formUsuarios11">    
            <div class="modal-body">
                <div class="row">
        
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">NOMBRE</label>
                    <input type="text" class="form-control" id="usuario_nombre">
                    </div> 
                    </div>     <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ESTADO DE REGISTRO</label>
                    <input type="text" class="form-control" id="usuario_estado_registro">
                    </div>
                    </div>  
                    </div>
                <div class="row"> 
              <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">PASSWORD </label>
                    <input type="text" class="form-control" id="cedulausuario_password">
                    </div>               
                    </div>    </div>
                <div class="row"> 
                  
                   
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">APELLIDO</label>
                    <input type="text" class="form-control" id="usuario_apellido">
                    </div>               
                    </div>  
                   <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TIPO DOCUMENTO</label>
                    <input type="text" class="form-control" id="usuario_tipo_documento">
                    </div>
                    </div>  
                </div>
                <div class="row">  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DOCUMENTO</label>
                    <input type="text" class="form-control" id="usuario_documento">
                    </div>               
                    </div>
                   <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CARGO</label>
                    <input type="text" class="form-control" id="usuario_cargo">
                    </div>
                    </div>  
                </div>
                <div class="row">  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> EMPRESA</label>
                    <input type="text" class="form-control" id="usuario_empresa">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> FOTO</label>
                    <input type="text" class="form-control" id="usuario_foto">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ID RESPONSABLE ATH</label>
                    <input type="text" class="form-control" id="usuario_responsable_ath_id">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CELULAR</label>
                    <input type="text" class="form-control" id="usuario_celular">
                    </div>
                    </div> 
                </div>

                 <div class="row">  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">EMAIL</label>
                    <input type="text" class="form-control" id="usuario_email">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> ESTADO AUSENCIA</label>
                    <input type="text" class="form-control" id="usuario_estado_ausencia">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">SALARIO MENSUAL</label>
                    <input type="text" class="form-control" id="usuario_salario_mensual">
                    </div>
                    </div>  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ROL</label>
                    <input type="text" class="form-control" id="usuario_rol">
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
<script type="text/javascript" src="main/main11.js"></script>