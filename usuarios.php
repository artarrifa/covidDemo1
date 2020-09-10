<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #9</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT fecha,mes,cedula,datosDelTrabjador, razonSocial,empresaUsuario,entidad,tipo,codigoDiagnostico,descripcion, sistemaAfectado,fechaInicial,fechaFinal,totalDias,lugarDeTrabajo,salario,recobro FROM usuarios";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">AUSENTISMO</span></h2> 
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
                <table id="tabladatos10" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                                    <th>REGISTRO NO.</th>
                                    <th>FECHA</th>
                                    <th>MES</th>
                                    <th>CÉDULA</th>
                                    <th>DATOS DEL TRABAJADOR</th>
                                    <th>FECHA INGRESO</th>
                                    <th>RAZÓN SOCIAL</th>
                                    <th>EMPRESA USUARIA</th>
                                    <th>ENTIDAD</th>
                                    <th>TIPO</th>
                                    <th>CÓDIGO DIAGNÓSTICO</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>SISTEMA AFECTADO</th>
                                    <th>FECHA INICIAL</th>
                                    <th>FECHA FINAL</th>
                                    <th>TOTAL DÍAS</th>
                                    <th>LUGAR DE TRABAJO</th>
                                    <th>SALARIO</th>
                                    <th>RECOBRO</th>
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
        <form id="formUsuarios10">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA</label>
                    <input type="text" class="form-control" id="fecha">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">MES</label>
                    <input type="text" class="form-control" id="mes">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CÉDULA</label>
                    <input type="text" class="form-control" id="cedula">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DATOS DEL TRABAJADOR</label>
                    <input type="text" class="form-control" id="datosDelTrabajador">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA INGRESO</label>
                    <input type="text" class="form-control" id="fechaIngreso">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">RAZÓN SOCIAL</label>
                    <input type="text" class="form-control" id="razonSocial">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">EMPRESA USUARIA</label>
                    <input type="text" class="form-control" id="empresaUsuaria">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ENTIDAD</label>
                    <input type="text" class="form-control" id="entidad">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TIPO</label>
                    <input type="text" class="form-control" id="tipo">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CÓDIGO DIAGNÓSTICO</label>
                    <input type="text" class="form-control" id="codigoDiagnostico">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DESCRIPCIÓN</label>
                    <input type="text" class="form-control" id="descripcion">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">SISTEMA AFECTADO</label>
                    <input type="text" class="form-control" id="sistemaAfectado">
                    </div>
                    </div>  
                </div>
         
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA INICIAL</label>
                    <input type="text" class="form-control" id="fechaInicial">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA FINAL</label>
                    <input type="text" class="form-control" id="fechaFinal">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">TOTAL DÍAS</label>
                    <input type="text" class="form-control" id="totalDias">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">LUGAR DE TRABAJO</label>
                    <input type="text" class="form-control" id="lugarDeTrabajo">
                    </div>
                    </div>  
                </div>
                 <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">SALARIO</label>
                    <input type="text" class="form-control" id="salario">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">RECOBRO</label>
                    <input type="text" class="form-control" id="recobro">
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
<script type="text/javascript" src="main/main10.js"></script>