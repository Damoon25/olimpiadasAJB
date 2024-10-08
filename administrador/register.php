<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body class="fondo">
    <main class="container containerLogin">
        <div class="card card-login rounded-4 " data-aos="flip-left">
            <div class="card-header">
                <div class="container-sm text-center pt-2 pb-2">
                    <h2 style="text-align:center; font-size:larger;color: var(--text)">CREA TU CUENTA</h2>
                </div>
            </div>
            <div class="card-body">
                <div class=" col-sm-12 col-md-12 d-flex justify-content-center align-self-center me-2">
                    <img src="../public/img/logo/logoAJB.png" id="logoAdmin" alt="logo" class="img-fluid p-4">
                </div>
                <form method="POST" class="container-sm-fluid text-center">
                    <input type="hidden" value="NO" class="form-control" id="confirmado" name="confirmado">
                    <div class="input-group mb-4">
                        <span class="input-group-text input-group-lg" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario" aria-label="usuario" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text input-group-lg" id="basic-addon2"><i class="fas fa-envelope" aria-hidden="true"></i></span>
                        <input type="email" class="form-control" placeholder="E-Mail" name="email" aria-label="email" aria-describedby="basic-addon2" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text input-group-lg" id="basic-addon3"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" placeholder="Clave" name="clave" aria-label="clave" aria-describedby="basic-addon3" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="boton-Login form-control btn btn-primary rounded-pill btn-lg" name="accion" value="register">REGISTRARSE</button>
                        <div class="mt-3 mb-3">
                            <?php

                            include('config/conexion.php');

                            $mensaje = '';

                            if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
                                $sql = "INSERT INTO usuarios (usuario, clave, email, confirmado) VALUES (:usuario, :clave, :email, :confirmado)";
                                $stmt = $conexion->prepare($sql);
                                $stmt->bindParam(':usuario', $_POST['usuario']);
                                $stmt->bindParam(':email', $_POST['email']);
                                $stmt->bindParam(':confirmado', $_POST['confirmado']);
                                $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
                                $stmt->bindParam(':clave', $clave);

                                // verificación

                                $verificacion = $conexion->prepare("SELECT usuario FROM usuarios WHERE usuario = :usuario");
                                $verificacion->bindParam(':usuario', $_POST['usuario']);
                                $verificacion->execute();
                                $resultado = $verificacion->fetch(PDO::FETCH_LAZY);

                                if ($resultado) {
                                    echo <<<EOT
                                    <div class="alert alert-danger" role="alert">
                                        El usuario ya existe, por favor intente con otras credenciales.
                                    </div>
                                    EOT;
                                } else {
                                    if ($stmt->execute()) {
                                        echo <<<EOT
                                        <div class="alert alert-success" role="alert">
                                            Cuenta creada con exito!.
                                        </div>
                                        EOT;
                                        header('Location: login.php');
                                    } else {
                                        echo <<<EOT
                                        <div class="alert alert-danger" role="alert">
                                            Lo sentimos, debe haber problema al crear la cuenta.
                                        </div>
                                        EOT;
                                    }
                                }
                            }

                            ?>
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="login.php"><button type="button" id="register" class="boton-Register form-control btn btn-primary rounded-pill btn-lg" style="background-color: #ffff;" name="accion" value="login">INICIA SESIÓN</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>


</html>