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
    	<link rel="stylesheet" href="public_html/css/estilo_linea_conf.css">
        <script src="views/app/js/ve_sube_linea.js"></script>


    </head>
    <body>

        <?php include('public_html/overall/navbar.php'); ?>


        <!-- MAIN (Center website) -->
        <div class="main col-sm-12 col-md-11 col-lg-10 ">

        </div>

        <div id="form-container" class=" container col-xs-12">

            <div class="col-12 mb-5">
                <label for="Image" class="form-label"><h1>Formulario Imagen</h1></label>
                <br>

                <?php
                    if(isset($_GET['historiaId']) and $_GET['historiaId']!=""){
                        $dbn = new Conexion();
                        $sql = $dbn->prepare('SELECT * FROM linea_del_tiempo WHERE historiaId= :historiaId');
                        $sql-> bindValue(':historiaId', $_GET['historiaId'], PDO::PARAM_INT);
                        $sql-> execute();
                        $obtenido = $sql->fetch();
                        $dbn->close_con();
                        echo('
                        <div class="row mb-3">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Idenfificación de la historia origen</label>
                            <div class="col-sm-6">
                              <input type="text" readonly class="form-control-plaintext" id="historiaId" value="'.$_GET['historiaId'].'">
                            </div>
                        </div>
                        ');
                    }
                ?>

                <label for="exampleFormControlInput1" class="form-label">Titulo/Fecha</label>
                <div class="input-group mb-3">
                    <input type="" class="form-control" id="title" placeholder="Titulo" value="<?php if(isset($obtenido)) echo $obtenido['titulo']; ?>">
                    <input id="originalDate" class="form-control " type="date" value="<?php if(isset($obtenido)) echo $obtenido['fecha']; ?>"/>
                </div>

                <div class="col-12 mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                  <textarea class="form-control" id="descriptionText" placeholder="Descripción" ><?php if(isset($obtenido)) echo $obtenido['descripcion']; ?></textarea>
                </div>

                <div class="col-12 mb-3">
                  <label for="exampleFormControlInput1" class="form-label">URL video</label>
                  <input id="videoURL" class="form-control " type="" placeholder="URL" value="<?php if(isset($obtenido)) echo $obtenido['ruta_video']; ?>"/>
                </div>

                <label for="exampleFormControlTextarea1" class="form-label">Imagen</label>
                <input class="form-control" src="" type="file" id="formFile1" onchange="preview(1)">
                <input class="form-control" src="" type="file" id="formFile2" onchange="preview(2)">
                <input class="form-control" src="" type="file" id="formFile3" onchange="preview(3)">
                <button onclick="<?php echo (isset($obtenido))? 'editStory()':'uploadStory()'; ?>" class="btn btn-primary mt-3 col-12" ><?php echo (isset($obtenido))? 'Editar historia':'Agregar historia'; ?></button>
            </div>
            <div id="image-container" class="col-12">
                <img id="frame1" src="<?php if(isset($obtenido)) echo $obtenido['ruta_imagen1']; ?>" class="img-thumbnail rounded" />
                <img id="frame2" src="<?php if(isset($obtenido)) echo $obtenido['ruta_imagen2']; ?>" class="img-thumbnail rounded" />
                <img id="frame3" src="<?php if(isset($obtenido)) echo $obtenido['ruta_imagen3']; ?>" class="img-thumbnail rounded" />
            </div>
        </div>

        <script>
            function preview(id) {
                switch (id) {
                    case 1: frame1.src = URL.createObjectURL(event.target.files[0]); break;
                    case 2: frame2.src = URL.createObjectURL(event.target.files[0]); break;
                    case 3: frame3.src = URL.createObjectURL(event.target.files[0]); break;
                    default: frame1.src = URL.createObjectURL(event.target.files[0]); break;
                }
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame1.src = "";
                frame2.src = "";
                frame3.src = "";
            }
        </script>

    </body>
</html>
