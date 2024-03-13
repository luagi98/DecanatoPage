function ve_login(id_receta){
  console.log('cargando');
  location.assign("?view=login");
}
function ve_formu(){
  console.log('cargando');
  location.assign("?view=formu");
}
function ve_formuI(){
  console.log('cargando');
  location.assign("?view=formuI");
}

function ve_formuH(){
  console.log('cargando');
  location.assign("?view=formuH");
}

function busca(){
  console.log('sos');
  var buscar= document.getElementById("buscar").value;
  location.assign("?view=filtros&search="+buscar);
}

document.getElementById("buscar").addEventListener("keyup", function(event) {
 // Number 13 is the "Enter" key on the keyboard

 if (event.keyCode === 13) {
   event.preventDefault();
   alert("hola");
   // Cancel the default action, if needed
   // Trigger the button element with a click
   busca();

 }
});


function cerrarSesionUsuario(){
  var form_data = new FormData();
  form_data.append("usuario", "1");
  $.ajax({
   url:"ajax.php?mode=cerrarSesionUsuario",
   method:"POST",
   data: form_data,
   contentType: false,
   cache: false,
   processData: false,
   success:function(data){
     if(data==1) {
          $('#idnav').load('public_html/overall/navbar.php'+ '#reload');
         // location.assign("?view=index");
      }else {
         alert(data);
      }
   }
  });
}

function ve_registro(){
  console.log('cargando');
  location.assign("?view=registro");
}

function ve_listas(){
  console.log('cargando');
  location.assign("?view=listas");
}

function ve_navegacion(){
  console.log('cargando');
  location.assign("?view=index");
}
