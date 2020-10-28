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
        
// Obtener datos de Representantes Locales
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

// Obtener datos de Representantes Locales
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

    })


   

});