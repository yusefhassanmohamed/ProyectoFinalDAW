<?php 
    if($_SESSION['rol']!='GESTOR'){
        header('Location: index.php?c=Main');
    } 
?>
<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Nuevo Producto</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Producto&a=insertar&id=<?php echo $id; ?>" id="formulario">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" />
                                <p id="error_nombre" class="oculto error">Solo caracteres alfanuméricos</p>
                            </div>
                            <div class="mb-4">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" name="marca" id="marca" />
                                <p id="error_marca" class="oculto error">Solo caracteres alfanuméricos</p>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn text-light submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./views/public/scripts/nuevoProducto.js"></script>
    <?php include 'views/partials/footer.php' ?>