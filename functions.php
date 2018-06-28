<?php

// include Navbar Walker For customize bootsrtap Navigation
require_once get_template_directory() . '/bootstrap-navwalker.php';

// REMOVE GENERATOR META TAG
remove_action('wp_head', 'wp_generator');

// add featured images support
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 300, 300 );
/** Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
) );
// Function to add My Custom Styles
function tulip_add_styles(){
    // bootstrap
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    // custom admin
	wp_enqueue_style('custom-admin-css', get_template_directory_uri() . '/css/custom-admin.css');
    // Font Awesome
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
    // include Parts of Pages Stylesheets
    // Header
	wp_enqueue_style('Header-css', get_template_directory_uri() . '/css/inc/header.css');
    // Nav Bar in header
	wp_enqueue_style('Navbar-css', get_template_directory_uri() . '/css/inc/navbar.css');
    // Author Page
	wp_enqueue_style('author-css', get_template_directory_uri() . '/css/inc/author.css');
    // single page post
    wp_enqueue_style('single-post-css', get_template_directory_uri() . '/css/inc/single-post.css');
    // Footer
    wp_enqueue_style('Footer-css', get_template_directory_uri() . '/css/inc/footer.css');
    // The Custom Frame-Work For Theme
	wp_enqueue_style('custom-frame-work-css', get_template_directory_uri() . '/css/custom-frame-work.css');
    // Resposive File ' media '
	wp_enqueue_style('media-css', get_template_directory_uri() . '/css/media.css');
    // The Main Theme Style Hold INDEX.PHP
	wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');
}

// Add Animate CSS

function animate_css_style() {
	wp_register_style( 'animate-css',
					  get_template_directory_uri() . '/css/animate.min.css',
					  array(),
					  '20120725',
					  'screen' );
	wp_enqueue_style( 'animate-css' );
}
add_action('wp_enqueue_scripts', 'animate_css_style');
// Add My Custom Scripts
function tulip_add_scripts(){

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'add_my_script' );
function add_my_script() {
    wp_enqueue_script(
        'your-script', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/main.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}

// Add Custom Menu Support == have Add Action down
function tulip_register_custom_menu() {
	register_nav_menus(array(
		'bootsrtap-menu' => 'Header Menu',
		'footer-menu' => 'Footer Menu'
	));
}

// Add the menu inside Function for call it in header
function tulip_header_navwp_nav_menu(){
	wp_nav_menu(array(
		'menu_id'        => 'primary-menu',
		'theme_location' => 'bootsrtap-menu',
		'menu_class' => 'nav navbar-nav navbar-right  animated wobble',
		'container' => false,
		'depth' =>3,
		'walker' => new wp_bootstrap_navwalker(),
		'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
	));
}

// Customize The Excerpt Words Length & Read More Dots
// added By @Emad

function tulip_extend_excerpt_length($length)
{
	return 15;
}
function tulip_excerpt_change_dots($more)
{
	return ' ...';
}

// Added by @Emad
// Filters
add_filter('excerpt_length', 'tulip_extend_excerpt_length');
add_filter('excerpt_more', 'tulip_excerpt_change_dots');
// Added by @Emad
// Action for add tulip Style files
add_action('wp_enqueue_scripts','tulip_add_styles');
// Action for add tulip Script files
add_action('wp_enqueue_scripts','tulip_add_scripts');
// Action for Add Tulip Custom menu
add_action('after_setup_theme', 'tulip_register_custom_menu');


function theme_prefix_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

add_filter('get_custom_logo','change_logo_class');


function change_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}

add_theme_support( 'custom-logo' );

// determine the excerpt length or number of words by filter
function tulip_custom_excerpt_length( $length ) {
	if (is_author()){
		return 100;
	}else if(is_category()){
		return 20;
	}
	else{
		return 25;
	}
}
add_filter( 'excerpt_length', 'tulip_custom_excerpt_length', 999 );


// Register 4 widgets Area in footer
function tulip_widgets_init() {

	// First footer widget area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'tulip' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'tulip' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'tulip' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'tulip' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Third Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'tulip' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'tulip' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Fourth Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'tulip' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'tulip' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

// Register sidebars by running tulip_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'tulip_widgets_init' );

// Create Prev 1.2.3.4 Next
function numbering_pagination() {
	global $wp_query; // Make WP_Query Global
	$all_pages = $wp_query->max_num_pages;

	$current_page = max(1, get_query_var('paged')); // Get All Posts

	if ($all_pages > 1) { // check if Total Pages

		return paginate_links(array(
			'base'	=> get_pagenum_link() . '%_%',
			'format'	=> 'page/%#%',
			'current'	=> $current_page,
			'mid_size'	=> 2,
			'end_size'	=>2
		)); 
	}
}

// Register Sidebars
function tulip_main_sidebar() {

	$args = array(
		'id'            => 'sidebar-1',
		'class'         => 'sidebar-1',
		'name'          => __( 'Tulip Sidebar', 'text_domain' ),
		'description'   => __( 'Drop Your Widgets Here', 'text_domain' ),
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'tulip_main_sidebar' );

	// remove Paragraph from the post conten
	function tulip_remove_p($content) {
		remove_filter('the_conten', 'wpautop');
		return $content;
	}
	add_filter('the_content', 'tulip_remove_p', 0);


    // Removes a class from the body_class array.
 
    add_filter('body_class', function (array $classes) {
        if (in_array('rtl', $classes)) {
            unset( $classes[array_search('rtl', $classes)] );
        }
        return $classes;
    });

    // Add specific CSS class by filter in body class
        add_filter(
        'body_class',
            function($classes){
                return array_merge($classes,array('index-page'));
            }
        );

    // Most Commented posts
    /**
 * Display top commented posts.
 *
 * @package saidelbakkali.com
 *
 * @author Said El Bakkali
 */
if ( ! function_exists( 'sb_top_commented_posts' ) ) {

	/**
	 * Display most commented posts en the Front-End.
	 */
	function sb_top_commented_posts() {

		$sb_top_commented_posts = get_transient( 'sb_top_commented_posts_cache' );

		if ( false === $sb_top_commented_posts ) {
			// WP_Query arguments.
			$args = array(
				'post_status'            => array( 'publish' ),
				'posts_per_page'         => '5' + count( get_option( 'sticky_posts' ) ),
				'orderby'                => 'comment_count',
			);

			// The Query.
			$sb_top_commented_posts = new WP_Query( $args );

			set_transient( 'sb_top_commented_posts_cache', $sb_top_commented_posts, DAY_IN_SECONDS );
		}

			// The Loop.
		if ( ! is_wp_error( $sb_top_commented_posts ) && $sb_top_commented_posts->have_posts() ) {
			// Start output buffering.
			ob_start();

			echo '<ul class="sb-top-commented-posts">';

			while ( $sb_top_commented_posts->have_posts() ) {
				$sb_top_commented_posts->the_post();
				echo '<li>';
				echo '<figure class="sb-top-commented-posts-thumbnail">';
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'sb-top-commented-posts' );
				}
				echo '</figure>';

				echo '<div class="content">';
					the_title( '<h3 class="sb-top-commented-posts-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					comments_popup_link(
						__( 'No comments yet', 'text-domain' ),
						__( '1 comment', 'text-domain ' ),
						__( '% comments', 'text-domain' ),
						'comments-link sb-top-commented-posts-comments-link',
						__( 'Comments are off for this post', 'text-domain' )
					);

					echo '</div></li>';
			}
			
			echo '</ul>';
			
			$output = ob_get_clean();

			// Return output.
			return $output;
		}// End if().

		// Restore original Post Data.
		wp_reset_postdata();
	}
}// End if().

/**
 * Delete transient from wp_options when comment count has been updated.
 */
function invalidate_sb_top_commented_posts_cache() {
	delete_transient( 'sb_top_commented_posts_cache' );
}
add_action( 'wp_update_comment_count', 'invalidate_sb_top_commented_posts_cache' );




// enqueue script
function my_scripts_method() {
if ( !is_admin() ) {
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script(
		'custom-accordion',
		get_stylesheet_directory_uri() . '/js/accordion.js',
		array('jquery')
		);
	}
}
add_action('wp_enqueue_scripts', 'my_scripts_method');
?>