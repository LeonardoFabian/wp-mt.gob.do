jQuery(document).ready(function($){

    // Boton para mostrar y ocultar datos de las Representaciones Locales
    var $iconRLT = $('.rlt-icon');

    $iconRLT.on('click', function(){

        var $btnStatus = $(this).attr("status");

        // alert("hola perico");

        if($btnStatus == 0){
            
            $(this).removeClass('fa-arrow-down');
            $(this).addClass('fa-arrow-up');
            $(this).attr('status',1);
            
        } else {
            
            $(this).removeClass('fa-arrow-up');
            $(this).addClass('fa-arrow-down');
            $(this).attr('status',0);

        }

    });

    var $btnRLT = $('.rlt-btn');

    $btnRLT.on('click', function(){

        var $btnStatus = $(this).attr("status");

        // alert("hola perico");

        if($btnStatus == 0){
            
            $(this).children('.rlt-icon').removeClass('fa-arrow-down');
            $(this).children('.rlt-icon').addClass('fa-arrow-up');
            $(this).attr('status',1);
            
        } else {
            
            $(this).children('.rlt-icon').removeClass('fa-arrow-up');
            $(this).children('.rlt-icon').addClass('fa-arrow-down');
            $(this).attr('status',0);

        }

    });

});