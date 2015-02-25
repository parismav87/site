<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'PmvGEKiW,Dq.r0rY:y|bJr]UziZkV=H%4r:G:DqJ2]AtzvdJq!z47>ZRE4MEB`AI');
define('SECURE_AUTH_KEY',  'Z]5ditA~j9`#+#KUd+t_KDJs#,SGVr=x68oM7MB<$Ri_zg7yDZVIX:ax{Bpe(E,C');
define('LOGGED_IN_KEY',    'd6$no5eCXqZnVuwsAL&na*DCFVXOD*WfUppigs+Vzb7pI!;9@aNDj&-Pq_H(B|9|');
define('NONCE_KEY',        'cK7_R^[gscLf0A&R|XW>47InTW,uYXnhIuul7pvq$<E!eYU-pLm|R7C+:?dG+I=,');
define('AUTH_SALT',        'D^%J&5x]ei73]pwqVR#N*`_|Xao++a9bwjq4QD;&Bn;NzfD<vU80ms}nC0.*o6YK');
define('SECURE_AUTH_SALT', 'P+(Vl:SN7-P8#g)583 Li;Wy;+/a^c7=cvA1:|<ToF^0A-2ff|1L3gZ8~7`yZ%)s');
define('LOGGED_IN_SALT',   'N%(T[.5`Ylp6|(RR=~,k_-8B?8yZNET2*0kOIU7QRZ(SALT%#nW}Hp)HIE.QQ!5i');
define('NONCE_SALT',       'K: u?9JZ6-.HY}]dVUz=Y~g8rou*_u{1Yds@5NJu AF8fil`oHCndfrsz**t]tON');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
