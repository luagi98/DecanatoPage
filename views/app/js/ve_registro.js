function registraUsuario(){
  var connect, form, response, result, nombre, comensal, contra, email,genero,correo;
  nombre = document.getElementById("Nombre").value;
  contra = document.getElementById("Contra1").value;
  contra2 = document.getElementById("Contra2").value;
  correo = document.getElementById("email").value;
  comensal = $("#comensal").val();

  var radios = document.getElementsByName('gender');

  for (var i = 0, length = radios.length; i < length; i++){
   if (radios[i].checked){
    genero=radios[i].value;
    break;
   }
  }

  var form_data = new FormData();
  form_data.append("usuario", nombre);
  form_data.append("comensal", comensal);
  form_data.append("pass", contra);
  form_data.append("email", correo);
  form_data.append("genero", genero);
  $.ajax({
   url:"ajax.php?mode=registroUsuario",
   method:"POST",
   data: form_data,
   contentType: false,
   cache: false,
   processData: false,
   success:function(data){
     // alert(data);
     if(data==="Registro existoso")
      location.assign("?view=index");
     else alert(data);
   }
  });
}





function validar(){
  var nombre, apellido, contra, contra2, email, expresion,genero,correo,comensal;
  nombre = document.getElementById("Nombre").value;
  contra = document.getElementById("Contra1").value;
  contra2 = document.getElementById("Contra2").value;
  correo = document.getElementById("email").value;
  comensal = $("#comensal").val();

  expresion= /\w+@\w+\.+[a-z]/;

  var radios = document.getElementsByName('gender');

  for (var i = 0, length = radios.length; i < length; i++){
   if (radios[i].checked){
    genero=radios[i].value;
    break;
   }
  }

  if(genero!='Hombre' && genero!='Mujer'){
    $('#alert').html('Buen intento crack');
  }else if(nombre === "" && comensal=='0' && correo === "" && contra === ""){
    $('#alert').html('Todos los campos deben llenarse');
  }else if(nombre === ""){
    $('#alert').html('Falta el nombre');
    $('#Nombre').focus();
  }else if(comensal==0){
    $('#alert').html('Falta el comensal');
    $('#comensal').focus();
  }else if(correo === ""){
    $('#alert').html('Falta el correo');
    $('#email').focus();
  }else if(contra === ""){
    $('#alert').html('Falta la contraseña');
    $('#Contra1').focus();
  }else if(contra2 === ""){
    $('#alert').html('Falta la confirmacion de contraseña');
    $('#Contra2').focus();
  }else if(contra != contra2){
    $('#alert').html('Las contraseñas no coinciden');
    $('#contra2').focus();
  }else if(nombre.length > 15){
    $('#alert').html('El nombre es muy largo');
    $('#Nombre').focus();
  }else if(correo.length > 35){
    $('#alert').html('El correo es muy largo');
    $('#email').focus();
  }else if(contra.length > 30){
    $('#alert').html('La contraseña es muy larga');
    $('#contra').focus();
  }else if(!expresion.test(correo)){
    $('#alert').html('Ingresa un correo valido');
    $('#email').focus();
  }else{
    $('#alerth').removeClass("bg-danger");
    $('#alerth').addClass("bg-success");
    $('#alert').html('Los datos son correctos!');
    registraUsuario();
    // alert("sos");
  }


}
