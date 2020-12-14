<?php
$title = get_the_title();
$content = get_the_content();
?>

<?php _themename_post_header(); ?>

<div class="o-container">


    <div id="single-post-wrapper" class="single-post-wrapper">

        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo ( is_active_sidebar('post-right-widget-area') || is_active_sidebar('banners-post-sidebar') ) ? '8' : '12'; ?>@medium mb-5">
                <article id="post-<?php the_ID(); ?>" <?php post_class('c-post u-margin-bottom-20'); ?>>

                    <!-- title visible only xs -->
                    <header class="article-header my-3">
                        <h2 class="c-post__title mb-3 d-block d-sm-none"><?php echo esc_html($title); ?></h2>
                    </header>

                    <div id="single-post-author" class="pt-3 mb-5 align-self-center text-muted">
                        <!-- avatar hidden only xs -->
                        <div class="avatar rounded-circle float-left mr-3 d-none d-sm-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/admin/image/avatar.png" class="img-fluid">
                        </div>

                        <!-- helpers -->
                        <div class="c-post__meta">
                            <?php _themename_post_meta(); ?>
                        </div>

                    </div>

                    <div class="o-row px-3 mb-3">

                        <!-- widget for social plugin -->
                        <?php dynamic_sidebar('post-social-icons'); ?>

                    </div>

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
                                <?php echo $content; ?>
                            </div>
                            <div class="signature" style="width:100%;">
                                <!-- customize action in plugin _themename-cpt/public/class-instmt-public.php -->
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

                                    <?php comments_number(); ?>

                                </a>
                            </span>
                        </div>
                        <hr>

                        <?php if (comments_open()) : ?>
                            <div id="comments" class="comments">

                                <?php comments_template(); ?>

                            </div>
                        <?php endif; ?>

                    </div>
                </article><!-- #post-<?php the_ID(); ?> -->
            </div>

            <!-- Aside -->
            <?php if ( is_active_sidebar('post-right-widget-area') || is_active_sidebar('banners-post-sidebar') ) { ?>
                <div id="single-aside-section" class="o-row__column o-row__column--span-4@medium">                
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
        </div>

    </div>


</div>