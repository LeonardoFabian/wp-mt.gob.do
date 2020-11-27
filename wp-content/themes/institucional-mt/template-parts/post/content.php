<div id="entry-header" class="entry-header title-bar mb-5 d-none d-sm-block magic">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="institucionalmt-title"><?php the_title(); ?><span></span></h2>
            <small class="breadcrumbs tex-muted">Mostrar aqui rastro de navegacion publicacion</small>
        </div>
    </div>
</div><!-- entry-header -->

<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div id="single-post-wrapper" class="single-post-wrapper">
            <!-- title visible only xs -->
            <header class="article-header my-3">
                <h2 class="the-post-title mb-3 d-block d-sm-none"><?php the_title(); ?></h2>
            </header>

            <div id="single-post-author" class="pt-3 mb-5 align-self-center text-muted">
                <!-- avatar hidden only xs -->
                <div class="avatar rounded-circle float-left mr-3 d-none d-sm-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/admin/image/avatar.png" class="img-fluid">
                </div>
                <p>Publicado por: <?php the_author_posts_link(); ?><br />
                <?php the_date(); ?></p>
            </div>

            <div class="row px-3 mb-3">
                <!-- widget for social plugin -->
                <?php
                dynamic_sidebar('post-social-icons');
                ?>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 mb-5">

                    <!-- TO DO: social-vertical-bar -->
                    <!--
                    <div id="post-social-vertical" class="social-vertical d-none d-sm-block float-left mr-5">                       
                    <ul class="social-list list-unstyled ">
                            <li><a class="btn-social fa fa-facebook" title="Facebook" href="https://www.facebook.com/MTrabajoRD" target="_blank" rel="noopener"> </a></li>
                            <li><a class="btn-social fa fa-twitter" title="Twitter" href="https://twitter.com/MTrabajoRD" target="_blank" rel="noopener"> </a></li>
                            <li><a class="btn-social fa fa-instagram" title="Instagram" href="https://www.instagram.com/mtrabajord/" target="_blank" rel="noopener"> </a></li>
                            <li><a class="btn-social fa fa-youtube" title="Youtube" href="https://www.youtube.com/channel/UCvQVfiyRPCxmWMrmH5QYqdg" target="_blank" rel="noopener"> </a></li>
                        </ul>

                    </div>
                    -->



                    <div class="col-12">
                        <div class="row">
                            <div class="post-content-image mb-5">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                }
                                ?>
                            </div>                          

                            <div class="single-content-description lead text-justify mb-3">
                                <?php the_content(); ?>
                            </div>
                            <div class="signature" style="width:100%;">
                                <!-- customize action in plugin institucionalmt-cpt/public/class-instmt-public.php -->
                                <?php do_action('instmt_post_signature'); ?>
                            </div>
                            <div class="tags-list text-muted mb-5">
                                <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>'); ?>
                            </div>
                            <div class="banner-section col-sm-12 col-md-12 col-lg-12" style="width:100%;">
                                <?php dynamic_sidebar('banners-post-content'); ?>
                            </div>

                        </div>
                        <hr>
                        <div class="comments-count my-3">
                            <span class="comment">
                                <a href="#comments">
                                    <i class="fa fa-comment"></i>
                                    <?php                                    
                                    comments_number(); 
                                    ?>
                                </a>
                            </span>
                        </div>
                       <hr>                       

                       <?php if( comments_open() ) : ?>
                            <div id="comments" class="comments">
                                <?php comments_template(); ?>
                            </div>
                       <?php endif; ?>

                    </div>

                </div>

                <!-- Aside -->
                <div id="single-aside-section" class="col-sm-12 col-md-4 col-lg-4">
                    <?php dynamic_sidebar('banners-post-sidebar'); ?>
                    <?php get_sidebar(); ?>
                </div>
            </div>

        </div>

    </article><!-- #post-<?php the_ID(); ?> -->
</div>