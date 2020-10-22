<div class="col-12 col-md-4 mb-4">
    <div class="card-deck">
        <div class="card mb-4">
            <!-- Card date -->
            <div class="date-container text-center bg-secondary-color overlay">
                <div class="post-date align-self-center">
                    <h4 class="post-date-day"><?php echo get_the_date('j'); ?></h4>
                    <small class="post-date-month text-uppercase"><?php echo get_the_date('M'); ?></small>
                </div>
            </div>
            <!--Card image-->
            <div class="view overlay card-image-wrapper">

                <a href="<?php the_permalink(); ?>">
                    <div class="mask rgba-white-slight">
                        <!-- card-img-top img-fluid -->
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('post_thumbnail', array('class' => 'card-img-top img-fluid'));
                        }
                        ?>
                    </div>
                </a>
            </div>
            <!--Card content-->
            <div class="last-post-card-body card-body">
                <div class="wrap-content">
                    <div class="wrap-content-title">
                        <!--Title-->
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                            <h4 class="post-card-title card-title d-none d-sm-block">
                                <?php the_title(); ?>
                            </h4>
                            <h6 class="post-card-title card-title d-block d-sm-none" title="<?php echo the_title(); ?>">
                                <?php the_title(); ?>
                            </h6>
                        </a>
                    </div>
                    <div class="wrap-content-text">
                        <!--Text-->
                        <p class="post-card-text card-text">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                </div>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-md d-sm-none">Leer
                    más</a>
                <!-- Social shares button -->
                <a class="activator waves-effect waves-light float-right d-block d-sm-none"><i class="fas fa-share-alt"></i></a>
            </div>
        </div>
    </div>
</div>