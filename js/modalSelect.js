function changeFunc(id){
  if(id =="sesionCliente") {
    $("#sesionCliente").modal('show');
  }
  else if(id =="sesionEmpleado") {
    $("#sesionEmpleado").modal('show');
  }
}

function volver() {
  var e = document.getElementById("Contenido");
  e.selectedIndex = 0;
}
