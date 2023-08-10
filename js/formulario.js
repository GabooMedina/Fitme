function validar() {
    var nombre, apellido, email,telefono, password1, password2;
    var expresion;
  
    nombre = document.getElementById("nombre").value;
    apellido= document.getElementById("apellido").value;
    password = document.getElementById("password").value;
    password2 = document.getElementById("password2").value;
    email = document.getElementById("correo").value;
    telefono = document.getElementById("telefono").value;
    
    expresion = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
  
    if (nombre.length >20) {
        swal("El Nombre debe Tener menos de 20 Caracteres", "");
      document.getElementById("nombre").focus();
      return false;
    } else if (apellido.length >20) {
        swal("El Apellidoe debe Tener menos de 20 Caracteres", "");
      document.getElementById("apellidos").focus();
      return false;
    } else if (!expresion.test(email)) {
        swal("El Formato de Email es Incorrecto", "");
      document.getElementById("email").value = "";
      document.getElementById("email").focus();
      return false;
    } else if (telefono.length != 10) {
      swal("El Teléfono debe tener exactamente 10 carácteres.","");
      document.getElementById("telefono").value = "";
      document.getElementById("telefono").focus();
      return false;
    } else if (isNaN(telefono)) {
      swal("El teléfono debe contener únicamente dígitos.","");
      document.getElementById("telefono").value = "";
      document.getElementById("telefono").focus();
      return false;
    } else if (password != password2) {
      swal("Las Contraseñas NO coinciden.","");
      document.getElementById("password").value = "";
      document.getElementById("password2").value = "";
      document.getElementById("password").focus();
      return false;
    }
  }