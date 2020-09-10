<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #4</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT  sintomas_id, usuario_id, date, fatiga, dolorMuscular, escalofrios, dolorDeCabeza, diarrea, dolorDeGarganta, perdidaGusto, nauseas, diagnosticoCovid, sospechaCovid, otraEnfermedad, tengoIncapacidad,alta,normal,sinInformacion,meSientoBien,meSientoMal FROM sintomas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">SINTOMAS</span></h2> 
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
                <table id="tabladatos5" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                                    <th>ID SINTOMAS</th>
                                    <th>ID USUARIO</th>
                                    <th>FECHA</th>
                                    <th>FATIGA</th>
                                    <th>DOLOR MUSCULAR</th>
                                    <th>ESCALOFRIOS</th>
                                    <th>DOLOR DE CABEZA</th>
                                    <th>DIARREA</th>
                                    <th>DOLOR DE GARGANTA</th>
                                    <th>PERDIDA DE GUSTO</th>
                                    <th>NAUSEAS</th>
                                    <th>DIAGNÓSTICO COVID</th>
                                    <th>SOSPECHA COVID</th>
                                    <th>OTRA ENFERMEDAD</th>
                                    <th>TIENE INCAPACIDAD</th>
                                    <th>ALTA </th>
                                    <th>NORMAL</th>
                                    <th>SIN INFORMACIÓN</th>
                                    <th>SE SIENTE BIEN</th>
                                    <th>SE SIENTE MAL</th>
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
        <form id="formUsuarios5">    
            <div class="modal-body">
                <div class="row">
           
                    <div class="col-lg-4">
                    <div class="form-group">
                    <label for="" class="col-form-label">ID USUARIO</label>
                    <input type="text" class="form-control" id="usuario_id">
                    </div> 
                    </div>    
       
                    <div class="col-lg-4">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA</label>
                    <input type="text" class="form-control" id="date">
                    </div>               
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                    <label for="" class="col-form-label">FATIGA</label>
                    <input type="text" class="form-control" id="fatiga">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DOLOR MUSCULAR</label>
                    <input type="text" class="form-control" id="dolorMuscular">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ESCALOFRIOS</label>
                    <input type="text" class="form-control" id="escalofrios">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DOLOR DE CABEZA</label>
                    <input type="text" class="form-control" id="dolorDeCabeza">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> DIARREA </label>
                    <input type="text" class="form-control" id="diarrea">
                    </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DOLOR DE GARGANTA</label>
                    <input type="text" class="form-control" id="dolorDeGarganta">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">PERDIDA DE GUSTO </label>
                    <input type="text" class="form-control" id="perdidaGusto">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">NAUSEAS</label>
                    <input type="text" class="form-control" id="nauseas">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DIAGNÓSTICO COVID</label>
                    <input type="text" class="form-control" id="sdiagnosticoCovid">
                    </div>
                    </div>  
                </div>
         
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> SOSPECHA COVID</label>
                    <input type="text" class="form-control" id="sospechaCovid">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">OTRA ENFERMEDAD</label>
                    <input type="text" class="form-control" id="otraEnfermedad">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TENGO INCAPACIDAD</label>
                    <input type="text" class="form-control" id="tengoIncapacidad">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ALTA</label>
                    <input type="text" class="form-control" id="alta">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">NORMAL</label>
                    <input type="text" class="form-control" id="normal">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">SIN INFORMACIÓN</label>
                    <input type="text" class="form-control" id="sinInformacion">
                    </div>
                    </div>  
                </div>   
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">SE SIENTE BIEN</label>
                    <input type="text" class="form-control" id="meSientoBien">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">SE SIENTE MAL</label>
                    <input type="text" class="form-control" id="meSientoMal">
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
<script type="text/javascript" src="main/main5.js"></script> 