<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://Amna.example.com/
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 * @author     Amna <hinazaniz@gmail.com>
 */


class Wp_Book_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-book-admin.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-book-admin.js', array('jquery'), $this->version, false);

	}

	// Our custom post type function
	function create_book_post_type()
	{

		register_post_type(
			'books',
			// CPT Options
			array(
				'labels' => array(
					'name' => __('Books'),
					'singular_name' => __('Book'),
					'add_new' => __('Add New'),
					'add_new_item' => __('Add New Book')
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'books'),
				'show_in_rest' => true,

			)
		);
	}


	//creating custom post category
	function create_book_category()
	{

		// Set UI labels for Custom Post Type
		$labels = array(
			'name' => _x('Books', 'Post Type General Name', 'twentythirteen'),
			'singular_name' => _x('Book', 'Post Type Singular Name', 'twentythirteen'),
			'menu_name' => __('Books', 'twentythirteen'),
			'parent_item_colon' => __('Parent Book', 'twentythirteen'),
			'all_items' => __('All Books', 'twentythirteen'),
			'view_item' => __('View Book', 'twentythirteen'),
			'add_new_item' => __('Add New Book', 'twentythirteen'),
			'add_new' => __('Add New', 'twentythirteen'),
			'edit_item' => __('Edit Book', 'twentythirteen'),
			'update_item' => __('Update Book', 'twentythirteen'),
			'search_items' => __('Search Book', 'twentythirteen'),
			'not_found' => __('Not Found', 'twentythirteen'),
			'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
		);

		// Set other options for Custom Post Type

		$args = array(
			'label' => __('books', 'twentythirteen'),
			'description' => __('Manage book reviews and ratings', 'twentythirteen'),
			'labels' => $labels,
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 5,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'show_in_rest' => true,

			// This is where we add taxonomies to our CPT
			'taxonomies' => array('category'),
		);

		// Registering your Custom Post Type
		register_post_type('books', $args);

	}

	//custom tags function
	function create_book_tags()
	{

		// Labels part for the GUI

		$labels = array(
			'name' => _x('Tags', 'taxonomy general name'),
			'singular_name' => _x('Tag', 'taxonomy singular name'),
			'search_items' => __('Search Tags'),
			'popular_items' => __('Popular Tags'),
			'all_items' => __('All Tags'),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __('Edit Tag'),
			'update_item' => __('Update Tag'),
			'add_new_item' => __('Add New Tag'),
			'new_item_name' => __('New Tag Name'),
			'separate_items_with_commas' => __('Separate Tags with commas'),
			'add_or_remove_items' => __('Add or remove Tags'),
			'choose_from_most_used' => __('Choose from the most used tags'),
			'menu_name' => __('Tags'),
		);

		// Now register the non-hierarchical taxonomy like tag

		register_taxonomy('tags', 'books', array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array('slug' => 'tag'),
		)
		);
	}

	//function to add heading of metabox (book details)
	public function add_bookdetails_meta_box() {
		add_meta_box(
			'bookdetails',
			__('Book Details', 'wp-book'),
			array($this, 'bookdetails_meta_box_callback'),
			'books',
			'normal',
			'default'
		);
	}
	
	//Call back function to generate different fields of book 
	function bookdetails_meta_box_callback($post) {
		echo '<div style="border: 1px solid #ccc; padding: 10px; ">';
		wp_nonce_field('bookdetails_data', 'bookdetails_nonce');
		$this->bookdetails_field_generator($post);
		echo '</div>';
	}
	
	//metabox fields
    private $meta_fields = array(
        array(
            'label' => 'Author Name',
            'id' => 'author_id',
            'type' => 'text',
        ),
        array(
            'label' => 'Price',
            'id' => 'price',
            'type' => 'number',
        ),
        array(
            'label' => 'Publisher',
            'id' => 'pub_id',
            'type' => 'text',
        ),
        array(
            'label' => 'Year',
            'id' => 'year',
            'type' => 'number',
        ),
        array(
            'label' => 'Edition',
            'id' => 'edit_id',
            'type' => 'number',
        ),
        array(
            'label' => 'URL',
            'id' => 'url',
            'type' => 'url',
        ),
    );

	//Call back used above to create field details
    function bookdetails_field_generator($post) {
        $output = '';
        foreach ($this->meta_fields as $meta_field) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            $meta_value = get_post_meta($post->ID, $meta_field['id'], true);
            if (empty($meta_value) && isset($meta_field['default'])) {
                $meta_value = $meta_field['default'];
            }
            $input = sprintf(
                '<input %s id="%s" name="%s" type="%s" value="%s">',
                $meta_field['type'] !== 'color' ? 'style="width: 50%"' : '',
                $meta_field['id'],
                $meta_field['id'],
                $meta_field['type'],
                esc_attr($meta_value)
            );
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

	//function to describe format of all field rows
    function format_rows($label, $input) {
        return '<tr><th>' . $label . '</th><td>' . $input . '</td></tr>';
    }

	//function to save details of book
    function save_bookdetails_fields($post_id) {
        if (!isset($_POST['bookdetails_nonce']) || !wp_verify_nonce($_POST['bookdetails_nonce'], 'bookdetails_data')) {
            return $post_id;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        foreach ($this->meta_fields as $meta_field) {
            if (isset($_POST[$meta_field['id']])) {
                switch ($meta_field['type']) {
                    case 'email':
                        $_POST[$meta_field['id']] = sanitize_email($_POST[$meta_field['id']]);
                        break;
                    case 'text':
                        $_POST[$meta_field['id']] = sanitize_text_field($_POST[$meta_field['id']]);
                        break;
                }
                update_post_meta($post_id, $meta_field['id'], $_POST[$meta_field['id']]);
            } else if ($meta_field['type'] === 'checkbox') {
                update_post_meta($post_id, $meta_field['id'], '0');
            }
        }
    }

}
