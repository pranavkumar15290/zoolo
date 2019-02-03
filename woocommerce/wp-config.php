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
define('DB_NAME', 'wp_woocom');

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
define('AUTH_KEY',         'n_~+o@e kL>7h*97Q^U]]xeNyN^oG8&R<<L>~t1OU4#HlU9+lDZPmXBk3pLj.Wv<');
define('SECURE_AUTH_KEY',  'PNwW@VJr6+m]IuDC_ZCCSh0!^RX[WwH%,hv.}yb[aN0xx8d8v}rTGQ?|OZFAvf}k');
define('LOGGED_IN_KEY',    'oT$XCBdR$s}m#Z:L]fp3o[6Poz*a_L4Kj8N$P/yjA!,x*b93(;1;x8g[vsebGv)K');
define('NONCE_KEY',        '4MWPniY;m[i?nN2OvEdV&Ay%t:b*s(}:2Z?CJNx<+!<{siFJC(<wt{XASc%J73Wa');
define('AUTH_SALT',        'IN:C]nrWc^(.}?U{X&<gJqzc^ 7/[y!Mue!yayn-4#8rM$fmD#U1EM?Ux4ci`/5@');
define('SECURE_AUTH_SALT', 'ge9l0T;m~(|x)VP/(hn/O|Ql9qJo?*VrUgOy}KP-QbGD<2!oysdd~KYHncnj#ozO');
define('LOGGED_IN_SALT',   'LI0=Bd,vZZy5|4?u~|9.=?LQNkZJzaTu-,Wz5~gvz94&~IQ^Kl+W#|)~;Qxot[oC');
define('NONCE_SALT',       'Sa)j*hHO/o[-&hR*^<}0y7wDLb1h?JqKs(.J%auEv,Kq%pNu2}fnmD16+OykZS r');

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
