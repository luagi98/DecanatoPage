function login(){
    var connect, form, response, result, user, pass, sesion;

    //***************OBTENER VARIABLES DE LA URL*************//
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    ///******************************************************//
    email = document.getElementById('email').value;
    pass = document.getElementById('password').value;
    var form_data = new FormData();
    form_data.append("usuario", email);
    form_data.append("contra", pass);

    fetch('ajax.php?mode=loginUsuario', {
      headers: { "Content-Type": "application/x-www-form-urlencoded; charset=utf-8" },
      method: 'POST',
      body:"usuario="+email+"&contra="+pass+""
    })
    .then(function (response) {
        return response.text();
    }).then(function (data) {
           if(data==1) {
                // $('#idnav').load('public_html/overall/navbar.php'+ '#reload');
              // window.history.back();
              location.assign("?view=conf_fototeca");
            }else {
               alert(data);
            }
    }).catch((error) => console.log(error));
}
