<?php 

class InstitucionalMT_Taxonomy {

    public function institucionalmt_servicios(){

        $post_types = [
            'instmt_servicio'
        ];
    
        $labels = [
            'name' => 'Categoría del Servicio',
            'singular_name' => 'Categoría',
            'search_items' => 'Buscar categoría de servicios',
            'all_itens' => 'Todas las categorías de servicios',
            'parent_item' => 'Categoría padre',
            'parent_item_colon' => 'Categoría padre:',
            'edit_item' => 'Editar Categoría',
            'update_item' => 'Actualizar Categoría',
            'add_new_item' => 'Agregar nueva categoría',
            'new_item_name' => 'Nuevo nombre de categoría',
            'menu_name' => 'Categoría de Servicios'
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'servicios-categorias'],
            'show_admin_column' => true
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
            'name' => 'Tipos de Dependencias',
            'singular_name' => 'Tipo de Dependencia',
            'search_items' => 'Buscar tipos de Dependencias',
            'all_itens' => 'Todas los tipos de Dependencias',
            'parent_item' => 'Dependencia padre',
            'parent_item_colon' => 'Dependencia padre:',
            'edit_item' => 'Editar Tipo de Dependencia',
            'update_item' => 'Actualizar tipo',
            'add_new_item' => 'Agregar nuevo tipo',
            'new_item_name' => 'Nuevo nombre de tipo de dependencia',
            'menu_name' => 'Dependencias'
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'dependencias'],
            'show_admin_column' => true
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
            'name' => 'Zonas',
            'singular_name' => 'Zona',
            'search_items' => 'Buscar Zonas',
            'all_itens' => 'Todas las Zonas',
            'parent_item' => 'Zona padre',
            'parent_item_colon' => 'Zona padre:',
            'edit_item' => 'Editar Zona',
            'update_item' => 'Actualizar Zona',
            'add_new_item' => 'Agregar nueva Zona',
            'new_item_name' => 'Nuevo nombre de Zona',
            'menu_name' => 'Zonas'
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'zonas'],
            'show_admin_column' => true
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
            'name' => 'Zonas',
            'singular_name' => 'Zona',
            'search_items' => 'Buscar Zonas',
            'all_itens' => 'Todas las Zonas',
            'parent_item' => 'Zona padre',
            'parent_item_colon' => 'Zona padre:',
            'edit_item' => 'Editar Zona',
            'update_item' => 'Actualizar Zona',
            'add_new_item' => 'Agregar nueva Zona',
            'new_item_name' => 'Nuevo nombre de Zona',
            'menu_name' => 'Zonas'
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'ote'],
            'show_admin_column' => true
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
            'name' => 'Categoria de Documentos',
            'singular_name' => 'Categoría',
            'search_items' => 'Buscar Categoría',
            'all_itens' => 'Todas las Categorías de Documentos',
            'parent_item' => 'Categoría padre',
            'parent_item_colon' => 'Categoría padre:',
            'edit_item' => 'Editar Categoría',
            'update_item' => 'Actualizar Categoría',
            'add_new_item' => 'Agregar nueva Categoría',
            'new_item_name' => 'Nuevo nombre de Categoría',
            'menu_name' => 'Categorías de Documentos'
        ];
    
        $args = [
            'labels' => $labels,
            'hierarchical' => true,
            'sort' => true,
            'args' => ['orderby' => 'term_order'],        
            'rewrite' => ['slug' => 'categorias'],
            'show_admin_column' => true
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