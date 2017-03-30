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
define('DB_NAME', 'platform_news');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ']5~BM_PE;,c5US=Dg_:] V4<AHgUqt2ObdRp^5nVx$$d;G#Yv`lu4u0 !H6Lr&&:');
define('SECURE_AUTH_KEY',  '4twNPbGs8o6V$Z%!@lwVN`c[.=ukHN9M{bJn;s:6B#ZvaC_sg5<C3~/yk_ma+lB_');
define('LOGGED_IN_KEY',    'SSw3`Q(CDOal}$/~.-b@Zx|6M4noQ9rF/5bGkq4J2g!WS!<4l77s~@_Wyi#M+_^m');
define('NONCE_KEY',        '.+c0rlP+nFw^?e6Ri6Gc.N%BA@W7|fDnS8(4ds{U~p^u]f<y7Aka?}wk)N;!pHJ ');
define('AUTH_SALT',        '!p7Uuvoi81A[,{^oPKxq8bBEbb4jpY6bi][3}#w-H:Rou#G+PH? cXL^UR+8c/S ');
define('SECURE_AUTH_SALT', 'r:cN)(bxIRz_(!$VGHf[27 IgBG]p#brv& 8I <!|G-Lzwn! $`)TsQmb}41E:Ln');
define('LOGGED_IN_SALT',   'Hr3:[]KA]h^},uV+5C3^9amg7qKPD4C3Q6G30yFag@Tm29.cEq52gj.m=-;$e&Ym');
define('NONCE_SALT',       '7GN$z1N/5+4=XWh*=&@nx9~CQ|yhMjl<<ZjpNcx]`MDX<a##B!,MYVzHxJp:i)_G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ua_';

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
