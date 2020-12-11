<?php

// PROCESS CONTACT FORM

//formulario privado
//add_action('admin_post_nopriv__themename_contactform', '_themename_send_contact_form');

// formulario publico
add_action('admin_post__themename_contactform', '_themename_send_contact_form');

function _themename_send_contact_form()
{
    // Verificar que los campos no esten vacios
    if (
        empty($_POST['_themename-txtname']) ||
        empty($_POST['_themename-txtemail']) ||
        empty($_POST['_themename-txtsubject']) ||
        empty($_POST['_themename-txtmessage'])
    ) :

        // enviar al usuario a la misma pagina con una variable GET de error
        wp_redirect(add_query_arg(array('errormsg' => "ERROR! Campos incompletos"), get_home_url() . '/contacto'));
        exit;

    else :

        // sanitizar los valores
        $nombre = sanitize_text_field($_POST['_themename-txtname']);
        $userEmail = sanitize_email($_POST['_themename-txtemail']);
        $asunto = sanitize_text_field($_POST['_themename-txtsubject']);
        $mensaje = sanitize_text_field($_POST['_themename-txtmessage']);

        // validaciones 
        if (is_email($userEmail)) {
            $confirmedEmail = $userEmail;
        } else {
            wp_redirect(add_query_arg(array('errormsg' => 'ERROR! Debe suministrar un correo valido')));
        }

        // enviar correo electronico
        wp_mail($confirmedEmail, "Formulario de contacto", $nombre . "<br>Asunto:<br>" . $asunto .  "<br>Mensaje:<br>" . $mensaje);

    endif;

    // Redireccionar al usuario a la pagina con una variable de exito
    wp_redirect(add_query_arg(array('success' => 'Su mensaje ha sido enviado con éxito'), get_home_url() . '/contacto?exito=1'));
    exit;
}


