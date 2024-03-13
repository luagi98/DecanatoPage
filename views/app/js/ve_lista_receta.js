function ve_lista_receta(id_lista,user){

    console.log('Procesando');
   location.assign("?view=listareceta&idlista=" + id_lista + "&user="+ user);
}

function ve_receta(id_receta){
    console.log('cargando');
    location.assign("?view=receta&idreceta="+id_receta);
}
