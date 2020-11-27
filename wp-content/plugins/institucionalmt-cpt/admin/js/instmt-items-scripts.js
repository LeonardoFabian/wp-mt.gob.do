jQuery(document).ready(function($){

  /**
   * Inicializando el select Materialize
   */
  $("select").formSelect();

  /**
  * Inicializando Tooltips Materialize
  */
 
  $('.tooltipped').tooltip()




  /**
   * Preloader Materialize
   */
  var $preloader = $(".instmt-preloader"),
    editPageURL = "?page=instmt_items&action=edit&id=";

  /**
   * Inicializando el modal Materialize
   */
  $(".modal").modal();

  /**
  * Inicializando Date Picker Materialize
  * unpublish_date
  */
  const MATERIALIZE_CALENDAR = document.querySelectorAll('.datepicker'); 
      
    M.Datepicker.init( MATERIALIZE_CALENDAR, {
        format: 'dd-mm-yyyy',
        showClearBtn: true,
        i18n: {
            clear: 'limpiar',
            cancel: 'cancelar',
            done: 'aceptar'
        },
        container: 'body'
    });

   /**
   * Inicializando Character Counter Materialize
   */
  $(".char-counter").characterCounter();

    /**
   * Modal con formulario para crear nueva tabla
   */
  $(".add-instmt-table").on("click", function (e) {
    e.preventDefault();

    // Abrir ventana modal
    //$("#modal_add_instmt_table").modal("open");
  });

  /**
   * Evento para guardar el registro en la base de datos
   * utilizando AJAX
   */
  $("#btn-create-instmt-item").on("click", function (e) {
    e.preventDefault();

    var $itemName = $("#instmt-item-name"), iName = $itemName.val();
    var $itemPostType = $("#instmt-item-post-type"), iPostType = $itemPostType.val();

    if ( iName != "" ) {
      $preloader.css("display", "flex");

      // Enviar datos utilizando AJAX
      $.ajax({
        url: instmt_table.url,
        type: "POST",
        dataType: "json",
        data: {
          action: "instmt_create_new_item",
          nonce: instmt_table.security,
          nombre: iName,
          tipo: iPostType,
        },
        success: function (data) {
          if (data.result) {
            editPageURL += data.insert_id;

            setTimeout(function () {
              location.href = editPageURL;
            }, 1300);
          }
        },
        error: function (d, x, v) {
          console.log(d);
          console.log(x);
          console.log(v);
        },
      });
    } else {
      $preloader.css("display", "none");

      if (!$itemName.hasClass("invalid")) {
        $itemName.addClass("invalid");
      }
      if( ! $itemPostType.hasClass("invalid")) {
        $itemPostType.addClass("invalid");
      }
    }
  });

  /**
   * Obtener listado de categorías de documentos
   */
  var $selectCategoriasDeDocumentos = $(".instmt-select-document-categories");

  $selectCategoriasDeDocumentos.on("change", function () {
    $("#modal_add_instmt_table").css("background", "red");
  });


  /**
   * Subir archivo al gestor de medios
   */

  var uploadFrame,
      btnUploadFile = $("#instmt-btn-upload-new-file"),
      inputFileURL = $("#instmt-input-file-url");

  btnUploadFile.on("click", function () {
  if (uploadFrame) {
    uploadFrame.open();
    return;
  }

    uploadFrame = wp.media({
    frame: "post", // post, select
    title: "Subir un archivo",
    button: {
      text: "Añadir la url de este archivo",
    },
    multiple: false, // Seleccioanr mas de un archivo, si es true, no usar .first() al traer el json y usar el indice de toJSON[#]
    library: {
      order: "DESC",
      orderby: "date",
      type: "application/pdf",
      //search : '', // buscar por el titulo del archivo
      //uploadedTo : 17 // medios subidos a un id de post
    },
  });

  uploadFrame.on("select", function () {
    //var archivo = marco.state().get( 'selection' );

    // OBTENIENDO INFORMACION EN ARRAY
    //var archivo = marco.state().get( 'selection' ).toArray()[0]; // Mostrar atributos de un archivo seleccionado
    //var archivo = marco.state().get( 'selection' ).toArray()[0].attributes.url; // Mostrar atributos de un archivo seleccionado

    // OBTENIENDO INFORMACION EN JSON
    //var archivo = marco.state().get( 'selection' ).toJSON()[0].url; // Mostrar atributos de un archivo seleccionado
    // var archivo = marco.state().get( 'selection' ).first().toJSON().url; // Mostrar atributos de un archivo seleccionado
    var archivo = uploadFrame.state().get("selection").first().toJSON(); // Mostrar atributos de un archivo seleccionado

    console.log(archivo);
    $('.url').html(archivo.url);
    $(".document-file-title").html("Nombre del archivo: " + archivo.filename);
    $(".document-file-type").html("Tipo de archivo: " + archivo.subtype);
    $(".document-file-size").html(
      "Tamaño de archivo: " + archivo.filesizeHumanReadable
    );
  });

  uploadFrame.on("insert", function () {
    uploadFrame
      .state()
      .get("selection")
      .map(function (v) {
        var e = v.toJSON();

        console.log("evento insert");
        console.log(e);
        inputFileURL.val(e.url);
        $(".document-file-title").html("Nombre del archivo: " + e.filename);
        $(".document-file-type").html("Tipo de archivo: " + e.subtype);
        $(".document-file-size").html(
          "Tamaño de archivo: " + e.filesizeHumanReadable
        );
      });
  });

  // uploadFrame.on("ready", function () {
  //   // cuando abre el gestor de medio
  //   console.log("Evento Ready gestor de medios");
  // });

  // uploadFrame.on("attach", function () {
  //   // cuando abre el gestor de medio cuando se añaden los elementos al DOM en el gestor de medios
  //   console.log("Evento Attach");
  // });

  // uploadFrame.on("open", function () {
  //   // cuando abre la ventana del gestor de medio
  //   console.log("Evento Open");
  // });

  // uploadFrame.on("escape", function () {
  //   // cuando se presiona la tecla ESC desde el gestor de medio
  //   console.log("Evento Escape");
  // });

  // uploadFrame.on("close", function () {
  //   // cuando se cierra el gestor de medio
  //   console.log("Evento Close");
  // });

  // uploadFrame.on("activate", function () {
  //   // cuando se activa algun estado: "select", "post"
  //   console.log("Evento Activate");
  // });

  uploadFrame.open();
});


});