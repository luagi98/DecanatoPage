function uploadStory(){
  var title,desc,date,image,videoURL;
  title = document.getElementById("title").value;
  desc = document.getElementById("descriptionText").value;
  date = document.getElementById("originalDate").value;
  videoURL = document.getElementById("videoURL").value;
  //validar aqui
  var form_data = new FormData();
  form_data.append("title", title);
  form_data.append("desc", desc);
  form_data.append("date", date);
  form_data.append("url", videoURL);

  form_data.append("image1", document.getElementById('formFile1').files[0]);
  form_data.append("image2", document.getElementById('formFile2').files[0]);
  form_data.append("image3", document.getElementById('formFile3').files[0]);

  fetch('ajax.php?mode=registroHistorias', {
      method: 'POST',
      body: form_data
  }).then(function (response) {
      return response.text();
  }).then(function (data) {
         if(data==1) {
            alert("Se registro exitosamente!");
          }else {
             alert(data);
          }
  }).catch((error) => console.log(error));



}

function editStory(){
  var title,desc,date,image,historiaId,videoURL;
  title = document.getElementById("title").value;
  desc = document.getElementById("descriptionText").value;
  date = document.getElementById("originalDate").value;
  historiaId = document.getElementById("historiaId").value;
  videoURL = document.getElementById("videoURL").value;

  //validar aqui
  var form_data = new FormData();
  form_data.append("historiaId", historiaId);
  form_data.append("title", title);
  form_data.append("desc", desc);
  form_data.append("date", date);
  form_data.append("url", videoURL);

  form_data.append("image1", document.getElementById('formFile1').files[0]);
  form_data.append("image2", document.getElementById('formFile2').files[0]);
  form_data.append("image3", document.getElementById('formFile3').files[0]);

  fetch('ajax.php?mode=editarHistorias', {
      method: 'POST',
      body: form_data
  }).then(function (response) {
      return response.text();
  }).then(function (data) {
         if(data==1) {
            alert("Se edito exitosamente!");
          }else {
             alert(data);
          }
  }).catch((error) => console.log(error));



}

function deleteStory(historiaId){
  //validar aqui
  var form_data = new FormData();
  form_data.append("historiaId", historiaId);

  fetch('ajax.php?mode=eliminarHistoria', {
      method: 'POST',
      body: form_data
  }).then(function (response) {
      return response.text();
  }).then(function (data) {
         if(data==1) {
            alert("Se elimino exitosamente!");
            location.reload();
          }else {
             alert(data);
          }
  }).catch((error) => console.log(error));

  //elimiar por ajax?
  //pedir confirmacion

}

function goEditStory(historiaId){
    location.assign("?view=conf_linea&historiaId="+historiaId);
}
