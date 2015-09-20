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
define('DB_NAME', 'bhanupra_myblog');

/** MySQL database username */
define('DB_USER', 'bhanupra_myblog');

/** MySQL database password */
define('DB_PASSWORD', 'dP2[[kjS99');

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
define('AUTH_KEY',         'mxr6sw5fkbuwcexdbkyaphshgqrf7bg482yoh45hckkfkz8d4lqanhxmksp3lcww');
define('SECURE_AUTH_KEY',  'ohtfbbzo7zngaquvcxwbjqrxo6he4ojw3l5tkcbkkdafgexkrzkgdtqo087pvpl4');
define('LOGGED_IN_KEY',    'awfjoilf7hpfxs5pjzmxnncfjj3dbtb0ddia1acbegitioikw4pmmrzaijuscuqq');
define('NONCE_KEY',        'dj9rhxcmthpjcdzrtkmf8g2nlfrzjdkobxuqaemqye7nltvnknm7gjagtozjl7sv');
define('AUTH_SALT',        'qre4w9hzltxncct3lzimxrxbkabc0azfzpt2ahpdudb2lwgdb76ifmlyqxe3xwlf');
define('SECURE_AUTH_SALT', 'sjurrgxmdusddwkmky158msjpj9asygnadpylv8cdxomsbw6ronlszu7xj5ndhwt');
define('LOGGED_IN_SALT',   'cpxn3ncxn6uq9tb71vxorbk8q5vlh5kvzos3lzpuqpofrnxpuimosbnvudtitwiu');
define('NONCE_SALT',       'xogddsdck3besmlfv1t2581stzl56micnfdshqz4xehilxcrg4zfbawuv7rmpqai');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'blog';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'bhanuprakash.me');
define('PATH_CURRENT_SITE', '/myblog/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
