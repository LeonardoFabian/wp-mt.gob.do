<div class="container">
    <header class="article-header">
        <h2 class="the-post-title my-3"><?php the_title(); ?></h2>
        <div class="post-meta my-3">
            <span class="text-muted">Publicado por: <a href="" class="text-decoration-none">Usuario</a> el <?php the_date(); ?></span>
        </div>
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
        }
        ?>
    </header>
    <div class="single-content-description lead">
        <?php the_content(); ?>
    </div>
    <div class="tags-list text-muted my-3">
        <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>'); ?>
    </div>
    <div class="comments-count my-3">
        <span class="comment"><a href="#comments"><i class="fa fa-comment"></i><?php comments_number(); ?></a></span>
    </div>
</div>