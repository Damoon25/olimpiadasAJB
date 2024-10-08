<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <title>Administrador del Fixture AJB</title>
</head>

<body>
    <main>
        <?php include("template/header.php") ?>
        <div class="jumbotron jumbotron-fluid margenAlto ">
            <div class="container">
                <div class="col-sm-12">
                    <div class="col-xl-6">
                        <h1 class="display-3 tituloAdmin">Bienvenido al administrador del <strong class="fw-bold">Fixture AJB</strong></h1>
                        <p class="lead">Elegí la opción deseada.</p>
                    </div>
                    <hr class="my-2">
                    <div class="col sm 12">
                        <p class="lead">
                            <a class="btnAdmin btn m-3 ms-0" href="fixture.php" role="button">CARGAR FIXTURE</a>
                            <a class="btnAdmin btn m-3 ms-0" href="modificarFixture.php" role="button">MODIFICAR FIXTURE</a>
                            <a class="btnAdmin btn m-3 ms-0" href="departamentales.php" role="button">AGREGAR DEPARTAMENTALES</a>
                            <a class="btnAdmin btn m-3 ms-0" href="disciplinas.php" role="button">AGREGAR DISCIPLINAS</a>
                            <a class="btnAdmin btn m-3 ms-0" href="lugares.php" role="button">AGREGAR LUGARES</a>
                            <a class="btnAdmin btn m-3 ms-0" href="tablaPosiciones.php" role="button">AGREGAR TABLA DE POSICIONES</a>
                        </p>
                    </div>
                </div>
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