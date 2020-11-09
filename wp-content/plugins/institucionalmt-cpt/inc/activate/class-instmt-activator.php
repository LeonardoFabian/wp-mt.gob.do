<?php 
/**
 * Se ejecuta en la activación del plugin
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CPT
 * @subpackage      InstitucionalMT-CPT/inc/activate
 */

  /**
   * Esta clase define todo lo necesario durante el proceso de activación del plugin
   * 
   * @since         1.0.0
   * @package       InstitucionalMT-CPT
   * @subpackage    InstitucionalMT-CPT/inc/activate
   * @author        Leonardo Fabián <ramonlfabian@gmail.com>
   */
class InstitucionalMT_Activator {

    /**
     * Método estático que se ejecuta al activar el plugin
     * 
     * Creación de la tabla {$wpdb->prefix}institucionalmt_documentos
     * Creación de la tabla {$wpdb->prefix}institucionalmt_item
     * compatible con la tabla zoo_item (JOOMLA)
     * 
     * para guardar toda la información necesaria de los documentos 
     * 
     * @since       1.0.0
     * @access      public static 
     */
    public static function activate(){

        global $wpdb;
/*
        $sql = "CREATE TABLE IF NOT EXISTS " . INSTMT_TABLE_DOCS . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            file_id INT(11) NOT NULL,
            parent_id INT(11) NULL,
            primary_category LONGTEXT, -- (JOOMLA: Primary Category)
            categories LONGTEXT NULL, -- (JOOMLA: Categories)(JSON)
            tags LONGTEXT NULL, -- (JSON)
            title VARCHAR(100) NULL,
            filename VARCHAR(100) NOT NULL,           
            caption LONGTEXT NULL,
            description LONGTEXT NULL, -- (JOOMLA: Descripcion)
            url LONGTEXT NULL, -- (JOOMLA Documento)
            link LONGTEXT NULL,          
            slug LONGTEXT NULL,  
            edit_link LONGTEXT NULL,
            created_date DATETIME,
            publish_date DATETIME,
            modified_date TIMESTAMP,
            document_date DATETIME, -- (JOOMLA: Fecha Documento)
            start_publishing DATETIME,
            finish_publishing VARCHAR(30) DEFAULT 'Never',
            mime VARCHAR(30) NULL,
            subtype VARCHAR(20),
            author_id VARCHAR(10),
            author_name VARCHAR(100),
            access VARCHAR(100) DEFAULT 'Public',
            file_byte_size INT(255),
            file_human_size VARCHAR(20),
            published CHAR(1) NOT NULL DEFAULT '0',
            searchable CHAR(1) NOT NULL DEFAULT '0',
            hits BIGINT,
            PRIMARY KEY(id)

        );";            
*/
        $sql .= "CREATE TABLE IF NOT EXISTS " . INSTMT_TABLE_ITEM. " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            term_id INT(11) NOT NULL, -- (FK wp_terms.ID leyes, decretos, resoludiones)
            post_type VARCHAR(255) NULL, -- (instmt-documentos)
            post_title VARCHAR(255) NULL,
            link VARCHAR(255) NULL,   
            created_date DATETIME,
            modified_date DATETIME,
            modified_by INT(11),
            publish_date DATETIME,
            unpublish_date DATETIME,
            priority INT(11),
            hits INT(11),
            published TINYINT(3),
            access INT(11),
            author_id INT(11),
            author_name VARCHAR(255),
            searchable INT(11),
            elements LONGTEXT,
            params LONGTEXT,                                     
            PRIMARY KEY(id)
        );"; 

        $wpdb->query( $sql );
        
    }
}

/*
{
	"f329cbdf-d195-4074-9140-cc8d8b6ad1ee":  {
		"file": "images\/docs\/acuerdos_y_convenios\/tarifayresolucion0517\/resolucion.pdf",
		"hits": "0",
		"download_limit": "",
		"size": "650715"
	},
	"abcd0b4a-2e22-40fe-8334-682b5977058c":  {
		"0":  {
			"value": ""
		}
	},
	"8f5fd2df-9e5b-4dff-896d-1fa3e38e86a2":  {
		"0":  {
			"value": "<p>RESOLUCI\u00d3N No. 5\/2017.<\/p>"
		}
	}
}





{
	"metadata.title": "",
	"metadata.description": "",
	"metadata.keywords": "",
	"metadata.robots": "",
	"metadata.author": "",
	"config.enable_comments": "1",
	"config.primary_category": "8"
}


INSERT INTO `cuewb_zoo_item`(`id`, `application_id`, `type`, `name`, `alias`, `created`, `modified`, `modified_by`, `publish_up`, `publish_down`, `priority`, `hits`, `state`, `access`, `created_by`, `created_by_alias`, `searchable`, `elements`, `params`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19])
*/