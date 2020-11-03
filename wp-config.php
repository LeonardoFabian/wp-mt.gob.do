<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_mtdata' );
define( 'DB_SIRLA_NAME', 'SIRLA2' );

/** MySQL database username */
define( 'DB_USER', 'root' );
define( 'DB_SIRLA_USER', 'MTCORE' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );
define( 'DB_SIRLA_PASS', 'MT123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
define( 'DB_SIRLA_HOST', '52.247.107.132' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ppO0A}@LZM$Bfz>5@{H[<pU_`;HY,#PQ&P&qHsVi|:0Fe~Fe]%F9auw@6K!nQ_9r' );
define( 'SECURE_AUTH_KEY',  '0)81KsVd&nFWQRvD[)F-nvlJ,E>tX_b/ak^<y~;MX1?Z(t|Zt}YueiMcB]*zA&2-' );
define( 'LOGGED_IN_KEY',    'CU!.KU,`$0kpKJ0^QZ9Y>@B`-^_+6g(Ge5 ?F=7-T^5vQ3o8-(HHV_zTNG[e]fU.' );
define( 'NONCE_KEY',        'f SK_:8Tj!1MFkF9p(V~>95OJ]Xm6,eCu|Gho w-N%khjG;[!&rRS4mSz@W/ArL[' );
define( 'AUTH_SALT',        'SY}IdsLi-lH~yq-&i9kx9SOcO=s?~-KkUX5#{IiBb(~XO`s8I;XjhVHl[t/N.n`7' );
define( 'SECURE_AUTH_SALT', ';[U|vj%]F]8mU_73w*2c`Ef~(q&&peqa%|sy ^rN9~am8Wvl;%/x<(z2x3Efzuv@' );
define( 'LOGGED_IN_SALT',   'agi/k+chdPMs8%2p7S%%>=e95%=lxA}DP`wyqH,2Rz_Hy~9j/dVLVJ&jHQT@2 }:' );
define( 'NONCE_SALT',       'a3;Hm4KXCX/pO/ukl(%hHYI#hXE]wx^?Bdlx@43f{xE/a#^GH@~4g?UbI7Ds7c u' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define('TABLE_SIRLA_SCHEMA','dbo');

/**
* Desactivar en WordPress WP CRON
*/
// define ('DISABLE_WP_CRON', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
//define( 'WP_DEBUG', false );
define( 'WP_DEBUG', true );
/** 
* DEBUG LOG (Optional): Registra todos los mensajes de error en un archivo debug.log en wp-content (PONER EN FALSE AL CONCLUIR)
* DEBUG DISPLAY (Optional): Mensaje de depuracion dentro del html de las paginas, aparecen en la parte superior (PONER EN FALSE AL CONCLUIR)
*/
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/**
* FLICKR
*/
// insert your API key
$key = "f6dcb5c38deadcf8967ee1932e1ea48a";
// enter your Flickr username 
$username="ramonlfabian";



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
