function uploadPicture(){
  var title,desc,date,image;
  title = document.getElementById("title").value;
  desc = document.getElementById("descriptionText").value;
  date = document.getElementById("originalDate").value;

  //validar aqui
  var form_data = new FormData();
  form_data.append("title", title);
  form_data.append("desc", desc);
  form_data.append("date", date);
  form_data.append("image", document.getElementById('formFile').files[0]);

  fetch('ajax.php?mode=registroFotos', {
      method: 'POST',
      body: form_data
  }).then(function (response) {
      return response.text();
  }).then(function (data) {
         if(data==1) {
              // $('#idnav').load('public_html/overall/navbar.php'+ '#reload');
            // window.history.back();
            // location.assign("?view=conf_fototeca");
            alert("Se registro exitosamente!");
          }else {
             alert(data);
          }
  }).catch((error) => console.log(error));



}

function editPicture(){
  var title,desc,date,image,fototecaId;
  title = document.getElementById("title").value;
  desc = document.getElementById("descriptionText").value;
  date = document.getElementById("originalDate").value;
  fototecaId = document.getElementById("fototecaId").value;

  //validar aqui
  var form_data = new FormData();
  form_data.append("fototecaId", fototecaId);
  form_data.append("title", title);
  form_data.append("desc", desc);
  form_data.append("date", date);
  form_data.append("image", document.getElementById('formFile').files[0]);

  fetch('ajax.php?mode=editarFotos', {
      method: 'POST',
      body: form_data
  }).then(function (response) {
      return response.text();
  }).then(function (data) {
         if(data==1) {
              // $('#idnav').load('public_html/overall/navbar.php'+ '#reload');
            // window.history.back();
            // location.assign("?view=conf_fototeca");
            alert("Se edito exitosamente!");
          }else {
             alert(data);
          }
  }).catch((error) => console.log(error));



}

function deletePicture(fototecaId){
  //validar aqui
  var form_data = new FormData();
  form_data.append("fototecaId", fototecaId);

  fetch('ajax.php?mode=eliminarFoto', {
      method: 'POST',
      body: form_data
  }).then(function (response) {
      return response.text();
  }).then(function (data) {
         if(data==1) {
              // $('#idnav').load('public_html/overall/navbar.php'+ '#reload');
            // window.history.back();
            // location.assign("?view=conf_fototeca");
            alert("Se elimino exitosamente!");
            location.reload();
          }else {
             alert(data);
          }
  }).catch((error) => console.log(error));

  //elimiar por ajax?
  //pedir confirmacion

}

function goEditPicture(fototecaId){
    location.assign("?view=conf_fototeca&fototecaId="+fototecaId);
}
