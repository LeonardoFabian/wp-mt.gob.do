<?php 

/**
 * Todas las taxonomias asociadas a los Custom Post Types
 */

class InstitucionalMT_Taxonomy {

    public function institucionalmt_servicios(){

        $post_types = [
            'instmt_servicio'
        ];
    
        $labels = [
            'name' => __('Categoría del Servicio', 'institucionalmt'),
            'singular_name' => __('Categoría', 'institucionalmt'),
            'search_items' => __('Buscar categoría de servicios', 'institucionalmt'),
            'all_itens' => __('Todas las categorías de servicios', 'institucionalmt'),
            'parent_item' => __('Categoría padre', 'institucionalmt'),
            'parent_item_colon' => __('Categoría padre:', 'institucionalmt'),
            'edit_item' => __('Editar Categoría', 'institucionalmt'),
            'update_item' => __('Actualizar Categoría', 'institucionalmt'),
            'add_new_item' => __('Agregar nueva categoría', 'institucionalmt'),
            'new_item_name' => __('Nuevo nombre de categoría', 'institucionalmt'),
            'menu_name' => __('Categoría de Servicios', 'institucionalmt')
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'servicios-categorias'],
            'show_admin_column' => true,
            'show_in_rest' => true
        ];
    
        register_taxonomy(
            'servicios_taxonomy',
            $post_types,
            $args
        );

    }

    public function institucionalmt_dependencias(){

        $post_types = [
            'instmt_dependencias'
        ];
    
        $labels = [
            'name' => __('Tipos de Dependencias', 'institucionalmt'),
            'singular_name' => __('Tipo de Dependencia', 'institucionalmt'),
            'search_items' => __('Buscar tipos de Dependencias', 'institucionalmt'),
            'all_itens' => __('Todas los tipos de Dependencias', 'institucionalmt'),
            'parent_item' => __('Dependencia padre', 'institucionalmt'),
            'parent_item_colon' => __('Dependencia padre:', 'institucionalmt'),
            'edit_item' => __('Editar Tipo de Dependencia', 'institucionalmt'),
            'update_item' => __('Actualizar tipo', 'institucionalmt'),
            'add_new_item' => __('Agregar nuevo tipo', 'institucionalmt'),
            'new_item_name' => __('Nuevo nombre de tipo de dependencia', 'institucionalmt'),
            'menu_name' => 'Dependencias'
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'dependencias'],
            'show_admin_column' => true,
            'show_in_rest' => true
        ];
    
        register_taxonomy(
            'dependencias',
            $post_types,
            $args
        );

    }

    public function institucionalmt_rlt_zonas(){

        $post_types = [
            'instmt_rlt'
        ];
    
        $labels = [
            'name' => __('Zonas', 'institucionalmt'),
            'singular_name' => __('Zona', 'institucionalmt'),
            'search_items' => __('Buscar Zonas', 'institucionalmt'),
            'all_itens' => __('Todas las Zonas', 'institucionalmt'),
            'parent_item' => __('Zona padre', 'institucionalmt'),
            'parent_item_colon' => __('Zona padre:', 'institucionalmt'),
            'edit_item' => __('Editar Zona', 'institucionalmt'),
            'update_item' => __('Actualizar Zona', 'institucionalmt'),
            'add_new_item' => __('Agregar nueva Zona', 'institucionalmt'),
            'new_item_name' => __('Nuevo nombre de Zona', 'institucionalmt'),
            'menu_name' => __('Zonas', 'institucionalmt')
        ];
    
        $args = [
            'label' => __('RLT Zonas', 'institucionalmt'),
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'zonas'],
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true         
        ];
    
        register_taxonomy(
            'rlt_taxonomy',
            $post_types,
            $args
        );

    }

    public function institucionalmt_ote_zonas(){

        $post_types = [
            'instmt_ote'
        ];
    
        $labels = [
            'name' => __('Zonas OTE', 'institucionalmt'),
            'singular_name' => __('Zona OTE', 'institucionalmt'),
            'search_items' => __('Buscar Zonas', 'institucionalmt'),
            'all_itens' => __('Todas las Zonas', 'institucionalmt'),
            'parent_item' => __('Zona padre', 'institucionalmt'),
            'parent_item_colon' => __('Zona padre:', 'institucionalmt'),
            'edit_item' => __('Editar Zona', 'institucionalmt'),
            'update_item' => __('Actualizar Zona', 'institucionalmt'),
            'add_new_item' => __('Agregar nueva Zona', 'institucionalmt'),
            'new_item_name' => __('Nuevo nombre de Zona', 'institucionalmt'),
            'menu_name' => __('Zonas OTE', 'institucionalmt')
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'ote'],
            'show_admin_column' => true,
            'show_in_rest' => true
        ];
    
        register_taxonomy(
            'ote_taxonomy',
            $post_types,
            $args
        );

    }

    public function institucionalmt_marco_legal(){

        $post_types = [
            'instmt_documentos'
        ];
    
        $labels = [
            'name' => __('Categoria de Documentos', 'institucionalmt'),
            'singular_name' => __('Categoría', 'institucionalmt'),
            'search_items' => __('Buscar Categoría', 'institucionalmt'),
            'all_itens' => __('Todas las Categorías de Documentos', 'institucionalmt'),
            'parent_item' => __('Categoría padre', 'institucionalmt'),
            'parent_item_colon' => __('Categoría padre:', 'institucionalmt'),
            'edit_item' => __('Editar Categoría', 'institucionalmt'),
            'update_item' => __('Actualizar Categoría', 'institucionalmt'),
            'add_new_item' => __('Agregar nueva Categoría', 'institucionalmt'),
            'new_item_name' => __('Nuevo nombre de Categoría', 'institucionalmt'),
            'menu_name' => __('Categorías de Documentos', 'institucionalmt')
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'categorias'],
            'show_admin_column' => true,
            'show_in_rest' => true
        ];
    
        register_taxonomy(
            'documentos_taxonomy',
            $post_types,
            $args
        );

    }

    

    // add new function taxonomy and use this function to define this hook in instmt-core.php 

}

/*
function institucionalmt_servicios_taxonomy(){

    
}

add_action( 'init', 'institucionalmt_servicios_taxonomy' );
*/