
function comprobarDatos(nombre, apellidos, mail, contrasena, dni, telefono,fecha,sexo,tarjeta){

  if (comprobarDNI(dni)&& contrasena.value!="" &&
  comprobarNombreApellidos(nombre, apellidos)&&
  comprobarMail(mail)&&
  comprobarTelefono(telefono)&&
  comprobarFecha(fecha)&&
  comprobarTarjeta(tarjeta)){

    web=window.location.href.replace("html","php");

    web=`${web}?fmail=${mail.value}&fcontrasena=${contrasena.value}&fnombre=${nombre.value}&fapellidos=${apellidos.value}&fdni=${dni.value}&ftelefono=${telefono.value}&ffechanac=${fecha.value}&fsexo=${sexo.value}&ftarjeta=${tarjeta.value}`

    window.location.href = web;


    return true;
  }
  else{

    location.reload();
  }
}
function comprobarContra(){
  let regContra = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
  regContra.test(contrasena)

  //comprueba que haya uno o varios caracteres de: minusculas, mayusculas, digitos, caracteres especiales y por ultimo comprueba que haya al menos 8 caracteres

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
    else{
    alert("Fecha incorrecta.")
    return false}

}

function comprobarTelefono(telefono){

  return !isNaN(telefono.value)&&telefono.value>=111111111&&telefono.value<=999999999

}
function comprobarTarjeta(tarjeta){

  return !isNaN(tarjeta.value)&&tarjeta.value.toString().length==20&&/\d/.test(tarjeta.value)
  //se mira si tiene 20 chars y si solo tiene digitos
}

function comprobarNombreApellidos(nombre, apellidos){
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
  alert("Mail incorrecto.")
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

            return true;}
    else {
      alert("La letra del DNI deberia ser: "+letrasDNI[myArr[0]%23]);
      return false;
    }
  }





}
