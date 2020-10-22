<?php 

class InstitucionalMT_CPT {

    private $plugin_dir_url_dir;

    public function __construct(){

        $this->plugin_dir_url_dir = plugin_dir_url(__DIR__);        

    }

    public function servicios(){

        $item = 'Servicio';
        $items = 'Servicios';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$items}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'servicio'),
            'add_new_item' => __("Añadir Nuevo {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nuevo {$item}"),
            'all_items' => __("Todos los {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Imagen del {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene nuestros servicios y datos específicos de los servicios',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'servicios'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_servicio', $args );

        flush_rewrite_rules();

    }

    public function dependencias(){

        $item = 'Dirección';
        $items = 'Direcciones';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$items}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nueva', 'dependencia'),
            'add_new_item' => __("Añadir Nueva {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nueva {$item}"),
            'all_items' => __("Todas las {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Imagen de la {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a esta {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todas las Direcciones y sus dependencias, así como tambien datos específicos de las mismas',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'direcciones'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_dependencias', $args );

        flush_rewrite_rules();

    }

    public function rlt(){

        $item = 'Representación Local de Trabajo (RLT)';
        $items = 'Representaciones Locales de Trabajo (RLT`s)';
        $menu_name = 'RLT`s';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nueva', 'rlt'),
            'add_new_item' => __("Añadir Nueva {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nueva {$item}"),
            'all_items' => __("Todas las {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Imagen de la {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a esta {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todas las Representaciones Locales de Trabajo (RLT), así como tambien datos específicos de las mismas',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'rlt'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_rlt', $args );

        flush_rewrite_rules();

    }

    public function ote(){

        $item = 'Oficina Territorial de Empleo (OTE)';
        $items = 'Oficinas Territoriales de Empleo (OTE`s)';
        $menu_name = 'OTE`s';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nueva', 'ote'),
            'add_new_item' => __("Añadir Nueva {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nueva {$item}"),
            'all_items' => __("Todas las {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Imagen de la {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a esta {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todas las Oficinas Territoriales de Empleo (OTE), así como tambien datos específicos de las mismas',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'ote'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_ote', $args );

        flush_rewrite_rules();

    }

    public function ministro(){

        $item = 'Ministro';
        $items = 'Ministros';
        $menu_name = 'Despacho del Ministro';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'ministro'),
            'add_new_item' => __("Añadir Nuevo {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nuevo {$item}"),
            'all_items' => __("Todos los {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Fotografía del {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todos los Ministros, la vista solo mostrará la información del ultimo Ministro añadido',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'ministro'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_ministro', $args );

        flush_rewrite_rules();

    }

    public function viceministros(){

        $item = 'Viceministro';
        $items = 'Viceministros';
        $menu_name = 'Viceministros';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'viceministro'),
            'add_new_item' => __("Añadir Nuevo {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nuevo {$item}"),
            'all_items' => __("Todos los {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Fotografía del {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todos los Viceministros, solo se mostraran aquellos con Estatus "Publicado" y Visibilidad "Publico"',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'viceministros'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_viceministro', $args );

        flush_rewrite_rules();

    }


    public function documentos(){

        $item = 'Documento';
        $items = 'Marco Legal';
        $menu_name = 'Documentos';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'documento'),
            'add_new_item' => __("Añadir Nuevo {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nuevo {$item}"),
            'all_items' => __("Todos los {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Fotografía del {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todos los Documentos, los mismos serán listados en la sección Marco Legal por taxonomía',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'marco-legal'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_documentos', $args );

        flush_rewrite_rules();

    }

    public function representantes_locales(){

        $item = 'Representante Local';
        $items = 'Representantes Locales';
        $menu_name = 'Representantes Locales';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'representante'),
            'add_new_item' => __("Añadir Nuevo {$item}"),
            'edit_item' => __("Editar {$item}"),
            'new_item' => __("Nuevo {$item}"),
            'all_items' => __("Todos los {$items}"),
            'view_item' => __("Ver {$item}"),
            'search_items' => __("Buscar {$items}"),
            'not_found' => __("No se encontraron {$items}"),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
            'parent_item_colon' => __("{$item} Padre:"),
            'featured_image' => __("Fotografía del {$item}"),
            'set_featured_image' => __('Establecer imagen de portada'),
            'remove_featured_image' => __('Eliminar imagen de portada'),
            'use_featured_image' => __('Usar como imagen de portada'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}"),
            'items_list_navigation' => __("Navegación por lista de {$items}"),
            'items_list'=> __("Listado de {$items}")
        ];

        $args = [
            'labels' => $labels,
            'description' => 'Contiene una lista de todos los Representantes Locales, con su información de contacto, estos estarán disponibles para ser asignados a una RLT',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => false, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'revisions', 'page-attributes', 'thumbnail'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => false, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'viceministros'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_representante', $args );

        flush_rewrite_rules();

    }

}
