<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<title>Página Decanato Cecyt 9</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700,700i|Open+Sans:400,700&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="public_html/css/estilo_fototeca.css">
        <script src="views/app/js/ve_sube_foto.js"></script>

        <style>
            <?php
                if(!isset($_SESSION['usuarioId'])){
                    echo('
                        /* Create three equal columns that floats next to each other */
                        .fdata {
                            display: block; /* Hide all elements by default */
                            transition: transform .2s;
                            align:center;
                        }

                        .fdata:hover {
                            transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                        }
                    ');
                }
            ?>

        </style>


    </head>
    <body>

        <?php include('public_html/overall/navbar.php');

            $db = new Conexion();
            $sql = $db->prepare('SELECT YEAR(fecha) AS availible_year FROM fototeca GROUP BY YEAR(fecha) ORDER BY availible_year DESC;
');
            $sql-> execute();
            $years = $sql->fetchAll();
        ?>


        <!-- MAIN (Center website) -->
        <div class="main col-sm-12 col-md-11 col-lg-10 ">

            <h1>FOTOTECA</h1>
            <hr>
            <div class="container">
                <div class="input-group row">
                    <div class="col-sm-12 col-lg-2">
                        <select id="selectBox" class="form-select " aria-label="Default select example">
                            <option value="" selected>Año</option>
                            <?php
                                if($years){
                                    foreach ($years as $year) {
                                        if($year['availible_year']==1) $year['availible_year']='Antecedentes';
                                        echo('<option value="y'.$year['availible_year'].'">'.$year['availible_year'].'</option>');
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <input id="search-box" type="search" class="col-sm-12 col-lg-8 form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button id="searchButton" type="button" class="col-sm-12 col-lg-2 btn btn-outline-danger">Buscar</button>
                </div>
            </div>

            <hr>


            <div class="accordion" id="accordionPanelsStayOpenExample">
                <?php

                    if($years) {
                        $onlyShowOne = true;
                        foreach ($years as $year) {
                            if($year['availible_year']==1) $year['availible_year']='Antecedentes';
                            echo('
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading'.$year['availible_year'].'">
                                      <button class="accordion-button number'.$year['availible_year'].' '.((!$onlyShowOne)?'collapsed':'').'" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse'.$year['availible_year'].'" aria-expanded="'.(($onlyShowOne)?'true':'false').'" aria-controls="panelsStayOpen-collapse'.$year['availible_year'].'">
                                        '.$year['availible_year'].'
                                      </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse'.$year['availible_year'].'" class="accordion-collapse collapse '.(($onlyShowOne)?'show':'').'" aria-labelledby="panelsStayOpen-heading'.$year['availible_year'].'">
                                        <div class="accordion-body ">
                                            <div class="align-links row row-cols-auto">
                            ');
                            if($year['availible_year']=='Antecedentes') $year['availible_year']='1';
                            $sql_pictures = $db->prepare('SELECT * FROM fototeca WHERE YEAR(fecha) = :year');
                            $sql_pictures->bindValue(':year', $year['availible_year'], PDO::PARAM_STR);
                            $sql_pictures->execute();
                            $pictures = $sql_pictures->fetchAll();
                            if($year['availible_year']==1) $year['availible_year']='Antecedentes';
                            if($pictures){
                                foreach($pictures as $picture){
                                    echo('
                                        <a href="'
                                        .((!isset($_SESSION['usuarioId']))?$picture['ruta_imagen'].'" data-toggle="lightbox" data-gallery="example-gallery "':'#"')
                                        .'class="col fdata y'.$year['availible_year'].' hover-zoom"  data-caption="'.$picture['titulo'].' - '.$picture['descripcion'].'">
                                            <img src="'.$picture['ruta_imagen'].'" class="img-fluid">
                                            <br>
                                            '.((isset($_SESSION['usuarioId']))?

                                                '<button class="image-button col-12 btn btn-primary" onclick="goEditPicture('.$picture['fototecaId'].')">Editar</button><br>
                                                <button class="image-button col-12 btn btn-danger" onclick="deletePicture('.$picture['fototecaId'].')">Eliminar</button>':''
                                            ).'

                                        </a>
                                    ');
                                }
                            }

                            echo('
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ');
                            $onlyShowOne=false;
                        }
                    }else{
                        echo 'No hay imagenes';
                    }

                    $db->close_con();

                ?>
                <!--
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                  <button class="accordion-button collapsed tres" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    #2016
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                  <div class="accordion-body">
                      <div class="row">
                          <div class="align-links row row-cols-auto">

                                <a href="public_html/img/juan-de-dios-batiz/batiz2.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="fdata y2016 hover-zoom"  data-caption="This describes the image 2016 1">
                                    <img src="public_html/img/juan-de-dios-batiz/batiz2.jpg" class="img-fluid">
                                </a>
                                <a href="public_html/img/juan-de-dios-batiz/batiz2.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="fdata y2016 hover-zoom"  data-caption="This describes the image 2016 2">
                                    <img src="public_html/img/juan-de-dios-batiz/batiz2.jpg" class="img-fluid">
                                </a>
                                <a href="public_html/img/juan-de-dios-batiz/batiz2.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="fdata y2016 hover-zoom" data-caption="This describes the image 2016 3">
                                    <img src="public_html/img/juan-de-dios-batiz/batiz2.jpg" class="img-fluid">
                                </a>

                          </div>
                      </div>
                  </div>
                </div>
              </div> -->
            </div>
        </div>

        <script>

            let searchBox = document.querySelector('#search-box');
            let images = document.querySelectorAll('.fdata');

            let selectBox = document.querySelector('#selectBox');
            let searchButton = document.querySelector('#searchButton');

            searchBox.oninput = () =>{
                updateSearch();
            };

            searchButton.onclick = () =>{
                updateSearch();
            };

            selectBox.onchange = () =>{
                updateSearch();
            };

            function alerta(){
                alert('sos');
            }


            function updateSearch(){
                let accordionsButton = document.querySelectorAll('.accordion-button');
                // accordionsButton.forEach(accordion => {
                //     if(accordion.className.indexOf("collapsed") == -1)
                //         accordion.click();
                // });
                images.forEach(hide => hide.style.display = 'none');
                let value = searchBox.value;
                let selectedValue = selectBox.value;

                let accordionItems = document.querySelectorAll('.accordion-item');


                images.forEach(image =>{
                   let title = image.getAttribute('data-caption');
                   if(title.toLowerCase().includes(value.toLowerCase()) && image.className.indexOf(selectedValue) > -1){
                      image.style.display = 'block';
                   }
                   if(searchBox.value == '' && selectedValue== ''){
                      image.style.display = 'block';
                   }
                });

                accordionItems.forEach(item => {
                    let imagesDisp = item.querySelectorAll('.fdata');
                    let addButton = false;
                    imagesDisp.forEach( image => {
                        if(getComputedStyle(image).display == 'block'){
                            addButton = true;
                        }
                    });
                    let accordion = item.querySelector('.accordion-button');
                    if(addButton){
                        if(accordion.classList.contains("collapsed"))
                            accordion.click();
                    }else{
                        if(!accordion.classList.contains("collapsed"))
                            accordion.click();
                    }

                });
            }

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.0/dist/index.bundle.min.js"></script>
        <footer class="containerFooter">
            <div class="footerCard">
                <a class="iconFooter" href="mailto:cecyt9@gmail.com"><i class="fas fa-envelope"></i></a>
                <p class="textFooter">cecyt9@gmail.com</p>
            </div>
            <div class="footerCard">
                <a class="iconFooter" href="https://twitter.com/_cecyt9?s=20&t=1yyaKPE0skghgtUq7I_S5Q"><i class="fab fa-twitter"></i></a>
                <p class="textFooter">@_cecyt9</p>
            </div>
            <div class="footerCard">
                <a class="iconFooter" href="https://www.facebook.com/Juan-de-Dios-B%C3%A1tiz-Oficial-813458352356480"><i class="fab fa-facebook"></i></a>
                <p class="textFooter">CECyT 9 Juan de Dios Bátiz</p>
            </div>
        </footer>
        <script src="https://kit.fontawesome.com/f1fe361482.js" crossorigin="anonymous"></script>
    </body>
</html>
