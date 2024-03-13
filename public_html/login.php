<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- JQUERY Y AJAX -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap -->

    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700,700i|Open+Sans:400,700&display=swap" rel="stylesheet">

    <link href="public_html/css/login.css" rel="stylesheet" type="text/css">
    <script src="views/app/js/ve_login.js"></script>
  </head>
  <body>
    <?php include('public_html/overall/navbar.php'); ?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <img src="public_html/img/user_icon.png" style="width:50px; height:50px;" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form>
              <input type="text" id="email" class="fadeIn second" name="Correo" placeholder="Correo">
              <input type="text" id="password" class="fadeIn third" name="Contraseña" placeholder="Contraseña">
              <input type="button" onclick="login()" class="fadeIn fourth" value="Iniciar sesión">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <a class="underlineHover" href="#">Olvidaste tu contraseña?</a>
            </div>

        </div>
    </div>
    </body>
</html>
