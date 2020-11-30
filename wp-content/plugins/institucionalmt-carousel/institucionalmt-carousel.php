<?php

/**
 * Archivo del plugin
 * Este archivo es leído por WordPress para generar la información
 * del plugin en el área de administración. También incluye todas
 * las dependencias utilizadas por el complemento, funciones de
 * activación, desactivación e inicialización del complemento.
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * @package         InstitucionalMT-Carousel
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * @copyright       2020 Ministerio de Trabajo, República Dominicana
 * 
 * @wordpress-plugin
 * 
 * Plugin Name:     InstitucionalMT Carousel
 * Plugin URI:
 * Description:     Este plugin permite presentar las entradas destacadas en un carousel.
 * Version:         1.0.0
 * Author:          Leonardo Fabián
 * Author URI:      https://www.linkedin.com/in/leonardofabian/
 * License:         GPL v3
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     instmtcarousel
 * Domain Path:     /languages
 * 
 * Institucional MT Carousel
 * Copyright (C) 2020-2024, Leonardo Fabián
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Asegurando que todas las instrucciones se ejecuten a traves de WordPress
 */
if (!defined('WPINC')) {
    die;
}

/**
 * Constantes del plugin
 */
define('INSTMT_CAROUSEL_REALPATH_BASENAME_PLUGIN', dirname(plugin_basename(__FILE__)) . '/');
define('INSTMT_CAROUSEL_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('INSTMT_CAROUSEL_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('INSTMT_CAROUSEL_PLUGIN_DIR_URL_DIR', plugin_dir_url(__DIR__));

/**
 * Activación del plugin
 */
if( function_exists( 'institucionalmt_carousel_activation_hook' ) ){

    function institucionalmt_carousel_activation_hook(){

        include_once( INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'includes/activation/class-instmt-carousel-activation.php' );
        require_once( INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'includes/activation/class-instmt-carousel-activation.php' );

        InstitucionalMT_Carousel_Activation::activate();

    }

}

/**
 * Desactivación del plugin
 */
if( function_exists( 'institucionalmt_carousel_deactivation_hook' ) ){

    function institucionalmt_carousel_deactivation_hook(){

        include_once( INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'includes/deactivation/class-instmt-carousel-deactivation.php' );
        require_once( INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'includes/deactivation/class-instmt-carousel-deactivation.php' );

        InstitucionalMT_Carousel_Deactivation::deactivate();

    }

}

register_activation_hook( __FILE__, 'institucionalmt_carousel_activation_hook' );
register_deactivation_hook( __FILE__, 'institucionalmt_carousel_deactivation_hook' );

/**
 * Dependencia de la Clase Core (Cerebro del plugin)
 */
include_once( INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'includes/class-instmt-carousel-core.php' );
require_once( INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'includes/class-instmt-carousel-core.php' );

function run_institucionalmt_carousel_core(){

    $instmt_carousel_core = new InstitucionalMT_Carousel_Core;
    $instmt_carousel_core->instmt_carousel_run();

}

run_institucionalmt_carousel_core();
