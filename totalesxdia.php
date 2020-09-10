<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>TABLA #6</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT tXd_id, date , msb_d, msm_d, ti_d,dc_d,sc_d,telTra_d,ofi_d,reu_d,perLab_d,pub_d,par_d,bic_d,aTra_d FROM totalesxdia";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

  <body> 
     <header>
      <h1 class="text-center text-info ">PROYECTO ALEXIS</h1>
         <h2 class="text-center text-dark">BASE DE DATOS <span class="badge badge-warning">TOTALES X DÍA</span></h2> 
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
                <table id="tabladatos7" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>  
                                    <th>ID TOTALESXDÍA</th>
                                    <th>FECHA</th>
                                    <th>msb_d</th>
                                    <th>msm_d</th>
                                    <th>ti_d</th>
                                    <th>dc_d</th>
                                    <th>sc_d</th>
                                    <th>telTra_d</th>
                                    <th>ofi_d</th>
                                    <th>reu_d</th>
                                    <th>perLab_d</th>
                                    <th>pub_d</th>
                                    <th>par_d</th>
                                    <th>bic_d</th>
                                    <th>aTra_d</th>
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
        <form id="formUsuarios7">    
            <div class="modal-body">
                <div class="row">
            
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">FECHA</label>
                    <input type="text" class="form-control" id="date">
                    </div> 
                    </div>    
                        <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">msb_d</label>
                    <input type="text" class="form-control" id="msb_d">
                    </div>               
                    </div>
                </div>
                <div class="row"> 
                
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">msm_d</label>
                    <input type="text" class="form-control" id="msm_d">
                    </div>
                    </div>  
                       <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ti_d</label>
                    <input type="text" class="form-control" id="ti_d">
                    </div>               
                    </div>
                </div>

                <div class="row"> 
                 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">dc_d</label>
                    <input type="text" class="form-control" id="dc_d">
                    </div>
                    </div>  
                      <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">sc_d</label>
                    <input type="text" class="form-control" id="sc_d">
                    </div>               
                    </div>
                </div>
                <div class="row"> 
                  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">  telTra_d</label>
                    <input type="text" class="form-control" id="telTra_d">
                    </div>
                    </div>  
                      <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">reu_d</label>
                    <input type="text" class="form-control" id="reu_d">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">ofi_d</label>
                    <input type="text" class="form-control" id="ofi_d">
                    </div>               
                    </div>
                      <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">perLab_d</label>
                    <input type="text" class="form-control" id="perLab_d">
                    </div>               
                    </div>
                </div>
                 <div class="row"> 
                
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">pub_d</label>
                    <input type="text" class="form-control" id="pub_d">
                    </div>
                    </div>  
                      <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">par_d</label>
                    <input type="text" class="form-control" id="par_d">
                    </div>               
                    </div>
                </div>
         
                 <div class="row"> 
                  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">bic_d</label>
                    <input type="text" class="form-control" id="bic_d">
                    </div>
                    </div>  
               
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">aTra_dL</label>
                    <input type="text" class="form-control" id="aTra_d">
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
<script type="text/javascript" src="main/main7.js"></script>