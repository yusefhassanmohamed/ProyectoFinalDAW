<?php include 'views/partials/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col text-center"><h3><b>GESTOR: <?php echo $data["usuario"]["nombre"].' '.$data["usuario"]["apellidos"]; ?></b></h3>  </div>
    </div>
    <div class="row">
        <div class="col text-center"><h5><a href="index.php?c=Usuario&a=modificar&id=<?php echo $data["usuario"]["idusuario"]; ?>"><i class="fas fa-edit m-2 p-2">Modificar</i></a></h5></div>
        <div class="col text-center"><h5><a data-bs-toggle="modal" data-bs-target="#confirmUsuario"><i class="fas fa-trash-alt m-2 p-2">Eliminar</i></a></h5></div>
        
        <div class="modal fade" id="confirmUsuario" tabindex="-1" aria-labelledby="eliminarUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark third-text">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="eliminarUsuarioModalLabel"><b>Atención</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Se eliminarán los datos del gestor con ID "<?php echo $data["gestor"]["idgestor"]; ?>".</p>
                        <p>¿Continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-button" data-bs-dismiss="modal">No</button>
                        <a href="index.php?c=Usuario&a=eliminar&id=<?php echo $data["usuario"]["idusuario"]; ?>" class="btn primary-button">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col"><h4>Datos personales</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Nombre: </b><?php echo $data["usuario"]["nombre"]; ?></div>
        <div class="col-md mb-2 campo"><b>Apellidos: </b><?php echo $data["usuario"]["apellidos"]; ?></div>
        <div class="col-md mb-2 campo"><b>DNI: </b><?php echo $data["usuario"]["dni"]; ?></div>
    </div>
    <div class="row">
        <div class="col"><h4>Datos de técnico</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Usuario: </b><?php echo $data["usuario"]["username"]; ?></div>
        <div class="col-md mb-2 campo"><b>ID Gestor: </b><?php echo $data["gestor"]["idgestor"];  ?></div><!-- AQUI EL ID -->
        <div class="col-md mb-2 campo"><b>Nº Sucursal: </b><?php echo $data["gestor"]["numero_sucursal"]; ?></div><!-- AQUI EL Nº SUCURSAL -->
    </div>
    <div class="row">
        <div class="col"><h4>Datos de contacto</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Email: </b><?php echo $data["usuario"]["email"]; ?></div>
        <div class="col-md mb-2 campo"><b>Telefono: </b><?php echo $data["usuario"]["telefono"]; ?></div>
    </div>
    
    
</div>
<?php include 'views/partials/footer.php' ?>
