<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=login&a=iniciar" id="formulario">
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
                                <input type="checkbox" class="form-check-input" id="mostrar" />
                                <label for="remember" class="form-label">Mostrar</label>
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
    <script src="./views/public/scripts/login.js"></script>
    <?php include 'views/partials/footer.php' ?>