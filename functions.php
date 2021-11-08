<?php
/**
 * bahama functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bahama
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bahama_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bahama_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bahama, use a find and replace
		 * to change 'bahama' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bahama', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'bahama' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bahama_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'bahama_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bahama_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bahama_content_width', 640 );
}
add_action( 'after_setup_theme', 'bahama_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bahama_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bahama' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bahama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bahama_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bahama_scripts() {
	wp_enqueue_style( 'bahama-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('bahama-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style('bahama-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style('bahama-mp', get_template_directory_uri() . '/assets/css/magnific-popup.min.css' );
	// wp_enqueue_style('bahama-owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
	wp_enqueue_style('bahama-nice-select', get_template_directory_uri() . '/assets/css/nice-select.min.css' );
	wp_enqueue_style('bahama-animate', get_template_directory_uri() . '/assets/css/animate.min.css' );


	wp_enqueue_style('bahama-general', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style('bahama-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style('bahama-meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css' );



	wp_style_add_data( 'bahama-style', 'rtl', 'replace' );
	wp_deregister_script( 'jquery' );
	

	
	// wp_enqueue_script( 'bahama-form-script', get_template_directory_uri() . '/assets/js/contact-form-script.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'bahama-jq', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-jq-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-form-validator', get_template_directory_uri() . '/assets/js/form-validator.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bahama-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'bahama-jq-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'bahama-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );












	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bahama_scripts' );

add_action('acf/init', 'my_acf_init_block_types');

function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {


        acf_register_block_type(array(
            'name'              => 'features',
            'title'             => __('Features'),
            'description'       => __('A custom features block.'),
            'render_template'   => 'template-parts/features.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'features' ),
        ));
    }
}



add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'features', [
		'label'  => null,
		'labels' => [
			'name'               => 'features', // основное название для типа записи
			'singular_name'      => 'features', // название для одной записи этого типа
			'add_new'            => 'Add features', // для добавления новой записи
			'add_new_item'       => 'Добавление features', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование features', // для редактирования типа записи
			'new_item'           => 'Новое features', // текст новой записи
			'view_item'          => 'Смотреть features', // для просмотра записи этого типа.
			'search_items'       => 'Искать features', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Features', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           =>  'dashicons-carrot' ,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action( 'init', 'register_post_types_social' );
function register_post_types_social(){
	register_post_type( 'social', [
		'label'  => null,
		'labels' => [
			'name'               => 'Social', // основное название для типа записи
			'singular_name'      => 'social', // название для одной записи этого типа
			'add_new'            => 'Add social', // для добавления новой записи
			'add_new_item'       => 'Добавление social', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование social', // для редактирования типа записи
			'new_item'           => 'Новое social', // текст новой записи
			'view_item'          => 'Смотреть social', // для просмотра записи этого типа.
			'search_items'       => 'Искать social', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Social links', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-share-alt2',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [  ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action( 'init', 'register_post_types_contacts' );
function register_post_types_contacts(){
	register_post_type( 'contacts', [
		'label'  => null,
		'labels' => [
			'name'               => 'Contacts group', // основное название для типа записи
			'singular_name'      => 'contact', // название для одной записи этого типа
			'add_new'            => 'Add contacts', // для добавления новой записи
			'add_new_item'       => 'Добавление contacts', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование contacts', // для редактирования типа записи
			'new_item'           => 'Новое contacts', // текст новой записи
			'view_item'          => 'Смотреть contacts', // для просмотра записи этого типа.
			'search_items'       => 'Искать contacts', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Contacts', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-menu-alt3',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [  ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action( 'init', 'register_post_types_contacts_box' );
function register_post_types_contacts_box(){
	register_post_type( 'contacts_box', [
		'label'  => null,
		'labels' => [
			'name'               => 'Contacts box', // основное название для типа записи
			'singular_name'      => 'contact box', // название для одной записи этого типа
			'add_new'            => 'Add contact box', // для добавления новой записи
			'add_new_item'       => 'Добавление contact box', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование contact box', // для редактирования типа записи
			'new_item'           => 'Новое contact box', // текст новой записи
			'view_item'          => 'Смотреть contact box', // для просмотра записи этого типа.
			'search_items'       => 'Искать contact box', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Contact box', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-smartphone',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [  ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}



register_nav_menus(array(
	'bottom' => 'Нижнее меню'    
));





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}