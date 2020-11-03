<?php 

/**
 * Custom Post Types (CPT) del plugin 
 */

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
            'menu_name' => __("{$items}", 'institucionalmt'),
            'name_admin_bar' => __("{$item}", 'institucionalmt'),
            'add_new' => __('Añadir Nuevo', 'institucionalmt'),
            'add_new_item' => __("Añadir Nuevo {$item}", 'institucionalmt'),
            'edit_item' => __("Editar {$item}", 'institucionalmt'),
            'new_item' => __("Nuevo {$item}", 'institucionalmt'),
            'all_items' => __("Todos los {$items}", 'institucionalmt'),
            'view_item' => __("Ver {$item}", 'institucionalmt'),
            'search_items' => __("Buscar {$items}", 'institucionalmt'),
            'not_found' => __("No se encontraron {$items}", 'institucionalmt'),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera", 'institucionalmt'),
            'parent_item_colon' => __("{$item} Padre:", 'institucionalmt'),
            'featured_image' => __("Imagen del {$item}", 'institucionalmt'),
            'set_featured_image' => __('Establecer imagen de portada', 'institucionalmt'),
            'remove_featured_image' => __('Eliminar imagen de portada', 'institucionalmt'),
            'use_featured_image' => __('Usar como imagen de portada', 'institucionalmt'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}", 'institucionalmt'),
            'items_list_navigation' => __("Navegación por lista de {$items}", 'institucionalmt'),
            'items_list'=> __("Listado de {$items}", 'institucionalmt')
        ];

        $args = [
            'labels' => $labels,
            'description' => __('Contiene nuestros servicios y datos específicos de los servicios', 'institucionalmt'),
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
            'menu_name' => __("{$items}", 'institucionalmt'),
            'name_admin_bar' => __("{$item}", 'institucionalmt'),
            'add_new' => __('Añadir Nueva', 'institucionalmt'),
            'add_new_item' => __("Añadir Nueva {$item}", 'institucionalmt'),
            'edit_item' => __("Editar {$item}", 'institucionalmt'),
            'new_item' => __("Nueva {$item}", 'institucionalmt'),
            'all_items' => __("Todas las {$items}", 'institucionalmt'),
            'view_item' => __("Ver {$item}", 'institucionalmt'),
            'search_items' => __("Buscar {$items}", 'institucionalmt'),
            'not_found' => __("No se encontraron {$items}", 'institucionalmt'),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera", 'institucionalmt'),
            'parent_item_colon' => __("{$item} Padre:", 'institucionalmt'),
            'featured_image' => __("Imagen de la {$item}", 'institucionalmt'),
            'set_featured_image' => __('Establecer imagen de portada', 'institucionalmt'),
            'remove_featured_image' => __('Eliminar imagen de portada', 'institucionalmt'),
            'use_featured_image' => __('Usar como imagen de portada', 'institucionalmt'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a esta {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}", 'institucionalmt'),
            'items_list_navigation' => __("Navegación por lista de {$items}", 'institucionalmt'),
            'items_list'=> __("Listado de {$items}", 'institucionalmt')
        ];

        $args = [
            'labels' => $labels,
            'description' => __('Contiene una lista de todas las Direcciones y sus dependencias, así como tambien datos específicos de las mismas', 'institucionalmt'),
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
        $menu_name = 'RLT';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}", 'institucionalmt'),
            'name_admin_bar' => __("{$item}", 'institucionalmt'),
            'add_new' => __('Añadir Nueva', 'institucionalmt'),
            'add_new_item' => __("Añadir Nueva {$item}", 'institucionalmt'),
            'edit_item' => __("Editar {$item}", 'institucionalmt'),
            'new_item' => __("Nueva {$item}", 'institucionalmt'),
            'all_items' => __("Todas las {$items}", 'institucionalmt'),
            'view_item' => __("Ver {$item}", 'institucionalmt'),
            'search_items' => __("Buscar {$items}", 'institucionalmt'),
            'not_found' => __("No se encontraron {$items}", 'institucionalmt'),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera", 'institucionalmt'),
            'parent_item_colon' => __("{$item} Padre:", 'institucionalmt'),
            'featured_image' => __("Imagen de la {$item}", 'institucionalmt'),
            'set_featured_image' => __('Establecer imagen de portada', 'institucionalmt'),
            'remove_featured_image' => __('Eliminar imagen de portada', 'institucionalmt'),
            'use_featured_image' => __('Usar como imagen de portada', 'institucionalmt'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a esta {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}", 'institucionalmt'),
            'items_list_navigation' => __("Navegación por lista de {$items}", 'institucionalmt'),
            'items_list'=> __("Listado de {$items}", 'institucionalmt')
        ];

        $args = [
            'labels' => $labels,
            'description' => __('Contiene una lista de todas las Representaciones Locales de Trabajo (RLT), así como tambien datos específicos de las mismas', 'institucionalmt'),
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'            
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'rlt'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg', // icon 20px x 20px
            // 'taxonomies' => array (
            //     'rlt_taxonomy'
            // )
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
            'menu_name' => __("{$menu_name}", 'institucionalmt'),
            'name_admin_bar' => __("{$item}", 'institucionalmt'),
            'add_new' => __('Añadir Nueva', 'institucionalmt'),
            'add_new_item' => __("Añadir Nueva {$item}", 'institucionalmt'),
            'edit_item' => __("Editar {$item}", 'institucionalmt'),
            'new_item' => __("Nueva {$item}", 'institucionalmt'),
            'all_items' => __("Todas las {$items}", 'institucionalmt'),
            'view_item' => __("Ver {$item}", 'institucionalmt'),
            'search_items' => __("Buscar {$items}", 'institucionalmt'),
            'not_found' => __("No se encontraron {$items}", 'institucionalmt'),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera", 'institucionalmt'),
            'parent_item_colon' => __("{$item} Padre:", 'institucionalmt'),
            'featured_image' => __("Imagen de la {$item}", 'institucionalmt'),
            'set_featured_image' => __('Establecer imagen de portada', 'institucionalmt'),
            'remove_featured_image' => __('Eliminar imagen de portada', 'institucionalmt'),
            'use_featured_image' => __('Usar como imagen de portada', 'institucionalmt'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a esta {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}", 'institucionalmt'),
            'items_list_navigation' => __("Navegación por lista de {$items}", 'institucionalmt'),
            'items_list'=> __("Listado de {$items}", 'institucionalmt')
        ];

        $args = [
            'labels' => $labels,
            'description' => __('Contiene una lista de todas las Oficinas Territoriales de Empleo (OTE), así como tambien datos específicos de las mismas', 'institucionalmt'),
            'public' => true, // Se mostraran en el frontend
            'has_archive' => true, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'ote'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg', // icon 20px x 20px
            // 'taxonomies' => array (
            //     'ote_taxonomy'
            // )
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
            'menu_name' => __("{$menu_name}", 'institucionalmt'),
            'name_admin_bar' => __("{$item}", 'institucionalmt'),
            'add_new' => __('Añadir Nuevo', 'institucionalmt'),
            'add_new_item' => __("Añadir Nuevo {$item}", 'institucionalmt'),
            'edit_item' => __("Editar {$item}", 'institucionalmt'),
            'new_item' => __("Nuevo {$item}", 'institucionalmt'),
            'all_items' => __("Todos los {$items}", 'institucionalmt'),
            'view_item' => __("Ver {$item}", 'institucionalmt'),
            'search_items' => __("Buscar {$items}", 'institucionalmt'),
            'not_found' => __("No se encontraron {$items}", 'institucionalmt'),
            'not_found_in_trash' => __("No se encontraron {$items} en la papelera", 'institucionalmt'),
            'parent_item_colon' => __("{$item} Padre:", 'institucionalmt'),
            'featured_image' => __("Fotografía del {$item}", 'institucionalmt'),
            'set_featured_image' => __('Establecer imagen de portada', 'institucionalmt'),
            'remove_featured_image' => __('Eliminar imagen de portada', 'institucionalmt'),
            'use_featured_image' => __('Usar como imagen de portada', 'institucionalmt'),
            'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
            'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
            'filter_items_list' => __("Filtrar lista de {$items}", 'institucionalmt'),
            'items_list_navigation' => __("Navegación por lista de {$items}", 'institucionalmt'),
            'items_list'=> __("Listado de {$items}", 'institucionalmt')
        ];

        $args = [
            'labels' => $labels,
            'description' => __('Contiene una lista de todos los Ministros, la vista solo mostrará la información del ultimo Ministro añadido', 'institucionalmt'),
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
            'add_new' => __('Añadir Nuevo', 'institucionalmt'),
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
        $items = 'Documentos';
        $menu_name = 'Documentos';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'institucionalmt'),
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
            'supports' => ['title', 'editor', 'revisions', 'page-attributes'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => 'menu_documentos_mt', // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => true, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'marco-legal'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg', // icon 20px x 20px
            'taxonomies' => array (
                'documentos_taxonomy'
            )
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
            'add_new' => __('Añadir Nuevo', 'institucionalmt'),
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
            'show_in_menu' => 'menu_rlt', // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => false, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'representantes-locales'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_representante', $args );

        flush_rewrite_rules();

    }

    public function encargados_ote(){

        $item = 'Encargado OTE';
        $items = 'Encargados OTE`s';
        $menu_name = 'Encargados OTE`s';

        $labels = [
            'name' => __("{$items}", 'institucionalmt'), // items en plural
            'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
            'menu_name' => __("{$menu_name}"),
            'name_admin_bar' => __("{$item}"),
            'add_new' => __('Añadir Nuevo', 'institucionalmt'),
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
            'description' => 'Contiene una lista de todos los Encargados de las OTE`s, con su información de contacto, estos estarán disponibles para ser asignados a una OTE',
            'public' => true, // Se mostraran en el frontend
            'has_archive' => false, // Si tendra pagina para listar este custom post type
            'supports' => ['title', 'revisions', 'page-attributes', 'thumbnail'],
            'capability_type' => 'post',
            'show_ui' => true, // mostrar interfaz
            'show_in_menu' => 'menu_ote', // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
            'show_in_nav_menus' => false, // mostrar en el administrador de menus
            'show_in_admin_bar' => true, // mostrar en la barra superior de admin
            'rewrite' => array('slug' => 'encargados-ote'),
            'menu_icon' => $this->plugin_dir_url_dir . 'admin/image/domo.svg' // icon 20px x 20px
        ];

        register_post_type( 'instmt_encargado_ote', $args );

        flush_rewrite_rules();

    }

}
