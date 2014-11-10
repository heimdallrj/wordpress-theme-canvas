<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress 3.5
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

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
define('AUTH_KEY',         'dO-bCre0u+mOCB1vkiCJ8X7K4Z49Wb-wf$&|n];<bmh;DiGC93}U-*21.HxhK[:6');
define('SECURE_AUTH_KEY',  '&pK%MMV*^(-+CWb=OGvt^y%$MZDKt$uDE*$v=eXxzCoYIq]sE`%),k/*gGh!#IH%');
define('LOGGED_IN_KEY',    'Pvv{&BKyY@g}%_W|JUS*bx.34/hcp<1Dpj,-j{h=O&dn/]n%MA+V$c(He~7[-:]n');
define('NONCE_KEY',        '14@B?xxW+BiXCb8O?*H7|$5Db0eIC&xfv4grfG{s,qG^DrYp87Cp%oTu,DXC@)vx');
define('AUTH_SALT',        ':?U+Oq]|%BU* TsWc<^<xu8 2j=.4MrqH5Z+#YQv4E>^aE3E_U:P^Ge400p4jU~3');
define('SECURE_AUTH_SALT', '!;fDhC iR:|sk#Z-.9+&3L!9W*X1^}qs{UiXs<8,lQkx,SZPa_J,+Tx->C/!X.:D');
define('LOGGED_IN_SALT',   ']/a24?TICiGPpZ3=lsEfq+8qYMKmSm[U&-3x5k:2^PnsxObU{|@|j,j5G<=N|Y(%');
define('NONCE_SALT',       '>t!gUT-~$B=eC6Q#/PBnU#GTK60l=4Fk9f4pZ[]yrJ3U]T|o<wH*3)E8)X_W+?^L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wptbl_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Speed: Set WordPress Post Revisions
 *
 * @parm Boolean or Interger 
 */
define('WP_POST_REVISIONS', false );

/**
 * Speed: Set a Cookie Domain
 *
 * If you serve static content (i.e. your media uploads) from a subdomain, 
 * it’s a good idea to set a “cookie domain”. 
 * By doing that, cookies won’t be sent each time static content is requested.
 */
//define('COOKIE_DOMAIN', 'www.yourwebsite.com');

/**
 * Speed: Change the Filesystem Method
 * 
 * The code below makes it easier for you by forcing the filesystem
 * to use direct file I/O request from within PHP – in other words, 
 * you won’t need to enter FTP credentials anymore.
 */
define('FS_METHOD', 'direct');

/**
 * Security: Force SSL on the Admin Panel
 */
//define('FORCE_SSL_LOGIN', true);
//define('FORCE_SSL_ADMIN', true);

/**
 * Change the Autosave Interval
 */
define('AUTOSAVE_INTERVAL', 240 ); // the value should be in seconds!

/**
 * Easily Move Your WordPress Website
 */
define('RELOCATE',true); // We're not done yet!

/**
 * Disable internal Wp-Cron function
 */
//define('DISABLE_WP_CRON', true);

/**
 * Disable Editing of Plugin & Theme Files
 * Disable the editing of theme and plugin files by adding the constant below:
 */
//define('DISALLOW_FILE_EDIT',true);

/**
 * Disable Editing of Plugin & Theme Files
 * Disable installing new themes and plugins, and updating them:
 */
//define('DISALLOW_FILE_MODS',true);

/**
 * Enable Development Mode while developing the Site
 */
define('WP_DEBUG',true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
