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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cX9KEPB6ouccLsP6zVPZu7O0G1lINjO9yymf81DD437hFCO+vEc7zrBCR/6an/ocDQtnESm8LFky+LA1rhTAYg==');
define('SECURE_AUTH_KEY',  'M14PepKK5prKkDW1elvP311iVlcDcyRlLhCiCDSMPIg3xVUl4/4/jhxR+1FBIo0UMBGjfaTZOyPQ20HBhr3t7w==');
define('LOGGED_IN_KEY',    '3PQ9jBRcu7lPOZKvYUsygGsgqKH4MiW1r3HJZONjb99uWvRWhCHIFiZfIGLcKg7yFuzzY04ZZkMPShPcm4GALg==');
define('NONCE_KEY',        '0bITx0ulje14EfypR1yUVy/JZ10GijnCB1Z47eX14BuN767wrNE0j7phXO2mqEGlpsiu4D6JRIhQIzRSYtyUZQ==');
define('AUTH_SALT',        'mnLtCz2i+GTAU/0JShWFqEgvKOaTUAB55RkOYSTyrMEgUk7aSZVIAJMjULbXuZNyf5rVm4iQhhGkCGBJ7PVXmg==');
define('SECURE_AUTH_SALT', 'e5Um8PpUlOyrmaMadvvHG+ywwOEvYJhq2tneNgQ/nEUyAoy+OEsp0Tx8e4qjm6yBz10EoSs4KNkKEb4SDlqBuA==');
define('LOGGED_IN_SALT',   'dUtFG7DxuBcIqGkxaqlrLhT1UJPwQhWXYfh1M6SM5UhHMSmwniManwTWbRU+qj3V3iCPb0nV6dT748feLDHRZg==');
define('NONCE_SALT',       'C++9g6nrwTnFOehZrx/elwveMEbKu1eXjB0bp2x7a3A0WommNzZzgv/j2wN/tzi/s7eQy55R7l8ZBfDnmz+Frg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
