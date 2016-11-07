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
define('DB_NAME', 'hitesh1');

/** MySQL database username */
define('DB_USER', 'hitesh');

/** MySQL database password */
define('DB_PASSWORD', 'hitesh!@123');

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
define('FS_METHOD', 'direct');
define('AUTH_KEY',         'Jt4}PyG#)_OH(xmSpIf]oaLf$ZNQYSnC7QDga|8<2!U.|tQv5v4Qj{D2z:bt?u-^');
define('SECURE_AUTH_KEY',  'UnUWNvF`RjX.W.rWo;8(PSK9.5|v@E{adlBUP?W8.Ef4@=A`+d=L@oq6c:sW)D!l');
define('LOGGED_IN_KEY',    '[<:@JEw?.51_[gxp>XMuB&.6#Ib.6U)l3c5>)Udy|L+B+Qmmh+f&*8K<y!1(`bx_');
define('NONCE_KEY',        '+;wf6QOM/J#(04^8HZM^j:j9Y>3}V.vsO4^(RPq_(=M%&]dQuF`DdLNQk=_&NPXF');
define('AUTH_SALT',        'mQvo*+k=Kkg*A9|$o@%^?7lY) o# iSS#h+Tb$iS>y^1yw Q6alvSdZ$H?oe7#zN');
define('SECURE_AUTH_SALT', ';R~@nu]dcn< WYNnW;[ukeh1d1O,j+E>#4{:yml.96^&smwI|~X.K{]DKR<D|&M|');
define('LOGGED_IN_SALT',   '[n{1R2E=Ql9,dn_W|0j,pR7aKaqu`sS3&B(>jQZ<83A4as*kG66De;ulYN2s%F[%');
define('NONCE_SALT',       'sTe`B4mBkTZCReNc$O?zit^KS%sQU.I,ei[AuI,yk#%DBh4ITYufni>s)G8]_fjK');

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

