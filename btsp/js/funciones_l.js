$(document).ready(function () {
  var consulta;
  //hacemos focus al campo de búsqueda
  $("#txt_l").focus();

  $("#btn_l").click(function (e) {
    //obtenemos el texto introducido en el campo de búsqueda
    consulta = $("#txt_l").val();
    //alert (consulta);
    //hace la búsqueda
    $.ajax({
      type: "POST",
      url: "busqueda_l.php",
      data: "b=" + consulta,
      dataType: "html",
      beforeSend: function () {
        //imagen de carga
        $("#capa_L").html(
          "<p align='center'><img src='images/ajax-loader.gif' /></p>"
        );
      },
      error: function () {
        alert("error petición ajax");
      },
      success: function (data) {
        $("#capa_L").empty();
        $("#capa_L").append(data);
      },
    });
  });

  //comprobamos si se pulsa una tecla
  $("#txt_l").keyup(function (e) {
    if (e.which != 13) return;
    //obtenemos el texto introducido en el campo de búsqueda
    consulta = $("#txt_l").val();
    //hace la búsqueda
    $.ajax({
      type: "POST",
      url: "busqueda_l.php",
      data: "b=" + consulta,
      dataType: "html",
      beforeSend: function () {
        //imagen de carga
        $("#capa_L").html(
          "<p align='center'><img src='images/ajax-loader.gif' /></p>"
        );
      },
      error: function () {
        alert("error petición ajax");
      },
      success: function (data) {
        $("#capa_L").empty();
        $("#capa_L").append(data);
      },
    });
  });
});

function cargar(div, desde) {
  $(div).load(desde);
}

function editar(id) {
  $.ajax({
    type: "POST",
    url: "edit_l.php",
    data: { operacion: "edicion", id_pers: id },
  }).done(function (html) {
    $("#capa_d").html(html);
  });
}

function borrar(id) {
  $.ajax({
    type: "POST",
    url: "edit_l.php",
    data: { operacion: "baja", id_pers: id },
  }).done(function (html) {
    $("#capa_l").html(html);
  });
}

function no_grabar(id) {
  //alert('GRABAR '+id);

  $.ajax({
    type: "POST",
    url: "edit_l.php",
    data: { operacion: "actualizar", id_pers: id },
  })
    .done(function (html) {
      $("#capa_l").html(html);
    })
    .false(function () {
      alert("Error al cargar modulo");
    });
}
