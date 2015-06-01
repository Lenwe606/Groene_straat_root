<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         '/Av86ivry+K:d]WrdnkBtGV-XhU8`VY4Gt+8UI~nF6!Gigy~u|C+t;LlMZhfeyt<');
define('SECURE_AUTH_KEY',  'B`xJ9:H|4E8g,ml`RnQ-d|S<|[h|3WxvW Z?6 Ay*Z:tPk{f@z+@|+{ufRn0p/hX');
define('LOGGED_IN_KEY',    'UUm}7hjlZiDD*dtucF?pxJp:*&^GYvQ(J)QEt9IIoemYM@Y{%h$%6Jx3Rk[k<2HJ');
define('NONCE_KEY',        '@@T&;2{4hsB%e8TqJl)7s{9vx.q-NO~b~*2u-8dy:`0BXV7r2SuP1HR0EeUg6.2E');
define('AUTH_SALT',        'Tloq7U*%(p,tEyPDSie!QTG#H7zbqZ#~E|3k~nhGxaN%.+xevR*KLq0R}3/YG5+m');
define('SECURE_AUTH_SALT', ':j=;FUAa `4Lf|PkNlEQCq&HJHW[tTx#l^|C/g)A 2=W>hXRbN8K$kTMamkB{&Mx');
define('LOGGED_IN_SALT',   'YU6*] )ng%:IQomva7_(lX$R~7cJCpWNc+O74VR-%FU6)wChD-Bjgb~P]elufG*}');
define('NONCE_SALT',       'c$|[4%]>+J$git2-fgRs#.ZI{2efQ|Cf:pQ4kkOChI$jHC!JZhr:M^5TV9B?y}Gh');

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
