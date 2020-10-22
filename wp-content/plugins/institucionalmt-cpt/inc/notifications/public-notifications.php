<?php 

/**
 * Notificar a un usuario cuando se aprueba su comentario en un post
 */
add_action('comment_post', 'institucionalmt_comment_post_notification', 10, 3);

function institucionalmt_comment_post_notification($comment_id, $comment_approved, $commentdata)
{
    if (1 === $comment_approved) {

        $comment_author = get_comment_author( $comment_id );
        $comment_author_email = get_comment_meta( $comment_id, 'comment_author_email' );
        $permalink = get_comment_link($comment_id);

        // email values
        $recipient[] = sprintf('%s <%s>', $comment_author, $comment_author_email);
        $carbon_copy = '';
        $subject_line = sprintf('Comentario aprobado');
        $email_body = sprintf('%s, su comentario ha sido aprobado', $comment_author);
        $email_body .= sprintf('Ver comentario: %s', $permalink);
        $attachment = '';
        $headers[] = '';

        wp_mail($recipient, $subject_line, $email_body, $headers);
    }
}