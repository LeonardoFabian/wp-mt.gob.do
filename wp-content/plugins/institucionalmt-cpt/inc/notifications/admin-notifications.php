<?php

/**
 * Notificar a un administrador via email cuando se realiza una publicación
 */
add_action('publish_post', 'institucionalmt_publish_post_notification', 10, 2);

function institucionalmt_publish_post_notification($post_id, $post)
{

    $author_id = $post->post_author;
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_email = get_the_author_meta('user_email', $author_id);
    $title = $post->title;
    $permalink = get_permalink($post_id);

    // email values
    $recipient[] = sprintf('%s <%s>', $author_name, $author_email);
    $carbon_copy = '';
    $subject_line = sprintf('Nueva publicación');
    $email_body = sprintf('La publicación "%s" se ha realizado con éxito', $title);
    $email_body .= sprintf('Ver publicación: %s', $permalink);
    $attachment = '';
    $headers[] = '';

    wp_mail($recipient, $subject_line, $email_body, $headers);
}


