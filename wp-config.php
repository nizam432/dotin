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
define('DB_NAME', 'dotin');

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
define('AUTH_KEY',         '[im?{nX{W3OBtb;)U/>cvo`zAf1fQF~(@#;t<LIa[4OB^a3uUDY&gCpU 63OkFi!');
define('SECURE_AUTH_KEY',  'q6O^vv1$[&`%T!5C%BGrIAw@eYPiUx7xkF6!E[qTQ+BD/T#$Eg3rOta%f-k5L;~3');
define('LOGGED_IN_KEY',    '~:K _}qp~i06|{c1hi8k,?ZO(BT Le.M[}L9Y3g*3b~,%B$dix9to>1xSl]v +p9');
define('NONCE_KEY',        '7:^eQ<zHa,Y.:t^E6 bjF+L1?j[D#|`=G!dx*w$`:5mXUK22:JQw^~GX*>,Fo(.B');
define('AUTH_SALT',        'Mqol)c9HNRVP_@)*9|Z$8.WN|{E?aOW5 +af(XO*~,6X;JZS 2WAZ:t-)k3MG(9u');
define('SECURE_AUTH_SALT', '9!vGIJ(}_v1pR-8S.b2DT5h,B[jxHtojIIaVUqGDX6b[.U5=C>Fx$ nR0OFV)UjD');
define('LOGGED_IN_SALT',   'Uhc&.@Xp(E0T6+Mxhrndsz$F>(xRI /@qF>|V8Vd6{-`Fg0t,s}r4PFa%8ow<}d.');
define('NONCE_SALT',       ';Q,zp6ZIm!F]/bts~DYS5o1}:Vu--L#X&p3G3~1tmGW}`Xt%?OpzbLG4n>HN&qhh');

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
