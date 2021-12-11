<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'sportx' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^4r}hQ<)~sv:Prx#sAn0^ zeG.]efNc{X{z0S.}]^5Unw0C24oQW3Fo&yUWiiJZ>' );
define( 'SECURE_AUTH_KEY',  ':5t6Q.09F79la*3hbQiG~Vg9>&qVSN_1kCMPQfxqE>_fx8QB2UsX{U?FQZco0qh*' );
define( 'LOGGED_IN_KEY',    'RNWkiG|{:$:ceJ0%9gp_n$AfA(&72d.)Z:y^wd*e$(9s8+ell88>Vu=[GH]ef+:M' );
define( 'NONCE_KEY',        'pW5(K+XV/=iXH6bo*WkeonX@Z9xVl[<}!&XnXL<P[Tn%)ap.Ff>6:&?7^L-{l=A~' );
define( 'AUTH_SALT',        'KP>2%:>K2`/ACoBg@S=zAdi(Nf.FC7H@m:L->2U;+d>Ov#5pyg}}*wxNMYc$j,5Y' );
define( 'SECURE_AUTH_SALT', 'nwjbQ@-`pLxY.UC1[H6I#khN-^!MsR8ich#i73[^Jh!v*)&jx]qPv!?,dD+ZPQhu' );
define( 'LOGGED_IN_SALT',   ';rjLn7vX gEogh/wfx|M={5eG>@y=0@A~1p{?3.,G.~=4lFBJSuQ0$FlRNu((kz{' );
define( 'NONCE_SALT',       '9jas4.i83[2M,]#F^JV`mL[SO{GMbh&-dX1}_[nyW i+E|/K>&Qy:74Hf6S:8C|e' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
