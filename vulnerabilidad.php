<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #11</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT vulnerabilidad_id, usuario_id, mayor60, enfermedadRenal, enfermedadPulmonar, asma, hipertensionArterial, enfermedadCardiaca, sistemaInmunitario,obesidad, diabetes,enfermedadHepatica,tabaquismo,fallaRespiratorio,transplantes, cancer, embarazo,aceptoTerminos, aceptoTerminosFecha FROM vulnerabilidad";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">VULNERABILIDAD</span></h2> 
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
                <table id="tabladatos12" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
    
                        <th> ID VULNERABILIDAD</th>
                        <th>ID USUARIO</th>
                        <th>MAYOR DE 60</th>
                         <th>ENFERMEDAD RENAL</th>
                        <th>ENFERMEDAD PULMONAR</th>
                         <th>ASMA</th>
                         <th>HIPERTENSIÓN ARTERIAL</th>
                        <th>ENFERMEDAD CARDÍACA</th>
                         <th>SISTEMA INMUNITARIO</th>
                        <th>OBESIDAD</th>
                        <th>DIABETES</th>
                         <th>ENFERMEDAD HÉPATICA</th>
                        <th>TABAQUISMO</th>
                        <th>FALLA RESPIRATORIA</th>
                        <th>TRANSPLANTES</th>
                        <th>CÁNCER</th>
                        <th>EMBARAZO</th>
                        <th>ACEPTO TÉRMINOS</th>
                        <th>FECHA DE ACPTACIÓN</th>
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
        <form id="formUsuarios12">    
            <div class="modal-body">
                <div class="row">
         
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> ID USUARIO</label>
                    <input type="text" class="form-control" id="usuario_id">
                    </div> 
                    </div>    
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">MAYOR DE 60</label>
                    <input type="text" class="form-control" id="mayor60">
                    </div>               
                    </div> </div>
                <div class="row"> 
               
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ENFERMEDAD RENAL</label>
                    <input type="text" class="form-control" id="enfermedadRenal">
                    </div>
                    </div>  
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"> ENFERMEDAD PULMONAR </label>
                    <input type="text" class="form-control" id="enfermedadPulmonar">
                    </div>               
                    </div>  </div>
                <div class="row"> 
                
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ASMA </label>
                    <input type="text" class="form-control" id="asma">
                    </div>
                    </div>  
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">HIPERTENSIÓN ARTERIAL </label>
                    <input type="text" class="form-control" id="hipertensionArterial">
                    </div>               
                    </div> </div>
                <div class="row"> 
                 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ENFERMEDAD CARDÍACA</label>
                    <input type="text" class="form-control" id="enfermedadCardiaca">
                    </div>
                    </div>  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">  SISTEMA INMUNITARIO</label>
                    <input type="text" class="form-control" id="sistemaInmunitario">
                    </div>               
                    </div> </div>
                <div class="row"> 
               
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">OBESIDAD</label>
                    <input type="text" class="form-control" id="obesidad">
                    </div>
                    </div>  
                   <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DIABETES</label>
                    <input type="text" class="form-control" id="diabetes">
                    </div>               
                    </div> </div>
                 <div class="row"> 
                
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ENFERMEDAD HÉPATICA</label>
                    <input type="text" class="form-control" id="enfermedadHepatica">
                    </div>
                    </div>  
                   <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TABAQUISMO</label>
                    <input type="text" class="form-control" id="tabaquismo">
                    </div>               
                    </div>  </div>
                 <div class="row"> 
               
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FALLA RESPIRATORIA</label>
                    <input type="text" class="form-control" id="fallaRespiratorio">
                    </div>
                    </div>  
                   <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TRANSPLANTES</label>
                    <input type="text" class="form-control" id="transplantes">
                    </div>               
                    </div>  </div>
                 <div class="row"> 
               
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CÁNCER</label>
                    <input type="text" class="form-control" id="cancer">
                    </div>
                    </div>  
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">EMBARAZO</label>
                    <input type="text" class="form-control" id="embarazo">
                    </div>               
                    </div>  </div>
                 <div class="row"> 
                
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ACEPTO TÉRMINOS</label>
                    <input type="text" class="form-control" id="aceptoTerminos">
                    </div>
                    </div>  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA DE ACEPTACIÓN </label>
                    <input type="text" class="form-control" id="aceptoTerminosFecha">
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
<script type="text/javascript" src="main/main12.js"></script>