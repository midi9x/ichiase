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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '~7o~7J)nb6q}vwks<k(l$c3ve^zD/#^7Wi;!NZ/c.=M~8#[q m*wmrpd;_f|XczW');
define('SECURE_AUTH_KEY',  'b:vuJPCtNKfjy,%Md>(!l.UIW:_^U|eAYR9sAa{{YCF+SWS(R;R!H_KY|L1XU5Kb');
define('LOGGED_IN_KEY',    ';= Sr.^,d2HG_0jv<CrmM$+aX?8iP0-M0GC:yS(P+@O}wo78Z?d41Tn`!.<GGjtC');
define('NONCE_KEY',        'cMIG&+q$.>s@TQcm*jz5@9l2YeH)#168hOYQhN>->],?nf EuxV3V>ybv }65xr#');
define('AUTH_SALT',        'CV--}_K+I;(Eog-=xtbLEh8tO[~~+IMmyP`QH#7qK[+7.)ULhkkW#ZC93s-CKJOE');
define('SECURE_AUTH_SALT', 'Itn*R^=q%|k!t-(DWfhW[*bHvLIK;88,E=XA>Ivs>-g<L: T0CL}Alvt8&eOR<pK');
define('LOGGED_IN_SALT',   '>#v_UXO4R;kCIq.5)@0-|!Q{Q6K7_NFn.OqReQxaESJbQ<fNoi:QKxizO3o85K0T');
define('NONCE_SALT',       'Qf!c<yJ!NhWo]:Mj2@%<8]+urLMs+fC(FS@!/)9Ncik>j9b/je`5R2REBviJa;LO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ichiase_';

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
