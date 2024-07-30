<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://Amna.example.com/
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Book
 * @subpackage Wp_Book/includes
 * @author     Amna <hinazaniz@gmail.com>
 */
class Wp_Book_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{

		function wp_book_create_meta_table()
		{
			global $wpdb;
			$table_name = $wpdb->prefix . 'book_meta';
			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE $table_name (
        meta_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        book_id bigint(20) unsigned NOT NULL DEFAULT '0',
        meta_key varchar(255) DEFAULT NULL,
        meta_value longtext DEFAULT NULL,
        PRIMARY KEY (meta_id),
        KEY book_id (book_id),
        KEY meta_key (meta_key(191))
    ) $charset_collate;";

			require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}


}
