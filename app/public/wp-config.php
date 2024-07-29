<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '|svYNypLp(hFc:M/_Y.lU$KWM3JA5`^m7JUl4]S1QtX[JmS*dufjzn[K n`uo50>' );
define( 'SECURE_AUTH_KEY',   '6UyIHw0>tUkvg0u/w_2-naL)p%ufcunQg<(*2$,dL`QY3$Z t_a*mhu=!I*/~saf' );
define( 'LOGGED_IN_KEY',     '9aE~Sq^rSe{n{l{xV~+Fm(Xb9PB6k]CiFvLJ_wzw*S+~:M=Kpq|h`#??SZ]SA/IE' );
define( 'NONCE_KEY',         'lH }4GAhg6*`/@8jXN){>O3%c-Ls=DPAkd poc>~,XetiPo)?`QAlU)C1hTA]mbc' );
define( 'AUTH_SALT',         '&]%:0vjNx<J$!TBymR3}cp2UKpR{0h*TY~3BF9K]5cGiK-{?n)v,!>b&=P%_&~pj' );
define( 'SECURE_AUTH_SALT',  '8%: y%ay8Ne<@AzSwa^rbu[M7/H(+VxB.mWr}NJ1-fG%ay6)yE9}D MBeq.@WvW1' );
define( 'LOGGED_IN_SALT',    'GzxKlC}<hf10miwPUqBhV{B Jx1off/fk }XRnQL1[um5Jk.dm:sx7SaiZa3ePV*' );
define( 'NONCE_SALT',        'y0>]jzjX3F;10By4%u|fqt{R~10zsA,d^bSDs/gO_qd!|ml1 z~f2UHUkq6UoY57' );
define( 'WP_CACHE_KEY_SALT', '2W(2-_L$e(d2SH/z0c{aZ$x!cgw&DCJQ=wgc}7;O-O1}&(NZ&n>j:%b<jT1*sfXJ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
//if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
//}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
