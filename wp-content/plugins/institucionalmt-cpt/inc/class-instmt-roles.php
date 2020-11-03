<?php 

/**
 * ROLES: encargado, periodista, auxiliar
 * NUEVAS CAPACIDADES: social_share
 */

class InstitucionalMT_Roles {

    public function manipulate_roles(){        

        $wp_roles = new WP_Roles;

        $roles_comunicaciones_encargado = [     
            //'delete_others_pages' => true,
            //'delete_others_posts' => true,
            'add_users' => true,
            'create_users' => true,
            'delete_users' => true,
            'delete_pages' => true,
            'delete_posts' => true,
            'delete_published_pages' => true,      
            'delete_published_posts' => true,
            'edit_pages' => true,
            'edit_posts' => true,
            'edit_published_pages' => true,
            'edit_published_posts' => true,
            'manage_categories' => true,
            'manage_links' => true,
            'moderate_comments' => true,
            'publish_pages' => true,
            'publish_posts' => true,
            'read' => true,
            'read_private_pages' => true,
            'read_private_posts' => true,
            'unfiltered_html' => true,
            'upload_files' => true,   
            'social_share' => true,         
        ];

        $roles_comunicaciones_periodista = [     
            'delete_posts' => true,      
            'delete_published_posts' => true,
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'read' => true,
            'upload_files' => true,            
        ];

        $roles_comunicaciones_auxiliar = [           
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'read' => true,
            'upload_files' => true,
            'social_share' => true,
        ];

        $wp_roles->add_role(
            'auxiliar',
            'Auxiliar',
            $roles_comunicaciones_auxiliar
        );

        $wp_roles->add_role(
            'periodista',
            'Periodista',
            $roles_comunicaciones_periodista
        );

    }

    public function remove_role( $rol ){

        $wp_roles = new WP_Roles;

        $wp_roles->remove_role( $rol );

    }


}