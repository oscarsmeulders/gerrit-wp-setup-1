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
define('DB_NAME', 'gerrit');

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
define('AUTH_KEY',         'wt=aj}!]8Q8V;.BP@tUw#<*JR]G1OVgxh!4<7VuK//;| fl_qr?~I2;rxrxEBH.=');
define('SECURE_AUTH_KEY',  '+|R+g=rHIkAxN>{25$/fPFA~H^%_H!@Rz$fj7d,r+1|o(R%ueq^TWWyx_ tu7h|K');
define('LOGGED_IN_KEY',    'YW]Wfaj:c]<p;&b9w7c=jP6w,1IQwhukH,3=W5W-V}J#D+ K2nFV/g v#AriXu>G');
define('NONCE_KEY',        '`o0Sne[=E*|;U(/xkid>JX+9W )e8q82=W%L61O&1yVU$=_N{*BW^WSUGQR-k#5T');
define('AUTH_SALT',        'g=KJJ-;>;|u9q7ZDP%~z}d`Yuj]! R(U4!>MIqr4u($X+kR]B@57BG[}<C!)Dw_E');
define('SECURE_AUTH_SALT', ';+ABkqjW|ZN; w&kbUtO3?fl5qaIiKO .OHA~G2/Gm^`7]7/L}[q<P-C^3yYef&g');
define('LOGGED_IN_SALT',   '~8Vz)drz<,5JXPx.fF-`XX4`p#dnC;>HFq2B~  EcDr- <)crf@xPY+{Z]{(UnQG');
define('NONCE_SALT',       '%sb{Ooaa9ULhQdT6Xu`H0a_t*YQwu$gCIi(gYH(1HJ4fIaqI->|qgZx~ifqCdb#x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'schreurs_gerrit_uk_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WPLANG', 'nl_NL');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
