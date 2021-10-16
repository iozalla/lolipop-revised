
function comprobarDatos(nombre, apellidos, dni, telefono,fecha,sexualidad,gustos){

  if (comprobarDNI(dni)&&
  comprobarNombreApellidos(nombre, apellidos)&&

  comprobarTelefono(telefono)&&
  comprobarFecha(fecha)){

    web=window.location.href.replace("profile.php","profileEdition.php");
    web=`${web}?fsexualidad=${sexualidad.value}&fnombre=${nombre.value}&fapellidos=${apellidos.value}&fdni=${dni.value}&ftelefono=${telefono.value}&ffechanac=${fecha.value}&fgustos=${gustos.value}`

    window.location = web;

    alert("registro")
  }
  else{
    alert("datos incorrectos")
    location.reload();
  }
}
function comprobarFecha(fecha){
  const fechaArray = fecha.value.split("-")
  if (fechaArray.length==3
    && !isNaN(fechaArray[0])
    && !isNaN(fechaArray[1])
    && !isNaN(fechaArray[2])
    && fechaArray[0].length>0
    && fechaArray[1].length>0
    && fechaArray[2].length>0
    && fechaArray[0]<=30
    && fechaArray[1]<=12
    && fechaArray[2]<=3000){

      return true
    }
    else{alert("fecha: "+false)
    return false}

}

function comprobarTelefono(telefono){

  if("telefono: "+!isNaN(telefono.value)&&telefono.value>=111111111&&telefono.value<=999999999){
    return true
  }
  else{
  alert("telefono incorrecto")
    return false}

}

function comprobarNombreApellidos(nombre, apellidos){
   if('nombre y apellidos: ' + !/\d/.test(nombre.value) &&  !/\d/.test(apellidos.value)){//se mira si hay un digito ("\d") en el nombre o en al apellido en cuyo caso la comprobacion fallará
    return true
  }else{
      alert ("nombre o apellido incorrecto")
      return false
  }

}




function comprobarDNI(fdni){
  const myArr = fdni.value.split("-")//primero lo separamos por el "-"
  const letrasDNI=["T", "R", "W", "A", "G", "M","Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"]

  if((myArr.length==2)){//miramos que solo se hayan quedado 2 partes
    const numDNI=myArr[0]
    const letraDNI=myArr[1].toUpperCase()  //pasamos la letra a mayusculas para que coincida con las de la lista


    if ((!isNaN(numDNI))//miramos que la primera parte sea un numero
        && (numDNI>=11111111)//miramos que el dni tenga 8 digitos numericos
        && (numDNI<=99999999)
        && (letrasDNI[myArr[0]%23]==myArr[1])) {//comprobamos que la letra del dni este bien

            return true;}
    else {
      alert("letra que deberia ser: "+letrasDNI[myArr[0]%23]);
      return false;
    }
  }





}
