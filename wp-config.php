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
define('DB_NAME', 'sportx');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         ':Xy8+#q[T8e8kIDYd9=3V}U`|_:un>NQoo7mh=eS0S@SuT)ZaWq]xCsPudQ&)u[a');
define('SECURE_AUTH_KEY',  'MmMh~O&o;1=vLji7K&PA1;XVw?v6/vf1z,N$W6>?`29&i<lYycuRs/=A>)C^o-MB');
define('LOGGED_IN_KEY',    ':?]{(N}H2fAvVqazc?hZ,@,P)P1`H:#Fivnz?I94HC*Td*fxj4]<_1(7j`V6*a{a');
define('NONCE_KEY',        'y;{Tu%ABbJ{;@EreTQ60]J!*NY:[tZhesc4)7>6wzT8i=%5/22h1l<L$`)=/}t[;');
define('AUTH_SALT',        'Th;0C6_/.]tH)%v? P)Khk6P;WC$1n=bLzMW(fxYFW:1=;TB%I1M<c A6d;(S@oW');
define('SECURE_AUTH_SALT', 'ZX#25xA*E;&[Ir[:7/x*|^EWOz8b%U[=BG(>PIKs1olcsJSz#<l^pQ!j%eM5i7|$');
define('LOGGED_IN_SALT',   '=&}U<Eq ?XMt*Gee3f(-KMG@)BCNBY@|-}e8b{U(~3)#mvOJu(;dtrq,==vxoY]>');
define('NONCE_SALT',       'vj~IyvE#oPPP@q* ?yRn;cAvi4Q11<6;!J+)hB7 KO^L.bmMYu2cbTRU:}=iB[`m');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */

define('WP_MEMORY_LIMIT', '1G');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';