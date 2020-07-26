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
define( 'DB_NAME', 'apnic');

/** MySQL database username */
define( 'DB_USER', 'apnicuser');

/** MySQL database password */
define( 'DB_PASSWORD', 'apnicpassword');

/** MySQL hostname */
define( 'DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

define( 'WP_DEBUG', true );


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '29d14801c3ffb99737635fecea8c23ab224226b2');
define( 'SECURE_AUTH_KEY',  '6c8b12c88d0d41e27d9a85a8dea6004b02589d6e');
define( 'LOGGED_IN_KEY',    'a1f6f65556927365ad751753d6b2337b2c5b17cf');
define( 'NONCE_KEY',        'f390eeb280ee08c637aaaf917ab52965b1d3ae85');
define( 'AUTH_SALT',        '622d78892c8f38e94f7d74d09820879eff901f1f');
define( 'SECURE_AUTH_SALT', 'f07ebcbb1632f5d6d77e6dce6607b22d350a1dd8');
define( 'LOGGED_IN_SALT',   '29f572a849c88f09fb52d8d78212632c2baa46ec');
define( 'NONCE_SALT',       '10a247deb1f72dae723c847c66d42fda2bb972fd');

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
