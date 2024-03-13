function ajaxbusqueda(){

  if(document.getElementById('comensal0').checked == true){
    var comensal=1;
  }else if(document.getElementById('comensal1').checked == true){
    var comensal=2;
  }else if(document.getElementById('comensal2').checked == true){
    var comensal=3;
  }else if(document.getElementById('comensal3').checked == true){
    var comensal=4;
  }else if(document.getElementById('comensal4').checked == true){
    var comensal=5;
  }else if(document.getElementById('comensal5').checked == true){
    var comensal=6;
  }else{var comensal=1;}

  if(document.getElementById('orden0').checked == true){
    var mayor=1;
  }else var mayor=0;


  //valoracion=1


  if(document.getElementById('orden1').checked == true){
    var orden=100;
  }else if(document.getElementById('orden2').checked == true){
    var orden=2;
  }else if(document.getElementById('orden3').checked == true){
    var orden=3;
  }else if(document.getElementById('orden4').checked == true){
    var orden=4;
  }else if(document.getElementById('orden5').checked == true){
    var orden=5;
  }else if(document.getElementById('orden6').checked == true){
    var orden=6;
  }else var orden=1;
 //7 a la z


  if(document.getElementById('utensilios0').checked == true){
    var utensilios=1;
  }else utensilios=0;

  if(document.getElementById('ingredientes0').checked == true){
    var ingredientes=1;
  }else ingredientes=0;


  var grasas=document.getElementById('grasas').value;
  var fibra=document.getElementById('fibra').value;
  var carbohidratos=document.getElementById('carbohidratos').value;
  var proteinas=document.getElementById('proteinas').value;
  var colesterol=document.getElementById('colesterol').value;
  var calorias=document.getElementById('calorias').value;

  var busqueda= document.getElementById('buscare').value;
  var user= document.getElementById('usere').value;
  // alert(busqueda);

  //alert(chequeo);
  var datastring= 'comensal='+comensal+'&mayor='+mayor+'&orden='+orden+'&utensilios='+utensilios+'&ingredientes='+ingredientes+'&idUser='+user
  +'&grasas='+grasas+'&fibra='+fibra+'&carbohidratos='+carbohidratos+'&proteinas='+proteinas+'&colesterol='
  +colesterol+'&calorias='+calorias+'&busquedas='+busqueda;
  console.log(datastring);
  $.ajax({
    type:"post",
    url: "core/bin/ajax/goFiltros.php",
    data: datastring,
    cache: false,
    success:function(html) {
       $('#resultadoBusqueda').html(html);
    }
  });
}
