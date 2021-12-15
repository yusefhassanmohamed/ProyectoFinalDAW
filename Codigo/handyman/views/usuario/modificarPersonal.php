<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Modificar usuario</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Usuario&a=modificarPersonal&id=<?php echo $data['usuario']['idusuario']; ?>">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $data['usuario']['nombre']; ?>"/>
                            </div>
                            <div class="mb-4">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $data['usuario']['apellidos']; ?>"/>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $data['usuario']['email']; ?>"/>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $data['usuario']['password']; ?>"/>
                                <p id="error_password" class="oculto error">Contraseña de 8 caracteres mínimo</p>
                            </div>
                            <div class="mb-4">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $data['usuario']['telefono']; ?>"/>
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
    <?php include 'views/partials/footer.php' ?>