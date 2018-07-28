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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'totallz5_wp');

/** MySQL database username */
define('DB_USER', 'totallz5_wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'Ttent16!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MC`2nOM!T<H prvV|fC8qOD!]U,Z;EA%PMW+&`pe~n%oUwpExeO:`g|Y#Zb:o|bq');
define('SECURE_AUTH_KEY',  'O;]E_xeU=:k0?V2 ~OqHw2DZdWMa87Fe8Ydk#|Q}(wkv?=.9<e3ceimZuJB,KJ@#');
define('LOGGED_IN_KEY',    '<% R1p-)`_vH,O-~3j#SRX!0d et5w|F+,zk1xHvg9v[WD&@EF|@CGZ^0t>zkOWE');
define('NONCE_KEY',        'Ky6q#v+d$d>LiB[WCNo<{8@,gONDK9Z9G,e61ySx6r$nv-xuj(&HOXGr>ixRWd]|');
define('AUTH_SALT',        '!r+{Br?HW[~X7o=b,*!Y{q8VuQ5o64f`YGs${+bx+V5(gK%9M9y8h-Z/mhR$N8<O');
define('SECURE_AUTH_SALT', 'QyH|-/f*2$>r%b8OFn}5$@!{7~bDwT0z9wg5*`l[iEv%WSu=RICVo9ozqr!$+$X$');
define('LOGGED_IN_SALT',   'FjoSNg$ {^=Z`&GqQF|/X4l)4/|b35^cdOA)~KnhhY;Ulb+v|XXDC_@;g5:l<hA*');
define('NONCE_SALT',       'i@0-qP7x|m?@tFLn2{2n7,W.tMc6Jj6=Uz,vn#*%`aUHlqJeVFJE|N!%++).0T%&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_CACHE', true);