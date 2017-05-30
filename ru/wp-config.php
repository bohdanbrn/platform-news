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
define('DB_NAME', 'platformnews_ru');

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
define('AUTH_KEY',         '+u^~WSw)`ATM[=J|`%>h^$V7G7:{99~y(&tPml%PB2v#>%v4!G8F;2<x&RZpp?Y9');
define('SECURE_AUTH_KEY',  'BbrC^aH|z2x@cQbWL[a;A~#FR/3i=,r9@[(l0WvJ7<eWn]3uDS(H8Pc/QhGT-f.K');
define('LOGGED_IN_KEY',    '!>~iuuWcsr1[qh8(u<)R6H&L}{>qc!?2vUzp>|L;m8cAM5m|d/8oZa+_t?@D*BLz');
define('NONCE_KEY',        '?/#X1<L@X$^Y|cp86r;wIz3(Zg)/]0D>xg #Nh]9ShUah6}1<DrL[EB9joA[PZc@');
define('AUTH_SALT',        'aNkyby+MD/w_~m7][0 (Yo+&]&f~f]=,WFz5ha]Q%HMoiO?aC%LM+4=?s<%~CF(`');
define('SECURE_AUTH_SALT', 'qEGKbohN49fS@.$C~nz#%}r=37~_d<${)dUJPQ)e9)*nO*df2=6`e6Y;~&ETFb#d');
define('LOGGED_IN_SALT',   '^C15xuxj1dB[q=^i%O3nZgJE!BX^x-,5Bu~LGEwyZ<aAc-<e&,ljHvNMsZ4mw53L');
define('NONCE_SALT',       'N|*F`Uk#5AiJ_:p`bM89T7Kgp<B{e1iALv[NaHDSXwc&-J9;r:a,?SjzI_&gA^n+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ru_';

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