function confirmar(gustos,edad,altura,peso,sexo,id){
  if(confirm("quieres confirmar los cambios")){
    web=`editarElemento.php?fid=${id}&fpeso=${peso.value}&fgustos=${gustos.value}&faltura=${altura.value}&fsexo=${sexo.value}&fedad=${edad.value}`
    window.location = web;
    alert("aceptado");
  }else{
    window.location = "verElementos.php"

  }
}
