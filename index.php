<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/dataTables.responsive.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.5/css/uikit.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/dataTables.responsive.min.js"></script>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/js/uikit-icons.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            UIkit.lightbox('.uk-lightbox').init();
        });
    </script>
    <title>Fixture AJB | Inicio</title>
</head>

<body>
    <main>
        <?php include("template/header.php") ?>
        <div class="container-sm-fluid container-md">
            <div class="mt-4">
                <h1 class="tituloNormal fs-1 mb-3">Olimpiadas AJB - Miramar 2024</h1>
            </div>
            <!-- LISTADO DEL FIXTURE-->
            <div class="mt-4">
                <h1 class="tituloNormal fs-3 mb-3">Calendario - Resultados</h1>
            </div>
            <?php
            try {
                include("./administrador/config/conexion.php");
                $sql = $conexion->prepare("SELECT fixture.*, 
                departamentales1.logo AS logo_departamental1, 
                departamentales2.logo AS logo_departamental2
                FROM fixture
                LEFT JOIN departamentales AS departamentales1 ON fixture.departamental1 = departamentales1.nombre_departamental
                LEFT JOIN departamentales AS departamentales2 ON fixture.departamental2 = departamentales2.nombre_departamental
                WHERE fixture.visible = 1
                ORDER BY fecha desc, hora asc");
                $sql->execute();
                $listarFixture = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <div class="col-sm-12 row mb-5">
                    <table id="example" class="table table-responsive table-striped table-bordered">
                        <thead class="headerFixture">
                            <tr style>
                                <th style="width: 100px !important;" align="start">Fecha-Hora</th>
                                <th align="start">Lugar</th>
                                <th align="start">Disciplina</th>
                                <th style="text-align: center !important;">Instancia</th>
                                <th style="text-align: center !important;">Dtal_1</th>
                                <th style="text-align: center !important;">Dtal_2</th>
                                <th align="start">Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($listarFixture)) {
                                echo <<<EOT
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    Todavía no hay eventos existentes.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                EOT;
                            } else {
                                foreach ($listarFixture as $item) { ?>
                                    <tr class="horizontal-cell fecha-cell" style="width: 50%!important;" align="start">
                                        <td style="width: 15% !important;" class="areaFixture fs-6">
                                            <?php
                                            $fecha = $item['fecha'];
                                            $nuevaFecha = date("d/m/Y", strtotime($fecha));
                                            echo $nuevaFecha;
                                            ?>-<?php
                                                $hora = $item['hora'];
                                                $nuevaHora = date("H:i", strtotime($hora));
                                                echo $nuevaHora

                                                ?>
                                            <i style="color: var(--baseFixture);" class="fas fa-eye mobile-icon fs-5"></i>
                                        </td>
                                        <td style="width: 35% !important;" class="areaFixture fs-6"><?php echo $item['lugar']; ?></td>
                                        <td class="areaFixture fs-6"><?php echo $item['disciplina']; ?></td>
                                        <td align="center" class="areaFixture fs-6"><?php echo $item['instancia']; ?></td>
                                        <td align="center" class="<?php if ($item['ganador1'] == 1) {
                                                                        echo 'fw-bold';
                                                                    } ?>" style="width: 25%;;font-size: 15px !important;"> <img class="rounded-pill m-2" src="./public/img/departamentales/<?php echo $item['logo_departamental1']; ?>" width="30px" alt=""><?php echo $item['departamental1']; ?>
                                            <?php
                                            if ($item['ganador1'] == 1) {
                                                // Si ganador1 es igual a 1, entonces es el ganador
                                                echo '<img class="rounded- m-2" src="./public/img/ganador.png" width="30px" alt="">';
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="<?php if ($item['ganador2'] == 1) {
                                                                        echo 'fw-bold';
                                                                    } ?>" style="width: 30%;;font-size: 15px !important;"> <img class="rounded-pill m-2" src="./public/img/departamentales/<?php echo $item['logo_departamental2']; ?>" width="30px" alt=""><?php echo $item['departamental2']; ?>
                                            <?php
                                            if ($item['ganador2'] == 1) {
                                                // Si ganador1 es igual a 1, entonces es el ganador
                                                echo '<img class="rounded- m-2" src="./public/img/ganador.png" width="30px" alt="">';
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="areaFixture fs-6"><?php echo $item['resultado']; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } catch (Exception $e) {
                echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
            }
            ?>
            <div class="mt-4">
                <h1 class="tituloNormal fs-3 mb-3">Tablas de Posiciones</h1>
            </div>
            <div class="col-sm-12 pt-3 pb-3">
                <?php
                try {
                    include("administrador/config/conexion.php");
                    $sql = $conexion->prepare("SELECT * FROM tablaposiciones ORDER BY id DESC");
                    $sql->execute();
                    $listarTablas = $sql->fetchAll(PDO::FETCH_ASSOC);
                ?>

                    <div id="owl-demo" class="owl-carousel mt-4">
                        <?php foreach ($listarTablas as $dato) { ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="img_carousel" uk-lightbox style="background-image:url(public/img/tablas/<?php echo $dato['tablaImagen']; ?>);">
                                            <a class="uk-lightbox-item" href="public/img/tablas/<?php echo $dato['tablaImagen'] ?>">
                                                <img src="public/img/tablas/<?php echo $dato['tablaImagen'] ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text_carousel">
                                            <h3 class="tituloCarousel">Tabla de Posiciones "<?php echo $dato['disciplina'] ?>"</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                <?php
                } catch (Exception $e) {
                    echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
                }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <?php include("template/footer.php") ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
<script src="public/js/owl.carousel.js"></script>
<script src="public/js/control.js"></script>
<script src="./library/DataTables/datatables.js"></script>
<script src="./library/DataTables/datatables.min.css"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "drawCallback": function(settings) {
                $('ul.pagination').addClass("pagination-sm");
            },
            columnDefs: [{
                    targets: [0, 2],
                    searchable: true
                }, // Columna 2 es buscable
            ],
            dom: "<'row'<'col-sm-12'f>>" + "<'row'<'col-sm-12't>>" + "<'row'<'col-sm-12'p>>",
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sLoadingRecords": "Cargando...",
                "infoFiltered": true,
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            },
            "oPaginate": true,
            "iDisplayLength": 100,
            "bFilter": true,
            "aaSorting": [
                [2, "desc"]
            ],
            ordering: false,
            scrollCollapse: true,
            scrollX: false,
            scrollY: true,
            responsive: true,
            // para usar los botones
        })
    })
</script>
<script>
    $(document).ready(function() {
        const table = $('#example').DataTable();
        const disciplinaFilter = $('#disciplinaFilter');
        const applyFilter = $('#applyFilter');

        // Agregar un evento click al botón para aplicar el filtro
        applyFilter.on('click', function() {
            var selectedDisciplina = disciplinaFilter.val();

            // Aplicar el filtro a la tabla
            table.column(2).search(selectedDisciplina).draw();
        });
    });

    //ocultar en Mobile
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>