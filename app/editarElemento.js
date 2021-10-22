function confirmar(gustos,edad,altura,peso,sexo,id,accion){

  accs=["editarElemento.php","borrarElemento.php"]
  if(confirm("¿Quieres confirmar los cambios?")){
    web=`${accs[accion]}?fid=${id}&fpeso=${peso.value}&fgustos=${gustos.value}&faltura=${altura.value}&fsexo=${sexo.value}&fedad=${edad.value}`
    window.location = web;

  }else{
    window.location = "verElementos.php"

  }
}
