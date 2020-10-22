<?php if (current_user_can('manage_options')) : ?>

    <?php $nonce = wp_create_nonce('bradhelyn');  ?>

    <div class="wrap">
        <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
        <span class="split-page-title-action">
            <a href="">Añadir nuevo servicio</a>
            <span class="expander" tabindex="0" role="button" aria-haspopup="true" aria-label="Menú agregar nuevo servicio"></span>
            <span class="dropdown"></span>
        </span>
        <span class="page-title-action" style="display:none;"></span>
        <hr class="wp-header-end">

        <form action="" method="post">
            <input name="nonce" type="hidden" value="<?php echo $nonce; ?>">
            <input name="delete-service" type="hidden" value="delete-service">
            <?php submit_button('Añadir nuevo servicio'); ?>
        </form>
    </div>

<?php else : ?>

    <div class="alert alert-danger" role="alert">
        Su usuario no tiene permisos para acceder a esta sección, favor comunicarse con el administrador.
    </div>

<?php endif; ?>