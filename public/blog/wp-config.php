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
define('DB_NAME', 'nestlecafe_blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'C;s06q:[G?.6Tm?qvrX/*Y+<~dnjiCgLmr:>VyR9mYb<+0op+(k(7M>@Mj~~e3%k');
define('SECURE_AUTH_KEY',  '5+2nk*Y?=c!(E|=HycRXRJN =]N jp[`;vM,(_VlkPP<zjd&8ID7O0-c_)zXH-n^');
define('LOGGED_IN_KEY',    'M-v8`ocE~+Y#zT0NDuo5+&EQn-TaH]C#t,6* ]+pGa[v]?W,rhu,r.%|A: N/zkG');
define('NONCE_KEY',        'k13Og+$&s<Ct6-3h&hkK^Ul+|bB@wvUvtvU,/f$?WlO1Fv.~|F@Tzt$X8xXgscb!');
define('AUTH_SALT',        'h/zNHiXcxB!3c?[3IB9kak38x!,9ZBlq-,8ruYz-[RDP*;8{(/%Ai=n&=17<jpsi');
define('SECURE_AUTH_SALT', 'm@$L4Gf#T{e7=4e<+}td @BNuPp]fb!q!9: :F|xHX (^YQdoe(n3sse=#$ enFq');
define('LOGGED_IN_SALT',   'nd|-ohoRN< W_)9t:>hZ(?_6]|=:adN,icQ~S4!03nXNFrlk|GoRt(PfMk6@fA(%');
define('NONCE_SALT',       '0_(hG]nMG@(~6lg;OZe|{T5m!CG&+-OqCgZ6{&5LosQYxNMUGE:3f|Q)TZ.Ld:CC');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
