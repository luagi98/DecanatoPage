
$( document ).ready(function() {
    $(".chosen").chosen();
});


function goRegistroHerra() {

  var idHerra = [];
  var cantHerra = [];

  $.each($(".nombreHerra option:selected"), function(){
      idHerra.push($(this).val());
  });

  $("input[name='herramientasCantidad[]']").each(function() {
      cantHerra.push($(this).val());
  });



  var datos = {
   'idHerra':idHerra,
   'cantHerra':cantHerra
 }
 console.log(JSON.stringify(datos));
 var form_data = new FormData();
 $.each(datos, function(key, value){
    form_data.append(key, value);
 });

  //
  $.ajax({
   url:"ajax.php?mode=registroHerramienta",
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
