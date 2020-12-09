<?php institucionalmt_page_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">

        <div class="row">
            <div class="col-12 col-md-9 mb-5">
                <header class="article-header">
                    <h2 class="the-post-title mb-3 d-block d-sm-none"><?php the_title(); ?></h2>
                    <div class="post-meta my-3">

                    </div>
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                    }
                    ?>
                </header>
                <div class="row mb-5">
                    <div class="col-12 col-md-11">
                        <div class="single-content-description lead text-justify">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
                <div class="comments-count my-3">
                    <span class="comment"><a href="#comments"><i class="fa fa-comment"></i><?php comments_number(); ?></a></span>
                </div>

            </div>

            <!-- Aside -->
            <div id="single-aside-section" class="col-12" style="max-width:300px;">
                <?php get_sidebar(); ?>                
            </div>
        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->

