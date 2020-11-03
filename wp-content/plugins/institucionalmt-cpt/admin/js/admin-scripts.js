jQuery(document).ready(function($){

    //console.log( instmt_object );
  

var $button = $('.nombre');

$button.on('keyup', function(){

    $.ajax({

        url : instmt_object.url,
        method : 'POST',
        dataType : 'json',
        data : {
            action : 'admin_search', // nombre del gancho a usar en instmt-core
            nonce : instmt_object.security,
            nombre : $('.nombre').val(),
        }, success: function ( data ){

            console.log( data.result );

        }

    });

});
        
// OBTENER DATOS DE REPRESENTANTES LOCALES

var $representanteID = $('#representante');
var $cargo = $('#instmt_rep_cargo');
var $flota = $('#instmt_rep_flota');
var $correo = $('#instmt_rep_correo');
var $nombre = $('#instmt_rep_nombre');

$representanteID.on('change', function(){

    //console.log($representante.val());

    $.ajax({

        url : instmt_object.url,
        method : 'POST',
        dataType : 'json',
        data : {
            action : 'cargar_datos_representantes', // nombre del gancho a usar en instmt-core
            nonce : instmt_object.security,
            id : $representanteID.val(),
            tipo: 'cargando'
        }, success: function ( data ){

            console.log(data);

            $cargo.val(data.cargo);
            $flota.val(data.flota);
            $correo.val(data.correo);     
            $nombre.val(data.nombre);    

        }

    });

});

//console.log(instmt_object.current_user_id);


// ACTUALIZAR DATOS DE REPRESENTANTES LOCALES DESDE OTRO MENU

var $guardarRepresentante = $('#actualizar-representante-rlt');
var $nombre_rep  = $('#instmt_rep_nombre');
var $representanteID = $('#id-representante-rlt');
var $cargo_rep = $('#instmt_rep_cargo');
var $flota_rep = $('#instmt_rep_flota');
var $correo_rep = $('#instmt_rep_correo');

$guardarRepresentante.on('click', function(){

    //console.log($representante.val());

    $.ajax({

        url : instmt_object.url,
        method : 'POST',
        dataType : 'json',
        data : {
            action : 'cargar_datos_representantes', // nombre del gancho a usar en instmt-core
            nonce : instmt_object.security,
            id : $representanteID.val(),
            tipo: 'guardando',
            nombre: $nombre_rep.val(),
            cargo : $cargo_rep.val(),
            flota : $flota_rep.val(),
            correo : $correo_rep.val(),            
        }, success: function ( data ){

            console.log(data);

            if( data.result == 'success' ){

                // alert( "Se han actualizado los datos del Representante: " + data.representante );

                $.notify({
                    icon    :   'glyphicon glyphicon-ok',
                    title   :   'Actualizado: ',
                    message :   traductor.actualizar.success + data.representante
                }, {
                    placement: {
                        from    :   'top',
                        align   :   'right'
                    }, 
                    type    :   'success',
                    delaye  :   4000,                                          
                    z_index :   9999999
                });

                var datos = {
                    'actualizado' : 'true',
                    'current_user_id' : instmt_object.current_user_id,
                    'user_update' : $representanteID.val()
                }

                // Notificar actualizacion a los demas usuarios conectados
                wp.heartbeat.enqueue( 'instmt_notificacion', datos, false );

            } else if ( data.result == 'error' ){

                $.notify({
                    icon    :   'glyphicon glyphicon-exclamation-sign',
                    title   :   'Error: ',
                    message :   traductor.actualizar.error
                }, {
                    placement: {
                        from    :   'top',
                        align   :   'right'
                    }, 
                    type    :   'danger',
                    delaye  :   4000,                                          
                    z_index :   9999999
                });

                // alert( "Ha ocurrido un error al intentar guardar los datos" );

            }

        }

    });

});




// OBTENER DATOS DE ENCARGADOS OTE

var $encargadoID = $('#encargado');
var $cargo = $('#instmt_enc_cargo');
var $flota = $('#instmt_enc_flota');
var $correo = $('#instmt_enc_correo');
var $nombre = $('#instmt_enc_nombre');



$encargadoID.on('change', function(){

    //console.log($representante.val());

    $.ajax({

        url : instmt_object.url,
        method : 'POST',
        dataType : 'json',
        data : {
            action : 'cargar_datos_encargados_ote', // nombre del gancho a usar en instmt-core
            nonce : instmt_object.security,
            id : $encargadoID.val(),
            tipo: 'cargando'
        }, success: function ( data ){

            console.log(data);

            $cargo.val(data.cargo);
            $flota.val(data.flota);
            $correo.val(data.correo);     
            $nombre.val(data.nombre);    

        }

    });

});

// ACTUALIZAR DATOS DE ENCARGADOS OTE DESDE OTRO MENU

var $guardar = $('#actualizar-encargado-ote');
var $nombre  = $('#instmt_enc_nombre');
var $encargadoID = $('#id-encargado-ote');
var $cargo = $('#instmt_enc_cargo');
var $flota = $('#instmt_enc_flota');
var $correo = $('#instmt_enc_correo');

$guardar.on('click', function(){

    //console.log($representante.val());

    $.ajax({

        url : instmt_object.url,
        method : 'POST',
        dataType : 'json',
        data : {
            action : 'cargar_datos_encargados_ote', // nombre del gancho a usar en instmt-core
            nonce : instmt_object.security,
            id : $encargadoID.val(),
            tipo: 'guardando',
            nombre: $nombre.val(),
            cargo : $cargo.val(),
            flota : $flota.val(),
            correo : $correo.val(),            
        }, success: function ( data ){

            //console.log(data);

            if( data.result == 'success' ){

                // alert( "Se han actualizado los datos del Encargado " + data.encargado );

                $.notify({
                    icon    :   'glyphicon glyphicon-ok',
                    title   :   'Actualizado: ',
                    message :   'Se han actualizado los datos del Encargado: ' + data.encargado
                }, {
                    placement: {
                        from    :   'top',
                        align   :   'right'
                    }, 
                    type    :   'success',
                    delaye  :   4000,                                          
                    z_index :   9999999
                });

                var datos = {
                    'actualizado' : 'true',
                    'current_user_id' : instmt_object.current_user_id,
                    'user_update' : $encargadoID.val()
                }

                // Notificar actualizacion a los demas usuarios conectados
                wp.heartbeat.enqueue( 'instmt_notificacion', datos, false );

            } else if ( data.result == 'error' ){

                // alert( "Ha ocurrido un error al intentar guardar los datos" );

                $.notify({
                    icon    :   'glyphicon glyphicon-exclamation-sign',
                    title   :   'Error: ',
                    message :   'Ha ocurrido un error al intentar guardar los datos'
                }, {
                    placement: {
                        from    :   'top',
                        align   :   'right'
                    }, 
                    type    :   'danger',
                    delaye  :   4000,                                          
                    z_index :   9999999
                });

            }

        }

    });

});

// Heartbeat API

wp.heartbeat.interval('fast'); // fast = 15 seg

$(document)
    // .on( 'heartbeat-send', function( event, data ){

    //     data.nombre = 'Leonardo';

    //     console.log('Ejecutando evento heartbeat-send');

    // })
    // .on( 'heartbeat-tick.instmt', function( event, data ){

    //     if( data.hasOwnProperty( 'mensaje' ) ) {          

    //         console.log( data.mensaje );
    //         console.log( data.screen_id );

    //     }        

    // })
    .on( 'heartbeat-tick.instmt_notificacion', function( event, data ){

        if( data.hasOwnProperty( 'instmt_notificacion' ) ) {          

            if(data.instmt_notificacion == 'true'){

                $.notify({
                    icon    :   data.updater.avatar,
                    title   :   data.updater.display_name,
                    message :   'Ha actualizado los datos de ' + data.user_updated.display_name
                }, {
                    placement: {
                        from    :   'bottom',
                        align   :   'left'
                    }, 
                    type    :   'minimalist',
                    delaye  :   4000,
                    icon_type : 'image',
                    template : '<div data-notify="container" class="col-xs-11 col-sm-8 col-md-3 alert alert-{0}" role="alert">' +
                                    '<img data-notify="icon" class="img-circle pull-left">' +
                                    '<span data-notify="title">{1}</span>' +
                                    '<span data-notify="message">{2}</span>' +
                                '</div>',                   
                    z_index :   9999999
                });

            }

        }    
        
        var datos = {
            'actualizado' : 'false',
            'current_user_id' : instmt_object.current_user_id
        }

        // Enviando el indice instmt_notificacion al heartbeat
        wp.heartbeat.enqueue( 'instmt_notificacion', datos, false );

    });

    var marco, 
    $btnMarco = $('#btnCargarArchivos');

    $btnMarco.on('click', function(){

        if(marco){
            marco.open();
            return;
        }

        var marco = wp.media({
            frame : 'post', // post, select
            title : 'Seleccionar un archivo',
            button : {
                text : 'Usar este archivo'
            },
            multiple : false, // Seleccioanr mas de un archivo, si es true, no usar .first() al traer el json y usar el indice de toJSON[#]
            library : {
                order: 'DESC',
                orderby: 'date',
                type: 'application/pdf',
                //search : '', // buscar por el titulo del archivo
                //uploadedTo : 17 // medios subidos a un id de post
            }
        });

        marco.on('select', function(){

            //var archivo = marco.state().get( 'selection' );

            // OBTENIENDO INFORMACION EN ARRAY
            //var archivo = marco.state().get( 'selection' ).toArray()[0]; // Mostrar atributos de un archivo seleccionado
            //var archivo = marco.state().get( 'selection' ).toArray()[0].attributes.url; // Mostrar atributos de un archivo seleccionado

            // OBTENIENDO INFORMACION EN JSON
            //var archivo = marco.state().get( 'selection' ).toJSON()[0].url; // Mostrar atributos de un archivo seleccionado
            // var archivo = marco.state().get( 'selection' ).first().toJSON().url; // Mostrar atributos de un archivo seleccionado
            var archivo = marco.state().get( 'selection' ).first().toJSON(); // Mostrar atributos de un archivo seleccionado

            console.log(archivo);
            $('#instmt_documentos_archivo').val(archivo.url);
            $('.document-file-title').html("Nombre del archivo: " + archivo.filename);
            $('.document-file-type').html("Tipo de archivo: " + archivo.subtype);
            $('.document-file-size').html("Tamaño de archivo: " + archivo.filesizeHumanReadable);

        });

        marco.on('insert', function(){

            marco.state().get('selection').map(function(v){

                var e = v.toJSON();

                console.log( "evento insert");
                console.log(e);
                $('#instmt_documentos_archivo').val(e.url);
                $('.document-file-title').html("Nombre del archivo: " + e.filename);
                $('.document-file-type').html("Tipo de archivo: " + e.subtype);
                $('.document-file-size').html("Tamaño de archivo: " + e.filesizeHumanReadable);
                
            });                   

        });

        marco.on('ready', function(){
            // cuando abre el gestor de medio
            console.log('Evento Ready gestor de medios');
        });

        marco.on('attach', function(){
            // cuando abre el gestor de medio cuando se añaden los elementos al DOM en el gestor de medios
            console.log('Evento Attach');
        });

        marco.on('open', function(){
            // cuando abre la ventana del gestor de medio
            console.log('Evento Open');
        });

        marco.on('escape', function(){
            // cuando se presiona la tecla ESC desde el gestor de medio
            console.log('Evento Escape');
        });

        marco.on('close', function(){
            // cuando se cierra el gestor de medio
            console.log('Evento Close');
        });

        marco.on('activate', function(){
            // cuando se activa algun estado: "select", "post"
            console.log('Evento Activate');
        });

        marco.open();
    });


   

});