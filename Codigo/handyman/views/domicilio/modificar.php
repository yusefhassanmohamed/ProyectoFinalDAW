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
                        <h2 class="p-3">Modificar domicilio</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Domicilio&a=modificar&id=<?php echo $data['domicilio']['iddomicilio']; ?>" id="formulario">
                            <div class="mb-4">
                                <label for="calle" class="form-label">Calle</label>
                                <input type="text" class="form-control" name="calle" id="calle" value="<?php echo $data['domicilio']['calle']; ?>"/>
                                <p id="error_calle" class="oculto error">Solo caracteres alfabéticos</p>
                            </div>
                            <div class="mb-4">
                                <label for="numero" class="form-label">Numero</label>
                                <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $data['domicilio']['numero']; ?>"/>
                                <p id="error_numero" class="oculto error">Solo números</p>
                            </div>
                            <div class="mb-4">
                                <label for="piso" class="form-label">Piso</label>
                                <input type="text" class="form-control" name="piso" id="piso" value="<?php echo $data['domicilio']['piso']; ?>"/>
                                <p id="error_piso" class="oculto error">Solo números</p>
                            </div>
                            <div class="mb-4">
                                <label for="puerta" class="form-label">Puerta</label>
                                <input type="text" class="form-control" name="puerta" id="puerta" value="<?php echo $data['domicilio']['puerta']; ?>"/>
                                <p id="error_puerta" class="oculto error">Solo letras</p>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn text-light submit">GUARDAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./views/public/scripts/modificarDomicilio.js"></script>
    <?php include 'views/partials/footer.php' ?>