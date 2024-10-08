<?php

session_start();

if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {

    include('config/conexion.php');

    $sql = $conexion->prepare('SELECT usuario,clave FROM usuarios WHERE usuario = :usuario');
    $sql->bindParam(':usuario', $_POST['usuario']);
    $sql->execute();
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    if (isset($resultado['usuario']) && password_verify($_POST['clave'], $resultado['clave'])) {
        $_SESSION['usuario'] = $resultado['usuario'];

        // insersión del momento del acceso

        $fecha = new DateTime();
        $nuevaFecha = $fecha->format('d/m/Y g:i A');
        $sql = $conexion->prepare("INSERT INTO accesos (usuario, fecha_sesion) VALUES (:usuario, :fecha_sesion);");
        $sql->bindParam(':usuario', $_POST['usuario']);
        $sql->bindParam(':fecha_sesion', $nuevaFecha);
        $sql->execute();
        //ob_start();
        header('Location: home.php');
        die;
        //ob_end_flush();
    } else {
        $mensaje_negativo = "
            <div class='alert alert-danger' role='alert'>
                No se puede iniciar sesión, el usuario o clave no existe
            </div>";
        //echo $mensaje_negativo;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>LOGIN // FIXTURE AJB</title>
</head>

<body class="fondo">
    <main class="container containerLogin">
        <div class="card card-login rounded-4 " data-aos="flip-left">
            <div class="card-header">
                <div class="container-sm text-center pt-2 pb-2">
                    <h2 style="text-align:center; font-size:larger; color: var(--title-color);">INICIA SESIÓN</h2>
                </div>
            </div>
            <div class="card-body">
                <div class=" col-sm-12 col-md-12 d-flex justify-content-center align-self-center me-2">
                    <img src="../public/img/logo/logoAJB.png" id="logoAdmin" alt="logo" class="img-fluid">
                </div>
                <form method="POST" class="container-sm-fluid text-center">
                    <div class="input-group mb-4">
                        <span class="input-group-text input-group-lg" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" aria-label="usuario" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text input-group-lg" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="clave" placeholder="Clave" aria-label="clave" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="boton-Login form-control btn rounded-pill btn-lg" name="accion" value="login">INICIAR SESIÓN</button>
                    </div>
                    <div class="mb-4">
                        <div class="mb-3 mt-3">
                            <?php if (isset($mensaje_negativo)) {
                                echo $mensaje_negativo;
                            }
                            /*
                            include('config/conexion.php');

                            if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
                                $sql = $conexion->prepare('SELECT usuario,clave FROM usuarios WHERE usuario = :usuario');
                                $sql->bindParam(':usuario', $_POST['usuario']);
                                $sql->execute();
                                $resultado = $sql->fetch(PDO::FETCH_ASSOC);
                                if (isset($resultado['usuario']) && password_verify($_POST['clave'], $resultado['clave'])) {
                                    $_SESSION['usuario'] = $resultado['usuario'];

                                    // insersión del momento del acceso

                                    $fecha = new DateTime();
                                    $nuevaFecha = $fecha->format('d/m/Y g:i A');
                                    $sql = $conexion->prepare("INSERT INTO accesos (usuario, fecha_sesion) VALUES (:usuario, :fecha_sesion);");
                                    $sql->bindParam(':usuario', $_POST['usuario']);
                                    $sql->bindParam(':fecha_sesion', $nuevaFecha);
                                    $sql->execute();
                                    //ob_start();
                                    header('Location: home.php');
                                    //ob_end_flush();
                                } else {
                                    $mensaje_negativo = "
                                        <div class='alert alert-danger' role='alert'>
                                            No se puede iniciar sesión, el usuario o clave no existe
                                        </div>";
                                    echo $mensaje_negativo;
                                }
                            }
                            */
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script>
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(
                function() {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function() {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>


</html>