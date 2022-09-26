function obtenerFecha(e)
{

  var fecha = moment(e.value);
  console.log("Fecha original:" + e.value);
  console.log("Fecha formateada es: " + fecha.format("DD/MM/YYYY"));
}