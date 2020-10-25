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

   

});