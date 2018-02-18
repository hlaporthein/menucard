<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


class FW_Extension_MENUCARD extends FW_Extension {


	private $post_type         = 'zb-menu';
	private $slug              = 'menu';
	private $taxonomy_slug     = 'menu-category';
	private $taxonomy_name     = 'zb-menu-category';
	private $taxonomy_tag_name = 'zb-menu-tag';
	private $taxonomy_tag_slug = 'menu-tag';


	/**
	 * @internal
	 */
	public function _init() {
		$this->define_slugs();

		add_action( 'init', array( $this, '_action_register_post_type' ) );
		add_action( 'init', array( $this, '_action_register_taxonomy' ) );
	}


	/**
	 * Define extension slug
	 */
	private function define_slugs() {

		$this->slug          = apply_filters( 'zb_ext_menu_post_slug', $this->get_db_data( 'permalinks/post', $this->slug ) );
		$this->taxonomy_slug = apply_filters( 'zb_ext_menu_taxonomy_slug', $this->get_db_data( 'permalinks/taxonomy', $this->taxonomy_slug ) );
	}


	/**
	 * Register Custom Post Type
	 */
	public function _action_register_post_type() {

		$post_names = apply_filters( 'fw_ext_menu_post_type_name',
			array(
				'singular' => __( 'Menucard', 'fw' ),
				'plural'   => __( 'Menucards', 'fw' ),
			) );

		register_post_type( $this->post_type,
			array(
				'labels'             => array(
					'name'               => $post_names['plural'], //__( 'Portfolio', 'fw' ),
					'singular_name'      => $post_names['singular'], //__( 'Portfolio project', 'fw' ),
					'add_new'            => __( 'Add New', 'fw' ),
					'add_new_item'       => sprintf( __( 'Add New %s', 'fw' ), $post_names['singular'] ),
					'edit'               => __( 'Edit', 'fw' ),
					'edit_item'          => sprintf( __( 'Edit %s', 'fw' ), $post_names['singular'] ),
					'new_item'           => sprintf( __( 'New %s', 'fw' ), $post_names['singular'] ),
					'all_items'          => sprintf( __( 'All %s', 'fw' ), $post_names['plural'] ),
					'view'               => sprintf( __( 'View %s', 'fw' ), $post_names['singular'] ),
					'view_item'          => sprintf( __( 'View %s', 'fw' ), $post_names['singular'] ),
					'search_items'       => sprintf( __( 'Search %s', 'fw' ), $post_names['plural'] ),
					'not_found'          => sprintf( __( 'No %s Found', 'fw' ), $post_names['plural'] ),
					'not_found_in_trash' => sprintf( __( 'No %s Found In Trash', 'fw' ), $post_names['plural'] ),
					'parent_item_colon'  => '' /* text for parent types */
				),
				'description'        => __( 'Create a menu item', 'fw' ),
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				/* queries can be performed on the front end */
				'has_archive'        => true,
				'rewrite'            => array(
					'slug' => $this->slug,
				),
				'menu_position'      => 4,
				'show_in_nav_menus'  => true,
				'menu_icon'          => 'dashicons-portfolio',
				'hierarchical'       => false,
				'query_var'          => true,
				/* Sets the query_var key for this post type. Default: true - set to $post_type */
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'thumbnail', /* Displays a box for featured image. */
				),
				'capabilities'       => array(
					'edit_post'              => 'edit_pages',
					'read_post'              => 'edit_pages',
					'delete_post'            => 'edit_pages',
					'edit_posts'             => 'edit_pages',
					'edit_others_posts'      => 'edit_pages',
					'publish_posts'          => 'edit_pages',
					'read_private_posts'     => 'edit_pages',
					'read'                   => 'edit_pages',
					'delete_posts'           => 'edit_pages',
					'delete_private_posts'   => 'edit_pages',
					'delete_published_posts' => 'edit_pages',
					'delete_others_posts'    => 'edit_pages',
					'edit_private_posts'     => 'edit_pages',
					'edit_published_posts'   => 'edit_pages',
				),
			) );

	}



	/**
	 * Register Taonomy Types
	 */
	/**
	 * @internal
	 */
	public function _action_register_taxonomy() {

		$category_names = apply_filters( 'fw_ext_menu_category_name', array(
			'singular' => __( 'Menu Category', 'fw' ),
			'plural'   => __( 'Menu Categories', 'fw' ),
		) );

		register_taxonomy( $this->taxonomy_name, $this->post_type, array(
			'labels'            => array(
				'name'              => sprintf( _x( 'Menu %s', 'taxonomy general name', 'fw' ), $category_names['plural'] ),
				'singular_name'     => sprintf( _x( 'Menu %s', 'taxonomy singular name', 'fw' ), $category_names['singular'] ),
				'search_items'      => sprintf( __( 'Search %s', 'fw' ), $category_names['plural'] ),
				'all_items'         => sprintf( __( 'All %s', 'fw' ), $category_names['plural'] ),
				'parent_item'       => sprintf( __( 'Parent %s', 'fw' ), $category_names['singular'] ),
				'parent_item_colon' => sprintf( __( 'Parent %s:', 'fw' ), $category_names['singular'] ),
				'edit_item'         => sprintf( __( 'Edit %s', 'fw' ), $category_names['singular'] ),
				'update_item'       => sprintf( __( 'Update %s', 'fw' ), $category_names['singular'] ),
				'add_new_item'      => sprintf( __( 'Add New %s', 'fw' ), $category_names['singular'] ),
				'new_item_name'     => sprintf( __( 'New %s Name', 'fw' ), $category_names['singular'] ),
				'menu_name'         => $category_names['plural'],
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'rewrite'           => array(
				'slug' => $this->taxonomy_slug,
			),
		) );

	}

}