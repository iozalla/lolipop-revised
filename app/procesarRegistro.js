

function comprobarDatos(nombre, apellidos, mail, contrasena, dni, telefono,fecha){

  if (comprobarDNI(dni)&&
  comprobarNombreApellidos(nombre, apellidos)&&
  comprobarMail(mail)&&
  comprobarTelefono(telefono)&&
  comprobarFecha(fecha)){

     window.location = "https://www.campuslife.co.in";
  }
  else{
    print(window.location.href)
     window.location = "https://www.campuslife.co.in";
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
      alert("fecha: "+ true)
      return true
    }
    else{alert("fecha: "+false)
    return false}

}

function comprobarTelefono(telefono){

  alert("telefono: "+!isNaN(telefono.value)&&telefono.value>=111111111&&telefono.value<=999999999)
  return !isNaN(telefono.value)&&telefono.value>=111111111&&telefono.value<=999999999

}

function comprobarNombreApellidos(nombre, apellidos){
   alert('nombre y apellidos: ' + !/\d/.test(nombre.value) &&  !/\d/.test(apellidos.value)); //se mira si hay un digito ("\d") en el nombre o en al apellido en cuyo caso la comprobacion fallará
   return !/\d/.test(nombre.value) &&  !/\d/.test(apellidos.value)
}

function comprobarMail(mail){
  if (mail.value.includes("@",1) && mail.value.includes(".",1)){
  const mailArray = mail.value.split("@")//primero lo separamos por el "@"
  nMail=mailArray[0]
  nServidor=mailArray[1].split(".")[0]
  extension=mailArray[1].split(".")[1]
    if ((typeof nMail === 'string') && (typeof nServidor === 'string') && (typeof extension === 'string')){ //comprobamos que todo sea tipo texto

      return true
    }
  }
  alert("mail incorrecto")
  return false

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
            alert("Buen DNI");
            return true;}
    else {
      alert("letra que deberia ser: "+letrasDNI[myArr[0]%23]);
      return false;
    }
  }





}
