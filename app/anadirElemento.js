
function anadir(gustos,peso,altura,edad,sexo){

    web=window.location.href.replace(".php","PHP.php");
    web=`${web}?fgustos=${gustos.value}&fpeso=${peso.value}&faltura=${altura.value}&fedad=${edad.value}&fsexo=${sexo.value}`
    window.location = web;


}
