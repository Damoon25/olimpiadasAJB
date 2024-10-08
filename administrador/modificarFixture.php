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

        $nuevaFecha = ""; // Inicializar $nuevaFecha con un valor vacío por defecto
        $nuevaHora = ""; // Inicializar $nuevaHora con un valor vacío por defecto
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $disciplina = (isset($_POST['disciplina'])) ? $_POST['disciplina'] : "";
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
        $hora = (isset($_POST['hora'])) ? $_POST['hora'] : "";
        $lugar = (isset($_POST['lugar'])) ? $_POST['lugar'] : "";
        $instancia = (isset($_POST['instancia'])) ? $_POST['instancia'] : "";
        $departamental1 = (isset($_POST['departamental1'])) ? $_POST['departamental1'] : "";
        $departamental2 = (isset($_POST['departamental2'])) ? $_POST['departamental2'] : "";
        $ganador1 = isset($_POST["ganador1"]) ? 1 : 0;
        $ganador2 = isset($_POST["ganador2"]) ? 1 : 0;
        $visible = isset($_POST["visible"]) ? 1 : 0;
        $resultado = (isset($_POST['resultado'])) ? $_POST['resultado'] : "";
        $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

        ?>
        <!-- PARTE QUE NO SE VE -->
        <div class="container mt-5">
            <div class="row col-sm-12 d-md-flex d-sm-flex flex-sm-column flex-xs-column flex-md-row">
                <div style="display: none;" class="col-sm col-md-5 col-xl-3 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
                    <div class="card d-flex mb-4">
                        <div class="card-header rounded-0">
                            <div class="container-sm text-center pt-2 ">
                                <h2 style="text-align:center; font-size:larger">MODIFICAR RESULTADOS DEL FIXTURE</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-4">
                                </div>
                                <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" id="txtID" name="txtID">

                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $fecha; ?>" name="fecha" id="fecha" placeholder="Fecha">
                                    <label for="fecha" style="color: #707070 !important;">Fecha</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $hora; ?>" name="hora" id="hora" placeholder="hora">
                                    <label for="hora" style="color: #707070 !important;">Hora</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $lugar; ?>" name="lugar" id="lugar" placeholder="Lugar">
                                    <label for="lugar" style="color: #707070 !important;">Lugar</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $instancia; ?>" name="instancia" id="instancia" placeholder="instancia">
                                    <label for="instancia" style="color: #707070 !important;">Instancia</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $disciplina; ?>" name="disciplina" id="disciplina" placeholder="Disciplina">
                                    <label for="disciplina" style="color: #707070 !important;">Disciplina</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $departamental1; ?>" name="departamental1" id="departamental1" placeholder="Departamental 1">
                                    <label for="departamental1" style="color: #707070 !important;">Departamental 1</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="text" value="<?php echo $departamental2; ?>" name="departamental2" id="departamental2" placeholder="Departamental 2">
                                    <label for="departamental2" style="color: #707070 !important;">Departamental 2</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="text" value="<?php echo $resultado; ?>" class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> id="resultado" name="resultado" placeholder="Añade el resultado">
                                </div>
                                <div>
                                    <h3 class="mb-4" style="font-weight: lighter; font-size: 20px;">Selecciona al ganador del partido: </h3>
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="checkbox" role="switch" id="ganador1" name="ganador1">
                                        <label class="form-check-label" for="ganador1">Departamental 1</label>
                                    </div>
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="checkbox" role="switch" id="ganador2" name="ganador2">
                                        <label class="form-check-label" for="ganador2">Departamental 2</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="checkbox" role="switch" id="visible" name="visible">
                                        <label class="form-check-label" for="visible">Visible en el Fixture</label>
                                    </div>
                                </div>
                                <div role="group" aria-label="">
                                    <button type="submit" class="btn btn-success rounded-pill" value="modificar" name="accion" style="margin-right: 20px;">MODIFICAR</button>
                                </div>
                                <div class="col-sm-12 mt-3 mb-3">
                                    <?php

                                    include("config/conexion.php");
                                    $nuevaFecha = ""; // Inicializar $nuevaFecha con un valor vacío por defecto

                                    switch ($accion) {

                                        case "modificar":

                                            $sql = $conexion->prepare("UPDATE fixture
                                                    SET fecha = :fecha, disciplina = :disciplina,
                                                    hora = :hora, lugar = :lugar, instancia = :instancia,
                                                    departamental1 = :departamental1, departamental2 = :departamental2,
                                                    ganador1 = :ganador1, ganador2 = :ganador2, 
                                                    visible = :visible, resultado = :resultado
                                                    WHERE id = $txtID");

                                            $fechaFormateada = date('Y-m-d', strtotime($fecha));
                                            $horaFormateada = date('H:i:s', strtotime($hora));
                                            $sql->bindParam(':fecha', $fechaFormateada);
                                            $sql->bindParam(':hora', $horaFormateada);
                                            $sql->bindParam(':lugar', $lugar);
                                            $sql->bindParam(':instancia', $instancia);
                                            $sql->bindParam(':disciplina', $disciplina);
                                            $sql->bindParam(':departamental1', $departamental1);
                                            $sql->bindParam(':departamental2', $departamental2);
                                            $sql->bindParam(':ganador1', $ganador1);
                                            $sql->bindParam(':ganador2', $ganador2);
                                            $sql->bindParam(':visible', $visible);
                                            $sql->bindParam(':resultado', $resultado);

                                            $sql->execute();


                                            echo <<<EOT
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Evento actualizado correctamente.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            EOT;
                                            break;

                                        case "cancelar":
                                            break;
                                        case "seleccionar":


                                            $sql = $conexion->prepare("SELECT * FROM fixture WHERE id = :id");
                                            $sql->bindParam(':id', $txtID);
                                            $sql->execute();
                                            $elemento = $sql->fetch(PDO::FETCH_LAZY);

                                            $fecha = $elemento['fecha'];
                                            $hora = $elemento['hora'];
                                            $lugar = $elemento['lugar'];
                                            $instancia = $elemento['instancia'];
                                            $disciplina = $elemento['disciplina'];
                                            $departamental1 = $elemento['departamental1'];
                                            $departamental2 = $elemento['departamental2'];
                                            $resultado = $elemento['resultado'];
                                            break;
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ADMIN VISIBLE -->

                <div class="col-sm col-md-5 col-xl-4 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
                    <div class="card d-flex mb-4">
                        <div class="card-header rounded-0">
                            <div class="container-sm text-center pt-2 ">
                                <h2 style="text-align:center; font-size:larger">MODIFICAR RESULTADOS DEL FIXTURE</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-4">
                                </div>
                                <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" id="txtID" name="txtID">

                                <div class="form-floating mb-4">
                                    <input class="form-control" hidden type="text" value="<?php echo $fecha; ?>" name="fecha" id="nuevaFecha" placeholder="Fecha">
                                    <label for="fecha" hidden style="color: #707070 !important;">Fecha</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" hidden type="text" value="<?php echo $hora; ?>" name="hora" id="nuevaHora" placeholder="Hora">
                                    <label for="hora" hidden style="color: #707070 !important;">Hora</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" hidden type="text" value="<?php echo $lugar; ?>" name="lugar" id="lugar" placeholder="Lugar">
                                    <label for="lugar" hidden style="color: #707070 !important;">Lugar</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input class="form-control" hidden type="text" value="<?php echo $disciplina; ?>" name="disciplina" id="disciplina" placeholder="Disciplina">
                                    <label for="disciplina" hidden style="color: #707070 !important;">Disciplina</label>
                                </div>

                                <div class="from-group mb-4">
                                    <select id="instancia" name="instancia" class="form-select" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> aria-label="Default select example">
                                        <option selected><?php echo $instancia; ?></option>
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
                                        <select id="departamental1" name="departamental1" class="form-select" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> aria-label="Default select example">
                                            <option selected><?php echo $departamental1; ?></option>
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
                                        <select id="departamental2" name="departamental2" class="form-select" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> aria-label="Default select example">
                                            <option selected><?php echo $departamental2; ?></option>
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

                                <div class="form-group mb-4">
                                    <input type="text" value="<?php echo $resultado; ?>" class="form-control" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> id="resultado" name="resultado" placeholder="Añade el resultado">
                                </div>
                                <div>
                                    <h3 class="mb-4" style="font-weight: lighter; font-size: 20px;">Selecciona al ganador del partido: </h3>
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="checkbox" role="switch" id="ganador1" name="ganador1">
                                        <label class="form-check-label" for="ganador1">Departamental 1</label>
                                    </div>
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="checkbox" role="switch" id="ganador2" name="ganador2">
                                        <label class="form-check-label" for="ganador2">Departamental 2</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" <?php echo ($accion != "seleccionar") ? "disabled" : "" ?> type="checkbox" role="switch" id="visible" name="visible">
                                        <label class="form-check-label" for="visible">Visible en el Fixture</label>
                                    </div>
                                </div>
                                <div role="group" aria-label="">
                                    <button type="submit" class="btn btn-success rounded-pill" value="modificar" name="accion" style="margin-right: 20px;">MODIFICAR</button>
                                </div>
                                <div class="col-sm-12 mt-3 mb-3">
                                    <?php

                                    include("config/conexion.php");
                                    $nuevaFecha = ""; // Inicializar $nuevaFecha con un valor vacío por defecto

                                    switch ($accion) {

                                        case "modificar":

                                            $sql = $conexion->prepare("UPDATE fixture
                                                    SET fecha = :fecha, hora = :hora, lugar = :lugar, instancia = :instancia, 
                                                    disciplina = :disciplina, departamental1 = :departamental1, departamental2 = :departamental2,
                                                    ganador1 = :ganador1, ganador2 = :ganador2, visible = :visible, resultado = :resultado
                                                    WHERE id = $txtID");

                                            $sql->bindParam(':fecha', $fecha);
                                            $sql->bindParam(':hora', $hora);
                                            $sql->bindParam(':lugar', $lugar);
                                            $sql->bindParam(':instancia', $instancia);
                                            $sql->bindParam(':disciplina', $disciplina);
                                            $sql->bindParam(':departamental1', $departamental1);
                                            $sql->bindParam(':departamental2', $departamental2);
                                            $sql->bindParam(':ganador1', $ganador1);
                                            $sql->bindParam(':ganador2', $ganador2);
                                            $sql->bindParam(':visible', $visible);
                                            $sql->bindParam(':resultado', $resultado);

                                            $sql->execute();

                                            echo <<<EOT
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Evento actualizado correctamente.
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
                                        case "seleccionar":


                                            $sql = $conexion->prepare("SELECT * FROM fixture WHERE id = :id");
                                            $sql->bindParam(':id', $txtID);
                                            $sql->execute();
                                            $elemento = $sql->fetch(PDO::FETCH_LAZY);

                                            $txtID = $elemento['id'];
                                            $fecha = $elemento['fecha'];
                                            $hora = $elemento['hora'];
                                            $lugar = $elemento['lugar'];
                                            $instancia = $elemento['instancia'];
                                            $disciplina = $elemento['disciplina'];
                                            $departamental1 = $elemento['departamental1'];
                                            $departamental2 = $elemento['departamental2'];
                                            $resultado = $elemento['resultado'];
                                            // echo " $fecha , $disciplina , $departamental1, $departamental2 ";
                                            break;
                                    }

                                    // listado de novedades

                                    $sql = $conexion->prepare("SELECT * FROM fixture ORDER BY id DESC");
                                    $sql->execute();
                                    $listarFixture = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-7 col-xl-8 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
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
                                <th>Visible</th>
                                <th>Resultado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($listarFixture)) {
                                $nuevaFecha = ""; // Inicializar $nuevaFecha con un valor vacío por defecto
                                $nuevaHora = ""; // Inicializar $nuevaHora con un valor vacío por defecto
                                echo <<<EOT
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    No existen Resultados
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                EOT;
                            } else {
                                foreach ($listarFixture as $dato) { ?>
                                    <tr>
                                        <td class="text-center" hidden><?php echo $dato['id'] ?></td>
                                        <td class="text-center">
                                            <?php
                                            $fecha = $dato['fecha'];
                                            $nuevaFecha = date("d/m/Y", strtotime($fecha));
                                            echo $nuevaFecha;
                                            ?>
                                        </td>
                                        <td><?php
                                            $hora = $dato['hora'];
                                            $nuevaHora = date("h:i A", strtotime($hora));
                                            echo $nuevaHora
                                            ?>
                                        </td>
                                        <td><?php echo $dato['lugar'] ?></td>
                                        <td><?php echo $dato['instancia'] ?></td>
                                        <td><?php echo $dato['disciplina'] ?></td>
                                        <td><?php
                                            if ($dato['ganador1'] == 1) {
                                                // Si ganador1 es igual a 1, entonces es el ganador
                                                echo '<img class="rounded- m-2" src="../public/img/trofeo.png" width="35px" alt="">';
                                            }
                                            ?><?php echo $dato['departamental1'] ?></td>
                                        <td><?php
                                            if ($dato['ganador2'] == 1) {
                                                // Si ganador2 es igual a 1, entonces es el ganador
                                                echo '<img class="rounded- m-2" src="../public/img/trofeo.png" width="35px" alt="">';
                                            }
                                            ?><?php echo $dato['departamental2'] ?></td>
                                        <td>
                                            <?php
                                            if ($dato['visible'] == 1) {
                                                // Si ganador2 es igual a 1, entonces es el ganador
                                                echo "Si";
                                            } else {
                                                echo "No";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center"><?php echo $dato['resultado'] ?></td>
                                        <td>
                                            <form method="post" class="container">
                                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $dato['id'] ?>">
                                                <button type="submit" value="seleccionar" name="accion" style="border: none; background: none;">
                                                    <i class="fa-solid fas fa-edit" style="color: #303030;"></i>
                                                </button>
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