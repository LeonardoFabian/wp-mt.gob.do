<?php

/**
 * Archivo del plugin
 * Este archivo es leído por WordPress para generar la información
 * del plugin en el área de administración. También incluye todas
 * las dependencias utilizadas por el complemento, funciones de 
 * activación, desactivación, y una función que inicia el complemento.
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * @package         InstitucionalMT-CTA
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * @copyright       2020 Ministerio de Trabajo, República Dominicana
 * 
 * @wordpress-plugin
 * Plugin Name:     InstitucionalMT Call To Action (CTA)
 * Plugin URI:
 * Description:     Añade los distintos CTA (Call to Action) estratégicos que quieres que tu audiencia realice (Registro, suscripción, descarga, etc.), mediante el uso de Widgets y Shortcodes, de forma fácil y sencilla.
 * Version:         1.0.0
 * Author:          Leonardo Fabián
 * Author URI:      https://www.linkedin.com/in/leonardofabian/
 * License:         GPL v3
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     institucionalmtcta
 * Domain Path:     /languages
 * 
 * Institucional MT Call To Action
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
 * Definiendo las constantes
 */
define('INSTMT_CTA_REALPATH_BASENAME_PLUGIN', dirname(plugin_basename(__FILE__)) . '/');
define('INSTMT_CTA_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('INSTMT_CTA_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('INSTMT_CTA_PLUGIN_DIR_URL_DIR', plugin_dir_url(__DIR__));

/**
 * Código que se ejecuta en la activación del plugin
 */
if (function_exists('activate_institucionalmt_cta')) {

    function activate_institucionalmt_cta()
    {

        include_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/activate/class-instmt-cta-activator.php');
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/activate/class-instmt-cta-activator.php');

        InstitucionalMT_CTA_Activator::activate();

    }

}

/**
 * Código que se ejecuta en la desactivación del plugin
 */
if (function_exists('deactivate_institucionalmt_cta')) {

    function deactivate_institucionalmt_cta()
    {

        include_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/deactivate/class-instmt-cta-deactivator.php');
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/deactivate/class-instmt-cta-deactivator.php');

        InstitucionalMT_CTA_Deactivator::deactivate();

    }

}

register_activation_hook( __FILE__, 'activate_institucionalmt_cta' );
register_deactivation_hook( __FILE__, 'deactivate_institucionalmt_cta' );

/**
 * Cargar la dependencia de la clase CORE, cerebro del plugin
 */
include_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/class-instmt-cta-core.php' );
require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/class-instmt-cta-core.php' );

function run_institucionalmt_cta_core(){

    $instmt_cta_core = new InstitucionalMT_CTA_Core;
    $instmt_cta_core->instmt_cta_run();

}

run_institucionalmt_cta_core();