<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
    <span class="split-page-title-action">
        <a href="">Añadir nueva RLT</a>
        <span class="expander" tabindex="0" role="button" aria-haspopup="true" aria-label="Menú agregar nuevo servicio"></span>
        <span class="dropdown"></span>
    </span>
    <span class="page-title-action" style="display:none;"></span>
    <hr class="wp-header-end">

    <form action="" method="post">
        <input name="nonce" type="hidden" value="<?php echo $nonce; ?>">
        <input name="delete-service" type="hidden" value="delete-service">
        <?php submit_button('Añadir nueva RLT'); ?>
    </form>
</div>