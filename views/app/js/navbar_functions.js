// const altura = document.body.scrollHeight - window.innerHeight;
// const fondo = document.getElementById('fondo');
//
// window.onscroll = () => {
// 	const anchoFondo = (window.pageYOffset / altura) * 700;
// 	if(anchoFondo <= 100){
// 		fondo.style.width = anchoFondo + '%';
// 	}
// }

function ve_fototeca(){
    console.log('Procesando');
    location.assign("?view=fototeca");
}

function ve_antecedentes(){
    console.log("Procesando");
    location.assign("?view=antecedentes");
}

function ve_exposiciones(){
    console.log("Procesando");
    location.assign("?view=exposiciones");
}

function ve_competencias(){
    console.log("Procesando");
    location.assign("?view=competencias");
}

function ve_linea_del_tiempo(){
    console.log("Procesando");
    location.assign("?view=linea_del_tiempo");
}

function ve_conf_fototeca(){
    console.log('Procesando');
    location.assign("?view=conf_fototeca");
}

function ve_conf_linea_del_tiempo(){
    console.log("Procesando");
    location.assign("?view=conf_linea");
}

function ve_cerrar_sesion(){
    console.log("Procesando");
    var form_data = new FormData();
    fetch('ajax.php?mode=cerrarSesionUsuario', {
        method: 'POST',
        body: form_data
    }).then(function (response) {
        return response.text();
    }).then(function (data) {
           if(data==1) {
              alert("Se cerró sesión exitosamente!");
              location.assign("?view=antecedentes");
            }else {
               alert(data);
            }
    }).catch((error) => console.log(error));
}
