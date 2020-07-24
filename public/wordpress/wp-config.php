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
define( 'DB_NAME', 'wp_usc' );

/** MySQL database username */
define( 'DB_USER', 'wp_usc' );

/** MySQL database password */
define( 'DB_PASSWORD', 'gMuLy0MFcM5RYvg5' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'by*RakW*Es{Z2w}3J+7LuR,mB|H</3pLxHzy+t;&&&IM;n~+({rhv1Vn.L#lS)?0' );
define( 'SECURE_AUTH_KEY',  'zeBGN6Fp[=d+1zA&n&[x!H35/>Im+wR7X@p7MC?`xV#]T:xK[{T-=X=S;6:%*-Eg' );
define( 'LOGGED_IN_KEY',    'Ki{op!f]f3T{T|lxU#wI1(,vYI)YRX_d*2$@T=jXW(&$TQ+L/a5W i.b47c#Hfg[' );
define( 'NONCE_KEY',        'ZwHmzfY[3I4nC(s?*9#8DsVYEIf-q)e2{Pom1x^d]+:nRXF(X.g5=9*(?0Qm|<k7' );
define( 'AUTH_SALT',        '9)3TM3p[z]8!=13UCE`c<|5hI`S7`B_uk7,QNp.%~ci+@9JRaq-]VSz:AX-w>3f)' );
define( 'SECURE_AUTH_SALT', '7X<=0V:?YO*gU?wi.>=0b@f 7-}]!8^z99h+<gYiR-1xe3r|gnNv1DHfwr 3,M-T' );
define( 'LOGGED_IN_SALT',   'Z08:WI=XQbE,a1 %qa-s7>.5eF&IlaM*oys{Dz!i07*!{eA)rbN9I5oi|[*{>]es' );
define( 'NONCE_SALT',       '5VZ9P?7aJ|lg69&UV)b`>tOCO-/j.edsHffr0y{;w7+!1JB%<fJIbmk=o59]Z#l!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

//CREATE USER 'wp_usc'@'localhost' IDENTIFIED WITH mysql_native_password AS 'gMuLy0MFcM5RYvg5';GRANT USAGE ON *.* TO 'wp_usc'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS `wp_usc`;GRANT ALL PRIVILEGES ON `wp\_usc`.* TO 'wp_usc'@'localhost'
