
$( document ).ready(function() {
    $(".chosen").chosen();
});


function goRegistroIngre() {

  var idIngre = [];
  var idMedida = [];
  var cantIngre = [];

  $.each($(".nombreIngre option:selected"), function(){
      idIngre.push($(this).val());
  });
  $.each($(".medidaIngre option:selected"), function(){
      idMedida.push($(this).val());
  });
  $("input[name='cantingre[]']").each(function() {
      cantIngre.push($(this).val());
  });



  var datos = {
    'idIngre':idIngre,
    'cantIngre':cantIngre,
    'idMedida':idMedida
 }
 console.log(JSON.stringify(datos));
 var form_data = new FormData();
 $.each(datos, function(key, value){
    form_data.append(key, value);
 });

  //
  $.ajax({
   url:"ajax.php?mode=registroIngrediente",
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
