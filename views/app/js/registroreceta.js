
var sel1 = document.querySelector('#ingre1');

var optionstext = document.querySelector('#auxingrem')
var options2= optionstext.querySelectorAll('option');

function giveSelection(selValue) {
  var sel2 = document.querySelector('#'+selValue.id+'m');
  // alert(sel2.id);
  sel2.innerHTML = '';
  $(".chosen").chosen("destroy");
  for(var i = 0; i < options2.length; i++) {
    if(options2[i].dataset.option === selValue.value) {
      sel2.appendChild(options2[i]);
    }
  }
  $(".chosen").chosen();
}


$( document ).ready(function() {
    giveSelection(sel1);
        $(".chosen").chosen();
});


function goRegistroReceta() {
  var idIngre = [];
  var idMedida = [];
  var cantIngre = [];
  var idHerra = [];
  var cantHerra = [];
  var pasos = [];
  $.each($(".nombreIngre option:selected"), function(){
      idIngre.push($(this).val());
  });
  $.each($(".medidaIngre option:selected"), function(){
      idMedida.push($(this).val());
  });
  $.each($(".nombreHerra option:selected"), function(){
      idHerra.push($(this).val());
  });
  $("input[name='cantingre[]']").each(function() {
      cantIngre.push($(this).val());
  });
  $("input[name='herramientasCantidad[]']").each(function() {
      cantHerra.push($(this).val());
  });
  $("input[name='pasos[]']").each(function() {
      pasos.push($(this).val());
  });
  var nombre= document.getElementById("nombre").value;
  var descripcion= document.getElementById("Descripcion").value;
  var tiempo= document.getElementById("tiempo").value;
  var idComensal = document.getElementById("comensal").value;


  var datos = {
   'nombre': nombre,
   'descripcion': descripcion,
   'tiempo': tiempo,
   'pasos': pasos,
   'idHerra':idHerra,
   'cantHerra':cantHerra,
   'idIngre':idIngre,
   'cantIngre':cantIngre,
   'idMedida':idMedida,
   'idComensal': idComensal

 }
 console.log(JSON.stringify(datos));

  var fsize=0;
  if(document.getElementById("customFile").files.length != 0){
    var name = document.getElementById("customFile").files[0].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
      alert("Invalid Image File");
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("customFile").files[0]);
    var f = document.getElementById("customFile").files[0];
    fsize = f.size||f.fileSize;
  }
  if(fsize > 2000000){
       alert("La imagen es muy grande");
  }else{
     var form_data = new FormData();
     if(document.getElementById("customFile").files.length == 0){
         alert('Selecciona una imagen');
     }else{
         form_data.append("file", document.getElementById('customFile').files[0]);
         $.each(datos, function(key, value){
            form_data.append(key, value);
         });

     }
  }
  //
  $.ajax({
   url:"ajax.php?mode=registroReceta",
   method:"POST",
   data: form_data,
   contentType: false,
   cache: false,
   processData: false,
   success:function(data){
     if(data == 'funciono'){
       location.assign("?view=index");
     }else alert(data);
   }
  });
}


function solonumeros(e) {

            var keynum = e.which || e.keyCode;
            if ((keynum >= 48 && keynum <= 57) || keynum === 8)
                return true;

            else
                return false;
}

function sololetras(e) {

            var x = e.which || e.keyCode;
            if ((x >= 97 && x <= 122) || (x >= 65 && x <= 90) || (x === 8 || x === 32 ||
                    x === 224 || x === 232 || x === 236 || x === 242 || x === 249 || x === 41))
                return true;

            else
                return false;
        }
function campos(nombre, apellido,edad, telefono, correo, contra,sexo,contra2) {
          var cadena = correo.value;
          var primero = cadena.indexOf('@');
          var ultima = cadena.lastIndexOf('@');
          var ultimo = cadena.lastIndexOf('.');
            if (nombre.value === "") {
                alert("falta nombre");
                nombre.focus();
                return false;
            }
            else
                if(apellido.value === ""){
                    alert("falta apellido");
                    apellido.focus();
                    return false;
                }else
                     if(edad.value === ""){
                         alert("Falta la edad");
                         edad.focus();
                         return false;
                     }else
                     if(telefono.value === ""){
                         alert("falta telefono");
                         telefono.focus();
                         return false;
                     }else
                     if(correo.value === ""){

                         alert("Falta correo");
                         correo.focus();
                         return false;
                     }else
                     if(correo.value===" "){
                     alert("Falta correo");
                     correo.focus();
                     return false;
                     }else{
                     if (primero !== -1 && ultimo !== -1 && ultimo !== cadena.length -1  && primero===ultima) {

                             if(contra.value ===""){
                                 alert("Falta contraseña");
                                 contra.focus();
                                 return false;
                             }else
                             if(sexo.value === ""){
                                 alert("Falta sexo");
                                 return false;
                             }else{
                                  if(contra2.value ===""){
                                    alert("Repite la contraseña");
                                    contra2.focus();
                                    return false;
                                  }else{
                                    if(contra.value=== contra2.value){
                                       goRegistroProfesor();
                                    }else{
                                      alert("Las contraseñas no coinciden");
                                      contra2.focus();
                                      return false;
                                    }
                                  }
                             }
                     }else{
                     alert("Ingresa un correo valido");
                     correo.focus();
                     return false;
                     }
                 }

    }

    function runEnter(e) {
      if(e.keyCode == 13) {
        var obj=document.getElementById('Enviar');
        obj.click();
      }
    }
