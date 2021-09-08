<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id=main>
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset=<?php bloginfo( 'charset' ); ?>>
<meta name=viewport content="width=device-width, initial-scale=1">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>
<link rel=stylesheet href=<?php bloginfo( 'stylesheet_url' ); ?>>
<link rel=pingback href=<?php bloginfo( 'pingback_url' ); ?>>
<link rel=icon href=<?php bloginfo('stylesheet_directory'); ?>/favicon.ico>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id=page class=hfeed>
	<header id=branding>
		<?php
			// Check to see if the header image has been removed
			$header_image = get_header_image();
			$image_2x = preg_replace('/.png/', '@2x.png', $header_image);
			if ( ! empty( $header_image ) ) :
		?>
		<a href=<?php echo esc_url( home_url( '/' ) ); ?>>
			<?php
				// The header image
				// Check if this is a post or page, if it has a thumbnail, and if it's a big one
				if ( is_singular() &&
					has_post_thumbnail( $post->ID ) &&
					( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
					$image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
				else : ?>
				<img sizes="(max-width: calc(1000px+4em)) 100vw, 1000px" srcset="<?php header_image(); ?> 1000w, <?php echo esc_url( $image_2x ); ?> 2000w" src=<?php header_image(); ?> width=<?php echo HEADER_IMAGE_WIDTH; ?> height=<?php echo HEADER_IMAGE_HEIGHT; ?> alt="">
			<?php endif; // end check for featured image or standard header ?>
		</a>
		<?php endif; // end check for removed header image ?>

		<hgroup>
			<?php $name_pinked = preg_replace('/\./', '<span class=pink>.</span>', get_bloginfo( 'name' )); ?>
			<h1 id=site-title><span><a href=<?php echo esc_url( home_url( '/' ) ); ?> rel=home><?php echo $name_pinked; ?></a></span></h1>
			<h2 id=site-description><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id=access>
			<h3 class=assistive-text><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
			<div class=skip-link><a class=assistive-text href=#content title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
			<div class=skip-link><a class=assistive-text href=#secondary title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	</header><!-- #branding -->

	<main id=main>
