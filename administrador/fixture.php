<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("template/header.php") ?>
    <main class="container">
        <?php

        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $disciplina = (isset($_POST['disciplina'])) ? $_POST['disciplina'] : "";
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
        $hora = (isset($_POST['hora'])) ? $_POST['hora'] : "";
        $lugar = (isset($_POST['lugar'])) ? $_POST['lugar'] : "";
        $instancia = (isset($_POST['instancia'])) ? $_POST['instancia'] : "";
        $departamental1 = (isset($_POST['departamental1'])) ? $_POST['departamental1'] : "";
        $departamental2 = (isset($_POST['departamental2'])) ? $_POST['departamental2'] : "";
        $visible = isset($_POST["visible"]) ? 1 : 0;
        $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

        ?>
        <div class="container mt-5">
            <div class="row col-sm-12 d-md-flex d-sm-flex flex-sm-column flex-xs-column flex-md-row">
                <div class="col-sm col-md-6 col-xl-4 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
                    <div class="card d-flex mb-4">
                        <div class="card-header rounded-0">
                            <div class="container-sm text-center pt-2 ">
                                <h2 style="text-align:center; font-size:larger">CARGAR DATOS AL FIXTURE</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-4">
                                    <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" id="txtID" name="txtID">
                                    <div class="form-group mb-4">
                                        <input type="date" required value="<?php echo $fecha; ?>" <?php echo ($accion == "seleccionar") ? "disabled" : "" ?> class="form-control" id="fecha" name="fecha" placeholder="Ingrese fecha">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="time" required value="<?php echo $hora; ?>" <?php echo ($accion == "seleccionar") ? "disabled" : "" ?> class="form-control" id="hora" name="hora" placeholder="Ingrese hora">
                                    </div>
                                    <?php
                                    try {
                                        include("config/conexion.php");
                                        $sql = $conexion->prepare("SELECT * FROM lugares");
                                        $sql->execute();
                                        $listarLugares = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <div class="from-group mb-4">
                                            <select id="lugar" name="lugar" class="form-select" aria-label="Default select example">
                                                <option selected>Seleccione un Lugar</option>
                                                <?php foreach ($listarLugares as $dato) { ?>
                                                    <option value="<?php echo $dato['lugar']; ?>"><?php echo $dato['lugar']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    <?php
                                    } catch (Exception $e) {
                                        echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
                                    }
                                    ?>
                                    <?php
                                    try {
                                        include("config/conexion.php");
                                        $sql = $conexion->prepare("SELECT * FROM disciplinas");
                                        $sql->execute();
                                        $listarDisciplinas = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <div class="from-group mb-4">
                                            <select id="disciplina" name="disciplina" class="form-select" aria-label="Default select example">
                                                <option selected>Seleccione Disciplina</option>
                                                <?php foreach ($listarDisciplinas as $dato) { ?>
                                                    <option value="<?php echo $dato['nombre_disciplina']; ?>"><?php echo $dato['nombre_disciplina']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    <?php
                                    } catch (Exception $e) {
                                        echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
                                    }
                                    ?>
                                    <div class="from-group mb-4">
                                        <select id="instancia" name="instancia" class="form-select" aria-label="Default select example">
                                            <option selected>Seleccione la Instancia</option>
                                            <option value="Clasificación">Clasifición</option>
                                            <option value="Octavos de final">Osctavos de final</option>
                                            <option value="Cuartos de final">Cuartos de final</option>
                                            <option value="Semifinal">Semifinal</option>
                                            <option value="Final">Final</option>
                                            <option value="No aplica">No aplica</option>
                                        </select>
                                    </div>
                                    <?php
                                    try {
                                        include("config/conexion.php");
                                        $sql = $conexion->prepare("SELECT * FROM departamentales ORDER BY nombre_departamental ASC");
                                        $sql->execute();
                                        $listarDepartamentales = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <div class="from-group mb-4">
                                            <select id="departamental1" name="departamental1" class="form-select" aria-label="Default select example">
                                                <option selected>Seleccione Departamental</option>
                                                <?php foreach ($listarDepartamentales as $dato) { ?>
                                                    <option value="<?php echo $dato['nombre_departamental']; ?>"><?php echo $dato['nombre_departamental']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    <?php
                                    } catch (Exception $e) {
                                        echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
                                    }
                                    ?>
                                    <?php
                                    try {
                                        include("config/conexion.php");
                                        $sql = $conexion->prepare("SELECT * FROM departamentales ORDER BY nombre_departamental ASC");
                                        $sql->execute();
                                        $listarDepartamentales2 = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <div class="from-group mb-4">
                                            <select id="departamental2" name="departamental2" class="form-select" aria-label="Default select example">
                                                <option selected>Seleccione Departamental 2</option>
                                                <?php foreach ($listarDepartamentales2 as $dato) { ?>
                                                    <option value="<?php echo $dato['nombre_departamental']; ?>"><?php echo $dato['nombre_departamental']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    <?php
                                    } catch (Exception $e) {
                                        echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
                                    }
                                    ?>

                                    <div>
                                        <div class="form-check form-switch mb-4">
                                            <input class="form-check-input" type="checkbox" role="switch" id="visible" name="visible">
                                            <label class="form-check-label" for="ganador2">Visible en el Fixture</label>
                                        </div>
                                    </div>

                                    <div role="group" aria-label="">
                                        <button type="submit" class="btn btn-success rounded-pill" value="agregar" name="accion" <?php echo ($accion == "seleccionar") ? "disabled" : "" ?> style="margin-right: 20px;">AGREGAR</button>
                                    </div>
                                    <div class="col-sm-12 mt-3 mb-3">
                                        <?php

                                        include("config/conexion.php");

                                        switch ($accion) {

                                            case "agregar":

                                                $sql = $conexion->prepare("INSERT INTO fixture (fecha, hora, lugar, instancia, disciplina, departamental1, departamental2, visible) 
                                                VALUES (:fecha, :hora, :lugar, :instancia, :disciplina , :departamental1, :departamental2, :visible);");
                                                $sql->bindParam(':fecha', $fecha);
                                                $sql->bindParam(':hora', $hora);
                                                $sql->bindParam(':lugar', $lugar);
                                                $sql->bindParam(':instancia', $instancia);
                                                $sql->bindParam(':disciplina', $disciplina);
                                                $sql->bindParam(':departamental1', $departamental1);
                                                $sql->bindParam(':departamental2', $departamental2);
                                                $sql->bindParam(':visible', $visible);
                                                $sql->execute();

                                                echo <<<EOT
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Evento agregado correctamente.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            EOT;
                                                break;

                                            case "cancelar":
                                                break;
                                            case "eliminar":

                                                $sql = $conexion->prepare("DELETE FROM fixture WHERE id = :id");
                                                $sql->bindParam(':id', $txtID);
                                                $sql->execute();
                                                echo <<<EOT
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Evento eliminado correctamente.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    EOT;
                                                break;
                                        }

                                        // listado de novedades

                                        $sql = $conexion->prepare("SELECT * FROM fixture ORDER BY id DESC");
                                        $sql->execute();
                                        $listarFixture = $sql->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-xl-8 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
                    <table class="table table-responsive table-bordered mb-4">
                        <thead class="card-header rounded-0">
                            <tr align="center">
                                <th hidden>ID</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Lugares</th>
                                <th>Instancia</th>
                                <th>Disciplina</th>
                                <th>Departamental_1</th>
                                <th>Departamental_2</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($listarFixture)) {
                                echo <<<EOT
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    No existen Resultados
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                EOT;
                            } else {
                                foreach ($listarFixture as $dato) { ?>
                                    <tr>
                                        <td hidden><?php echo $dato['id'] ?></td>
                                        <td>
                                            <?php
                                            $fecha = $dato['fecha'];
                                            $nuevaFecha = date("d/m/Y", strtotime($fecha));
                                            echo $nuevaFecha;
                                            ?>
                                        </td>
                                        <td><?php
                                            $hora = $dato['hora'];
                                            $nuevaHora = date("H:i", strtotime($hora));
                                            echo $nuevaHora
                                            ?>
                                        </td>
                                        <td><?php echo $dato['lugar'] ?></td>
                                        <td><?php echo $dato['instancia'] ?></td>
                                        <td><?php echo $dato['disciplina'] ?></td>
                                        <td><?php echo $dato['departamental1'] ?></td>
                                        <td><?php echo $dato['departamental2'] ?></td>
                                        <td>
                                            <form method="post" class="container">
                                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $dato['id'] ?>">

                                                <button type="submit" value="eliminar" name="accion" style="border: none; background: none;">
                                                    <i class="fa-solid fa-trash" style="color: #303030;"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../public/js/check.js"></script>
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