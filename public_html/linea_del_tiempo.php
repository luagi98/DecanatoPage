<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public_html/img/IPNLogo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700,700i|Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public_html/css/estilo_linea.css">
    <script src="views/app/js/ve_sube_linea.js"></script>
    <title>Historia - CECYT 9</title>

</head>

<body>
    <?php include('public_html/overall/navbar.php'); ?>

    <div class="containerFondo">
        <div class="fondoSection">
            <img src="public_html/img/batizLogo.png" alt="" class="fondo_batizLogo">
            <h2 class="fondo_title">CECYT 9</h2>
            <p class="fondo_text">Mi intención al elaborar este material es, por una parte, mostrar a las nuevas generaciones lo que esta escuela encierra y con ello involucrarlas en su valiosa historia, asimismo al evocar épocas pasadas, considero que las generaciones de antaño podemos reconocer los hechos que han forjado al Centro de Estudios Científicos y Tecnológicos “Juan de Dios Bátiz”</p>

        </div>
    </div>

    <div class="containerTimelineTitle">
        <h4 class="timelineTitle">Acontecimientos Importantes</h4>
    </div>
    <div class="containerTimeline">
        <div class="timeline">
            <ul>
                <?php

                    $db = new Conexion();
                    $sql = $db->prepare('SELECT * FROM linea_del_tiempo ORDER BY fecha ASC');
                    try {
                        $sql-> execute();
                    } catch (\Throwable $th) {
                        echo ''. $th->getMessage() .'';
                    }
                    
                    $cards = $sql->fetchAll();
                    $cont=0;
                    foreach($cards as $card){
                        echo('
                            <!-- ~ Open Card '.($cont%4+1).'-->
                            <li class="timelineCard bubbleColor'.($cont%4+1).'">
                                <div class="openCardButton"></div>
                                <div class="timeline-header">
                                    <h2 class="date">'.$card['fecha'].'</h2>
                                    <div class="timelineCardTitle">
                                        <h1>'.$card['titulo'].'</h1>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <div class="contentCard">

                                        <p class="textContentCard">'.$card['descripcion'].'</p>
                                        <img class="imgContentCard" src="'.$card['ruta_imagen1'].'" alt="">
                                        <img class="imgContentCard" src="'.$card['ruta_imagen2'].'" alt="">
                                        <img class="imgContentCard" src="'.$card['ruta_imagen3'].'" alt="">
                                        '.($card['ruta_video']!=""?'<iframe width="350" height="250" src="'.$card['ruta_video'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>':'').'
                                        '.((isset($_SESSION['usuarioId']))?
                                            '<div class="closeCardEdit" onclick="goEditStory('.$card['historiaId'].')">Editar</div>
                                             <div class="closeCardEliminate" onclick="deleteStory('.$card['historiaId'].')">Eliminar</div>'
                                            :''
                                        ).'
                                    </div>
                                    <div class="closeCardButton">
                                        <i class="fas fa-caret-up closeCardIcon"></i>
                                    </div>
                                </div>
                            </li>

                            <!-- ~ Close Card '.($cont%4+1).'-->
                        ');
                        $cont++;
                    }
                ?>



            </ul>
        </div>
    </div>

    <footer class="containerFooter">
        <div class="footerCard">
            <a class="iconFooter" href="#"><i class="fas fa-envelope"></i></a>
            <p class="textFooter">cecyt9@gmail.com</p>
        </div>
        <div class="footerCard">
            <a class="iconFooter" href="https://twitter.com/_cecyt9?s=20&t=1yyaKPE0skghgtUq7I_S5Q"><i class="fab fa-twitter"></i></a>
            <p class="textFooter">@_cecyt9</p>
        </div>
        <div class="footerCard">
            <a class="iconFooter" href="#"><i class="fab fa-facebook"></i></a>
            <p class="textFooter">CECyT 9 Juan de Dios Bátiz</p>
        </div>
    </footer>

    <script src="public_html/js/timeline.js"></script>
    <script src="https://kit.fontawesome.com/f1fe361482.js" crossorigin="anonymous"></script>

</body>
</html>
