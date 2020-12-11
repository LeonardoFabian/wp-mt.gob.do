<?php get_header(); ?>

<!-- This sets the $curauth variable -->
<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div id="entry-header" class="entry-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="entry-header-title"><?php echo $curauth->display_name; ?></h2>
            <small class="breadcrumbs tex-muted"><?php _themename_breadcrumb() ?></small>
        </div>
    </div>
</div><!-- entry-header -->

<div id="content" class="container">


    <dl>
        <dt><?php echo apply_filters( '_themename_author_website_label', esc_html__('Website', '_themename') ) ?></dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
        <dt><?php echo apply_filters( '_themename_author_profile_label', esc_html__('Profile', '_themename') ) ?></dt>
        <dd><?php echo $curauth->user_description; ?></dd>
        <dt><?php echo apply_filters( '_themename_author_email_label', esc_html__('Correo', '_themename') ) ?></dt>
        <dd><?php echo $curauth->user_email; ?></dd>
    </dl>

    <div class="my-5">
    <?php echo apply_filters( '_themename_author_name_label', esc_html__('Publicaciones realizadas por', '_themename') ) ?>
    <h3><?php echo $curauth->display_name; ?>:</h3>
    </div>

    <ul class="list-unstyled">
        <!-- The Loop -->

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li>
                    <div class="row mb-3">
                        <div class="col-md-2 post-thumbnail-primary mask rgba-white-slight" style="max-height: 100px;">
                            <!-- card-img-top img-fluid -->
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('post_thumbnail', array('class' => 'card-img-top img-fluid'));
                            }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                                <strong><?php the_title(); ?></strong></a>,
                            <p class="text-muted">
                            <?php the_time('d M Y'); ?><br>
                            <?php esc_html_e('Categorías:', '_themename') ?><?php the_category('&'); ?>
                            </p>
                        </div>                        
                    </div>
                </li>

            <?php endwhile;
        else : ?>
            <p><?php echo apply_filters( '_themename_no_post_by_author', esc_html__('No hay publicaciones de este autor.','_themename') ); ?></p>

        <?php endif; ?>

        <!-- End Loop -->

    </ul>
    <div class="row posts-pagination justify-content-center">
        <?php
        //the_posts_pagination();
        echo bootstrap_pagination();
        ?>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>