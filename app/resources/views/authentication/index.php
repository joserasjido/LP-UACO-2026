<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>
    <base href="<?= APP_URL ?>">
    <link rel="stylesheet" href="<?= APP_URL ?>app/assets/libs/bootstrap/css/bootstrap.min.css" />
    <script defer src="<?= APP_URL ?>app/js/authentication/controller.js"></script>
    <style type="text/css">
        html, body{ height: 100%; }
    </style>
</head>

<body data-bs-theme="light" class="bg-body-secondary bg-gradient">
    <main class="h-100 d-flex justify-content-center align-items-center m-0">
        <div class="bg-body bg-gradient text-center border rounded m-0 py-3 px-1 p-sm-3">
            <form id="formAutenticacion" method="post" action="authentication/login">
                <div class="row mb-3">
                    <div class="row m-0">
                        <div class="col-auto">
                            <img src="app/assets/img/logo.jpg" alt="" style="opacity: 0.75;" width="110px">
                        </div>
                        <div class="col-auto d-flex flex-column justify-content-center">
                            <legend class="">Ingreso al Sistema</legend>
                            <p class="text-body-secondary">Sistema de control de materiales en obras.</p>
                        </div>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="datoUsuario" name="user" placeholder="" maxlength="20" minlength="5" required>
                            <label for="datoUsuario">Cuenta</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="datoClave" name="pass" placeholder="" maxlength="20" minlength="5" required>
                            <label for="datoClave">Contraseña</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-11 mx-auto my-4">
                    <button id="btnAutenticarse" type="submit" class="btn btn-primary btn-lg">Autenticarse</button>
                </div>

                <div class="row m-0 text-muted">
                    <div class="col">
                        <p class="my-1"><small>Sistema de Gestión de Inventario - SIPGER - Versión 1.0</small></p>
                        <p class="my-1"><small>Desarrollado por <a href="http://www.innotec.ar" target="_blank">Innotec Sistemas</a></small></p>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>