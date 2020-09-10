<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #2</h1>
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT incapacidad_id, incapacidad_ausencia_id, usuario_id, incapacidad_estado, incapacidad_tipo_ausencia, incapacidad_diagnostico, incapacidad_entidad, incapacidad_compania, incapacidad_codigocie, incapacidad_perdidalaboral, incapacidad_medico_nombre, incapacidad_medico_codigo, incapacidad_responsable, incapacidad_responsable_ath_analista, incapacidad_responsable_ath_gerente, incapacidad_comentarios  FROM incapacidad";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">INCAPACIDAD</span></h2> 
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
                <table id="tabladatos3" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                                    <th>ID INCAPACIDAD</th>
                                    <th> ID AUSENCIA </th>
                                    <th> ID USUARIO</th>
                                    <th>ESTADO INCAPACIDAD</th>
                                    <th> TIPO DE AUSENCIA</th>
                                    <th> DIAGNÓSTICO</th>
                                    <th>ENTIDAD</th>
                                    <th>COMPAÑIA</th>
                                    <th> CODIGO CIE </th>
                                    <th> PÉRDIDA LABORAL</th>
                                    <th>NOMBRE MÉDICO </th>
                                    <th>CÓDIGO MÉDICO</th>
                                    <th>RESPONSABLE </th>
                                    <th>RESPONSABLE ATH ANALISTA</th>
                                    <th>RESPONSABLE ATH GERENTE </th>
                                    <th>COMENTARIOS </th>
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
        <form id="formUsuarios3">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ID AUSENCIA</label>
                    <input type="text" class="form-control" id="incapacidad_ausencia_id">
                    </div> 
                    </div>    
                 <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ID USUARIO</label>
                    <input type="text" class="form-control" id="usuario_id">
                    </div>               
                    </div>
                     </div>
                <div class="row"> 
                  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ESTADO INCAPACIDAD</label>
                    <input type="text" class="form-control" id="incapacidad_estado">
                    </div>
                    </div>  
                     <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TIPO DE AUSENCIA</label>
                    <input type="text" class="form-control" id="incapacidad_tipo_ausencia">
                    </div>               
                    </div>
                </div>
                <div class="row"> 
                   
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DIAGNÓSTICO</label>
                    <input type="text" class="form-control" id="incapacidad_diagnostico">
                    </div>
                    </div>  
                     <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ENTIDAD</label>
                    <input type="text" class="form-control" id="incapacidad_entidad">
                    </div>               
                    </div>
                </div>
                <div class="row"> 
                   
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">COMPAÑIA</label>
                    <input type="text" class="form-control" id="incapacidad_compania">
                    </div>
                    </div>  
                      <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CÓDIGO CIE</label>
                    <input type="text" class="form-control" id="incapacidad_codigocie">
                    </div>               
                    </div>
                </div>
                <div class="row"> 
                  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">PÉRDIDA LABORAL</label>
                    <input type="text" class="form-control" id="incapacidad_perdidalaboral">
                    </div>
                    </div>  
                      <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> NOMBRE MÉDICO</label>
                    <input type="text" class="form-control" id="incapacidad_medico_nombre">
                    </div>               
                    </div>
                </div>
                 <div class="row"> 
                  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CÓDIGO MÉDICO</label>
                    <input type="text" class="form-control" id="sincapacidad_medico_codigo">
                    </div>
                    </div>  
                     <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> RESPONSABLE</label>
                    <input type="text" class="form-control" id="incapacidad_responsable">
                    </div>               
                    </div>
                </div>
                 <div class="row"> 
                   
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">RESPONSABLE ATH ANALISTA</label>
                    <input type="text" class="form-control" id="incapacidad_responsable_ath_analista">
                    </div>
                    </div>  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">RESPONSABLE ATH GERENTE</label>
                    <input type="text" class="form-control" id="incapacidad_responsable_ath_gerente">
                    </div>               
                    </div> 
                </div>
                 <div class="row"> 
                   
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">COMENTARIOS</label>
                    <input type="text" class="form-control" id="incapacidad_comentarios ">
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
      ->

<?php require_once "vistas/parte_inferior.php"?>
<script type="text/javascript" src="main/main3.js"></script> 