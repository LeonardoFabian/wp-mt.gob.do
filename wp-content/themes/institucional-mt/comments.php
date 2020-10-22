<hr>
<div class="comment-list" id="comments">

    <div class="comments-header">
        <h2 class="comment-reply-title">
            <?php 
            if( !have_comments()){
                echo "Deja un comentario.";
            } else {
                echo get_comments_number() . " Comentarios.";
            }
            ?>
        </h2>
    </div>

    <div class="comments-inner">

    <?php
        wp_list_comments(
            array(
                'avatar_size' => 120,
                'style' => 'div'                
            )
        );
    ?>
        <!--
        <div id="comment-1" class="comment eve thread-even depth-1 parent">
            <article id="div-comment-1" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <a href="#" rel="external" alt="">
                            <img src="" class="avatar avatar-120 photo" height="120">
                            <span class="fn">A wordpress commenter</span>
                            <span class="says sr-only">says:</span>

                            <div class="comment-metadata">
                                <a href="">
                                    <time datetime="200-03-25T20:07:51+00:00" title="September 16, 2020 at 9:00 am">September 16, 2020 at 9:00 am</time>
                                </a>
                            </div>
                        </a>
                    </div>
                </footer>
            </article>
        </div>
        -->
    </div> <!-- .comments-inner -->
</div> <!-- #comments -->

<hr class="" aria-hidden="true">

<?php 
    /* Si la pagina permite comentarios */
    if ( comments_open() ){
        comment_form(
            array(
                'class_form' => '',
                'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                'title_reply_after' => '</h2>'
            )
        );
    }
?>

<!--
<div id="respond" class="comment-respond">
    <h2 id="reply-title" class="comment-reply-title">Deja un respuesta
        <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;" ></a></small>
    </h2>
</div>
    -->