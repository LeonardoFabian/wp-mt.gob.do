<?php /* Template Name: Representaciones Locales */ ?>

<?php get_header(); ?>

<div class="mb-5">
    <div id="contact-section" class="content-area">        

            <?php
            // Show selected front page cotent
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    //the_content();
                    get_template_part('template-parts/page/content', 'representaciones-locales');
                endwhile;
            else :
                get_template_part('template-parts/post/content', 'none');
            endif;
            ?>
     
    </div>
</div>

<?php get_footer(); ?>