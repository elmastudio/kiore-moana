<?php
/**
 * Kiore Moana functions and definitions
 *
 * @package Kiore Moana
 * @since Kiore Moana 1.0
 */

 /*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) )
	$content_width = 1160;

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
function kioremoana_setup() {

	// Make Kiore Moana available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'kioremoana', get_template_directory() . '/languages' );

	// Remove support form block widget screens.
	remove_theme_support( 'widgets-block-editor' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'kioremoana' ),
			'shortName' => __( 'S', 'kioremoana' ),
			'size' => 19,
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'kioremoana' ),
			'shortName' => __( 'M', 'kioremoana' ),
			'size' => 24,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'large', 'kioremoana' ),
			'shortName' => __( 'L', 'kioremoana' ),
			'size' => 28,
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'kioremoana' ),
			'shortName' => __( 'XL', 'kioremoana' ),
			'size' => 32,
			'slug' => 'larger'
		)
	) );

	// Disable custom editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	// Add editor color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'black', 'kioremoana' ),
			'slug' => 'black',
			'color' => '#212121',
		),
		array(
			'name' => __( 'white', 'kioremoana' ),
			'slug' => 'white',
			'color' => '#ffffff',
		),
		array(
			'name' => __( 'light grey', 'kioremoana' ),
			'slug' => 'light-grey',
			'color' => '#f2f2f2',
		),
		array(
			'name' => __( 'grey', 'kioremoana' ),
			'slug' => 'grey',
			'color' => '#9e9e9e',
		),
		array(
		'name' => __( 'blue', 'kioremoana' ),
		'slug' => 'blue',
		'color' => '#0089a7',
		),
		array(
		'name' => __( 'red', 'kioremoana' ),
		'slug' => 'red',
		'color' => '#0089a7',
		),
	) );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Load up the Kiore Moana theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// Grab the Kiore Moana Custom widgets.
	require( get_template_directory() . '/inc/widgets.php' );

	// This theme supports all available post formats by default.
	add_theme_support( 'post-formats', array (
		'aside', 'audio', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'chat'
	) );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'optional' => __( 'Footer Navigation (no sub menus supported)', 'kioremoana' )
	) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add support for Jetpack Infinite Scroll
	add_theme_support( 'infinite-scroll', array (
	'container'  => 'primary',
	'footer'  => 'main',
	) );

}
add_action( 'after_setup_theme', 'kioremoana_setup' );

/*-----------------------------------------------------------------------------------*/
/*  Returns the Google font stylesheet URL if available.
/*-----------------------------------------------------------------------------------*/
function kioremoana_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by PT Sans or Raleway translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$pt_sans = _x( 'on', 'PT Sans font: on or off', 'kioremoana' );

	$raleway = _x( 'on', 'Raleway font: on or off', 'kioremoana' );

	if ( 'off' !== $pt_sans || 'off' !== $raleway ) {
		$font_families = array();

		if ( 'off' !== $pt_sans )
			$font_families[] = 'PT Sans:400,700';

		if ( 'off' !== $raleway )
			$font_families[] = 'Raleway:400,800,900';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
function kioremoana_scripts() {
	global $wp_styles;

	// Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads JavaScript for scalable videos
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0' );

	// Loads Custom Kiore Moana JavaScript functionality
	wp_enqueue_script( 'kioremoana-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-08-04' );

	// Add Google Webfonts
	wp_enqueue_style( 'kioremoana-fonts', kioremoana_fonts_url(), array(), null );

	// Loads main stylesheet.
	wp_enqueue_style( 'kioremoana-style', get_stylesheet_uri(), array(), '2013-10-02' );

}
add_action( 'wp_enqueue_scripts', 'kioremoana_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function kioremoana_block_editor_styles() {
 wp_enqueue_style( 'kioremoana-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
 wp_enqueue_style( 'kioremoana-fonts', kioremoana_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'kioremoana_block_editor_styles' );

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
function kioremoana_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'kioremoana_page_menu_args' );

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}

/*-----------------------------------------------------------------------------------*/
/* Sets the post excerpt length to 55 characters.
/*-----------------------------------------------------------------------------------*/
function kioremoana_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'kioremoana_excerpt_length' );

/*-----------------------------------------------------------------------------------*/
/* Returns a "Continue Reading" link for excerpts
/*-----------------------------------------------------------------------------------*/
function kioremoana_more_link($more_link, $more_link_text) {
	return ' <div class="more-link-wrap"><a href="'. get_permalink() . '" class="more-link"><span>' . __( 'Read more', 'kioremoana' ) . '</span></a></div>';
}
add_filter('the_content_more_link', 'kioremoana_more_link', 10, 2);


function kioremoana_continue_reading_link() {
	return ' <div class="more-link-wrap"><a href="'. get_permalink() . '" class="more-link"><span>' . __( 'Read more', 'kioremoana' ) . '</span></a></div>';
}

/*-----------------------------------------------------------------------------------*/
/* Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and kioremoana_continue_reading_link().
/*
/* To override this in a child theme, remove the filter and add your own
/* function tied to the excerpt_more filter hook.
/*-----------------------------------------------------------------------------------*/
function kioremoana_auto_excerpt_more( $more ) {
	return ' &hellip;' . kioremoana_continue_reading_link();
}
add_filter( 'excerpt_more', 'kioremoana_auto_excerpt_more' );

/*-----------------------------------------------------------------------------------*/
/* Adds a pretty "Continue Reading" link to custom post excerpts.
/*
/* To override this link in a child theme, remove the filter and add your own
/* function tied to the get_the_excerpt filter hook.
/*-----------------------------------------------------------------------------------*/
function kioremoana_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= kioremoana_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'kioremoana_custom_excerpt_more' );

/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/
function kioremoana_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'kioremoana_remove_gallery_css' );


/**
 * Callback to change just html output on a comment.
 */
function kioremoana_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 115 ); ?>
			</div>
			<div class="comment-content">
				<ul class="comment-meta">
					<?php
						if (function_exists('gtcn_comment_numbering')) echo gtcn_comment_numbering($comment->comment_ID, $args);
					?>
					<li class="comment-author"><?php printf( __( ' %s ', 'kioremoana' ), sprintf( ' %s ', get_comment_author_link() ) ); ?></li>
					<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						/* translators: 1: date */
						printf( __( '%1$s', 'kioremoana' ),
						get_comment_date('d. F Y'));
					?></a></li>
					<li class="comment-edit"><?php edit_comment_link( __( 'Edit', 'kioremoana' ));?></li>
				</ul>
				<div class="comment-text">
					<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kioremoana' ); ?></p>
					<?php endif; ?>
					<p class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'kioremoana' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
				</div><!-- end .comment-text -->
			</div><!-- end .comment-content -->
		</article><!-- end .comment -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/
function kioremoana_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Widget Area', 'kioremoana' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widgets will appear in the Kiore Moana Info Page Template.', 'kioremoana' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Slogan Widget Area', 'kioremoana' ),
		'id' => 'sidebar-2',
		'description' => __( 'Widget area for the header slogan.', 'kioremoana' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
	) );

}
add_action( 'init', 'kioremoana_widgets_init' );

if ( ! function_exists( 'kioremoana_content_nav' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable
/*-----------------------------------------------------------------------------------*/
function kioremoana_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="clearfix">
				<div class="nav-previous"><?php next_posts_link( __( '<span>&larr; Older</span>', 'kioremoana'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span>Newer &rarr;</span>', 'kioremoana' ) ); ?></div>
			</nav><!-- end #nav-below -->
	<?php endif;
}

endif; // kioremoana_content_nav

/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function kioremoana_body_class( $classes ) {

	if ( is_page_template( 'page-templates/page-archive.php' ) )
		$classes[] = 'template-archive';

	if ( is_page_template( 'page-templates/page-info.php' ) )
		$classes[] = 'template-info';

	return $classes;
}
add_filter( 'body_class', 'kioremoana_body_class' );

/*-----------------------------------------------------------------------------------*/
/* Add Shortcodes.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/shortcodes.php';

/*-----------------------------------------------------------------------------------*/
/* Add One Click Demo Import code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';
