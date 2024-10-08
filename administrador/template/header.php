<?php $url = "http://" . $_SERVER['HTTP_HOST'] ?>

<?php

session_start();
if (@!isset($_SESSION['usuario'])) { // si no existe usuario logueado envía al login.
    header("Location:./login.php");
} else {

    if ($_SESSION['usuario'] === "ok") {
        $usuario = $_SESSION['usuario'];
    }
}

// $user = $_SESSION['usuario'];

?>

<header>
    <nav class="container-expand navbar navbar-expand-lg sticky-top">
        <div class="container-fluid text-center">
            <a class="navbar-brand" href="home.php"><img src="../public/img/logo/logoAjb2.png" id="logo" alt="logo" class="logo sm-auto d-block"></a>
            <button class="btn-primary d-xxl-none d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="background: none; border:none;">
                <i class="fas fa-bars" id="btn_menu"></i>
            </button>
            <div class="offcanvas offcanvas-end d-xxl-none d-xl-none" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-image: var(--fondo-menu);">
                <div class="offcanvas-header">
                    <button class="ms-2" type="button" data-bs-dismiss="offcanvas" aria-label="Close" style="background:none; border:none;">
                        <i class="fa-solid fa-circle-chevron-left mt-4" id="btn_atras"></i>
                    </button>
                </div>
                <div class="offcanvas-body d-block d-lg-none text-start">
                    <ul class="container col-sm-12 navbar-nav me-auto ps-3">
                        <li class="nav-item mb-3">
                            <a class="nav-link textoNav1 textCanvas animate__animated animate__backInRight animate__delay-1s animate__fast" href="/index.php">IR AL SITIO WEB</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link textoNav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">BIENVENIDO/A,<?php echo "  " ?> <?php echo $_SESSION['usuario'] ?>
                            </a>
                            <div class="dropdown-menu dropdownCanvas" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" id="itemDropdown" style="color: var(--fondo1);" href="logout.php"><i class="fas fa-power-off p-2" style="color: var(--fondo1);"></i>Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-center mt-3">
                    <li class="nav-item">
                        <a target="_blank" class="nav-link textoNav1" href="<?php echo $url; ?>/olimpiadas2023/index.php">IR AL FIXTURE</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link textoNav1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">BIENVENIDO/A,<?php echo "  " ?> <?php echo $_SESSION['usuario'] ?>
                        </a>
                        <div class="dropdown-menu dropdownCanvas" aria-labelledby="navbarDropdown" style="background-color: var(--text) !important;">
                            <a class="dropdown-item " id="itemDropdown" style="color: var(--fondo1) !important;" href="logout.php"><i class="fas fa-power-off p-2" style="color: var(--fondo1);"></i>Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// echo "El valor de \$_SESSION['usuario'] es: " . $_SESSION['usuario'];
?>