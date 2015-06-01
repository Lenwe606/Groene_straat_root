<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'groenestraat');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'usbw');

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
define('AUTH_KEY',         '9vu;Hl`@K|#DMc?tx(p:).Or$||^jFo&n~m<|dl[=)NU}`)m4Bdm#eOl-cW!EdMZ');
define('SECURE_AUTH_KEY',  'e.P9nP?P*IK(|?h5$s<WG0DS++K:tdBp9HKyj/QSXq1r]5Z(xZGLU.}}}X_pD-+m');
define('LOGGED_IN_KEY',    '0d|iT{z+9,$:p4zH.U)(*Takt<)va<],wRZesBB@Ad-o(|o>-1=U-E{I4Voc+=eR');
define('NONCE_KEY',        '?J{<,J<&7o-,>MUcI]H$~2DUWr8 p:}e_dS.SaZ/j<ogwINZG:-s|pM-RISr02V+');
define('AUTH_SALT',        '-qbY- KMbRJzM`#O2`+;8JFKrGy%m7h1j5>k&>-J|[Yu;ii[&Yj%{PZ-e+;8(OOg');
define('SECURE_AUTH_SALT', '^QwtJ,:V!W)Z6zMab2lmaE)ZJ]>4_ v6Pko})jOb4u^/rDL&vukr+^K[86 (0*G@');
define('LOGGED_IN_SALT',   '@+WSr1]AumF3 8Am]kwgkB:W}K6pZ*5TOL$|=H7{yPEF;|+)qtU.ZDF:X:u;-!-J');
define('NONCE_SALT',       '^4,aipnQazPf|3b,DCEVWS+3g`L2kdG_$pZHi<xzW1j]qGUx9+6<pHXV-J#j0>[7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
