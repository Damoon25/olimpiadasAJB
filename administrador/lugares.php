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
        $lugar = (isset($_POST['lugar'])) ? $_POST['lugar'] : "";
        $logo = (isset($_FILES['logo']['name'])) ? $_FILES['logo']['name'] : "";
        $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

        ?>
        <div class="container mt-5">
            <div class="row col-sm-12 d-md-flex d-sm-flex flex-sm-column flex-xs-column flex-md-row">
                <div class="col-sm col-md-6 col-xl-5 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
                    <div class="card d-flex mb-4">
                        <div class="card-header rounded-0">
                            <div class="container-sm text-center pt-2 ">
                                <h2 style="text-align:center; font-size:larger">AGREGAR NUEVO LUGAR</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-4">
                                </div>
                                <input type="hidden" value="<?php echo $txtid; ?>" class="form-control" id="txtID" name="txtID">
                                <div class="form-group mb-4">
                                    <input type="text" required value="<?php echo $lugar; ?>" <?php echo ($accion == "seleccionar") ? "disabled" : "" ?> class="form-control" id="lugar" name="lugar" placeholder="Añade una lugar">
                                </div>
                                <div role="group" aria-label="">
                                    <button type="submit" class="btn btn-success rounded-pill" value="agregar" name="accion" <?php echo ($accion == "seleccionar") ? "disabled" : "" ?> style="margin-right: 20px;">AGREGAR</button>
                                </div>
                                <div class="col-sm-12 mt-3 mb-3">
                                    <?php

                                    include("config/conexion.php");

                                    switch ($accion) {

                                        case "agregar":

                                            $sql = $conexion->prepare("INSERT INTO lugares(lugar) VALUES(:lugar);");
                                            $sql->bindParam(':lugar', $lugar);
                                            $sql->execute();
                                            echo <<<EOT
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Lugar agregado correctamente.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            EOT;
                                            break;

                                        case "cancelar":
                                            break;
                                        case "eliminar":

                                            $sql = $conexion->prepare("DELETE FROM lugares WHERE id = :id");
                                            $sql->bindParam(':id', $txtID);
                                            $sql->execute();
                                            echo <<<EOT
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Lugar eliminado correctamente.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    EOT;
                                            break;
                                    }

                                    // listado de novedades

                                    $sql = $conexion->prepare("SELECT * FROM lugares ORDER BY id DESC");
                                    $sql->execute();
                                    $listarLugares = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-xl-7 col-sm-12 col-xs-12 fb-page mt-4 mb-4">
                    <table class="table table-responsive table-bordered mb-4">
                        <thead class="card-header rounded-0">
                            <tr align="center">
                                <th hidden>ID</th>
                                <th>Lugares</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($listarLugares)) {
                                echo <<<EOT
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    No existen Resultados
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                EOT;
                            } else {
                                foreach ($listarLugares as $dato) { ?>
                                    <tr>
                                        <td hidden><?php echo $dato['id'] ?></td>
                                        <td align="center"><?php echo $dato['lugar'] ?></td>
                                        <td align="center">
                                            <form method="post" class="container">
                                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $dato['id'] ?>">

                                                <!-- <button type="submit" value="seleccionar" name="accion" style="border: none; background: none;">
                                                <i class="fa-solid fa-magnifying-glass" style="color: #303030;"></i>
                                            </button> -->

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