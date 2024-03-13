
<link rel="stylesheet" href="public_html/css/navbar.css">
<script src="views/app/js/navbar_functions.js"></script>
<nav class="navbar navbar-expand-xl navbar-dark menu">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img src="public_html/img/icons/cecyt-9-icon.png" height="28" alt="CoolBrand"> Cecyt 9
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a onclick="ve_antecedentes()" class="nav-item nav-link <?php if((isset($_GET['view']) and $_GET['view']=='antecedentes') or !isset($_GET['view'])) echo ' active'; ?>">Antecedentes</a>
                <a onclick="ve_fototeca()" class="nav-item nav-link <?php if(isset($_GET['view']) and $_GET['view']=='fototeca') echo ' active'; ?>">Fototeca</a>
                <!--<a onclick="ve_exposiciones()" class="nav-item nav-link <?php if(isset($_GET['view']) and $_GET['view']=='exposiciones') echo ' active'; ?>">Exposiciones</a>
                <a onclick="ve_competencias()" class="nav-item nav-link <?php if(isset($_GET['view']) and $_GET['view']=='competencias') echo ' active'; ?>">Competencias</a> -->
                <a onclick="ve_linea_del_tiempo()" class="nav-item nav-link <?php if(isset($_GET['view']) and $_GET['view']=='linea_del_tiempo') echo ' active'; ?>">Linea del tiempo</a>
                <?php
                    if(isset($_SESSION['usuarioId'])){
                        echo('
                            <a onclick="ve_conf_fototeca()" class="nav-item nav-link'.((isset($_GET['view']) and $_GET['view']=='conf_fototeca')?'active':'').' ">Conf.fototeca</a>
                            <a onclick="ve_conf_linea_del_tiempo()" class="nav-item nav-link '.((isset($_GET['view']) and $_GET['view']=='conf_linea')?'active':'').'">Conf. linea</a>
                            <a onclick="ve_cerrar_sesion()" class="nav-item nav-link">Salir</a>
                        ');
                    }
                ?>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="#" class="nav-item nav-link">
                    <img src="public_html/img/icons/logo-poli-blanco.png" height="28" alt="CoolBrand"> IPN
                </a>
            </div>
        </div>
    </div>
</nav>
