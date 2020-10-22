<li class="pb-4">
    <div class="row">
        <div class="col-2 col-xl-1">
            <i class="fa fa-landmark fa-2x" aria-hidden="true"></i>
        </div>
        <div class="col-10 col-xl-11">
            <p>
                <strong>
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </strong>
            </p>
            <div class="muted">
                <?php // the_content(); ?>
            </div>
        </div>
    </div>
</li>