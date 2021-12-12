<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Nuevo Cliente</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Cliente&a=insertar" id="formulario">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" />
                                <p id="error_nombre" class="oculto error">Solo caracteres alfabéticos</p>
                            </div>
                            <div class="mb-4">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" />
                                <p id="error_apellidos" class="oculto error">Solo caracteres alfabéticos</p>
                            </div>
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" />
                                <p id="error_username" class="oculto error">Mínimo 5 caracteres alfanuméricos</p>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" />
                                <p id="error_password" class="oculto error">Contraseña de 8 caracteres mínimo</p>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">email</label>
                                <input type="text" class="form-control" name="email" id="email" />
                                <p id="error_email" class="oculto error">Introduce un email correcto</p>
                            </div>
                            <div class="mb-4">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" />
                                <p id="error_telefono" class="oculto error">Introduce un telefono correcto</p>
                            </div>
                            <div class="mb-4">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" name="dni" id="dni" />
                                <p id="error_dni" class="oculto error">Introduce un dni correcto</p>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn text-light submit">Login</button>
                            </div>
                            <p id="error_formulario" class="oculto error">Rellena los campos correctamente</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./views/public/scripts/nuevoCliente.js"></script>
    <?php include 'views/partials/footer.php' ?>