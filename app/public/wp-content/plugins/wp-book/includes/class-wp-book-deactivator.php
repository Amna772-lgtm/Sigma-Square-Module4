<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://https://Amna.example.com/
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wp_Book
 * @subpackage Wp_Book/includes
 * @author     Amna <hinazaniz@gmail.com>
 */
class Wp_Book_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		self::drop_custom_meta_table(); 

	}

	/**
     * Drop custom meta table for book details.
     */
    private static function drop_custom_meta_table() {
        global $wpdb;
    
        $table_name = $wpdb->prefix . 'custom_meta_table';
    
        $sql = "DROP TABLE IF EXISTS $table_name;";
    
        $wpdb->query($sql);
    }

}
