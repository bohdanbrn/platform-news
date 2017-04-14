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
define('DB_NAME', 'platformnews_en');

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
define('AUTH_KEY',         'X@6)*R%9Ne11Tl0-LX8Rr|~2tfQgLn(-#TkENq7LF0Lz`}J0JzLl`x<#s7nlii0*');
define('SECURE_AUTH_KEY',  ']] uN>a`HEP2!EG&>|I,<]TW}FDO4C~r]7mI{LP91=bGvW!@PzA-L(-V;MeWVaNL');
define('LOGGED_IN_KEY',    'lGFoB108e?QzvK,NNYBv=fOn}:U3E<}53w@s/|!P47/WM_tf>oR3u-V<TmUH1Vzt');
define('NONCE_KEY',        'tdNmlFy]^slh8B_%9w&Dp%t|y+@Z]g(GmqB,)X1F FtL`8_nebGLwKf:M#Sa#0ta');
define('AUTH_SALT',        'R.b^`MXHiT=2$ *gB4bYw9o&%oB}Ij17K#{25GEHzeJd<ZhA`49RnN]b|;;/!!-(');
define('SECURE_AUTH_SALT', '6v4uHYWU#)9?lIRW3LAg u+/1p4*D`!$s/X;/-=tmQXt =1eY{rdOHdg=hafd.;1');
define('LOGGED_IN_SALT',   '-7:YQDxbBJ~9ed,Ljwm.m8GZ9Njvwvca -rk|%Ja>?BU7zs3zqfxGVW{d4,[6U=f');
define('NONCE_SALT',       'm!&a0+w5KrOi+vnxa.yh&/dQ?$,{:8(`qSKXgojpr9Y^f(l@U.QFR/7I*8Yy#vnx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'en_';

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