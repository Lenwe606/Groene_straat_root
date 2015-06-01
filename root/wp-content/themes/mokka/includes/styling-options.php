<?php
/**
 * Theme Stylesheet Options
 * Refer to Theme Options
 * @package Mokka
 * @since 	Mokka 1.0
**/

function custom_styling(){

global $fave_option;?>

<style type="text/css">

/*==========================================================
= Fonts Family 
===========================================================*/
/* Body */
<?php
if($fave_option['google_body'] != '0') {
	$body_font = '"'.$fave_option['google_body'].'", sans-serif';
} elseif($fave_option['standard_body'] != '0') {
	$body_font = $fave_option['standard_body'];
}
?>
body, .widget-title  {
 font-family: <?php echo $body_font; ?>;
}

/* Titles and headings */
<?php
if($fave_option['google_font_titles'] != '0') {
	$headings_font = '"'.$fave_option['google_font_titles'].'", serif';
} elseif($fave_option['standard_font_titles'] != '0') {
	$headings_font = $fave_option['standard_font_titles'];
}
?>
h1, h2, h3, h4, h5, h6, .continue-reading, blockquote, .quote-wrapper > blockquote h2, .link-wrapper, .dropdown-post-title, .sub-links, .tag-line, .copyright-wrapper, .post-tags, .comments-title-wrapper p, .fn, .comment-metadata, .comments-title-wrapper, .nav-sub-posts a, .nav-sub-menus a {
 font-family: <?php echo $headings_font; ?>;
}

/* primary-nav / Main nav */
<?php
if($fave_option['google_main_nav'] != '0') {
	$primary_nav = '"'.$fave_option['google_main_nav'].'", sans-serif';
} elseif($fave_option['standard_main_nav'] != '0') {
	$primary_nav = $fave_option['standard_main_nav'];
}
?>
.primary-nav {
 font-family: <?php echo $primary_nav; ?>;
}
<?php
	$main_menu = $fave_option['main_menu_font_size_style'];
?>
.primary-nav ul li {
 font-size: <?php echo $main_menu['size']; ?>;
 font-weight:<?php echo $main_menu['style']; ?>;
}

/* secondary-nav */
<?php
if($fave_option['google_secondary_nav'] != '0') {
	$secondary_nav = '"'.$fave_option['google_secondary_nav'].'", sans-serif';
} elseif($fave_option['standard_secondary_nav'] != '0') {
	$secondary_nav = $fave_option['standard_secondary_nav'];
}
?>

.secondary-nav, #pageslide li .nav-sub-wrap a {
 font-family: <?php echo $secondary_nav; ?>;
}
.secondary-nav ul li{
 font-size: <?php echo $fave_option['top_menu_font_size_style']['size']; ?>;
 font-weight: <?php echo $fave_option['top_menu_font_size_style']['style']; ?>;
}



/* =============================================
Colors
============================================= */
<?php $main_site_color = $fave_option['main_site_color'];?>

a, .post-title a:hover, .continue-reading:hover, .post-meta a:hover, .quote-wrapper a:hover, .widget a:hover, .widget .continue-reading, .continue-reading, .latest-tweet-widget a, .link-wrapper a:hover, .primary-nav a.continue-reading, .primary-nav a:hover, .footer .latest-tweet-widget a, .single-post .post-tags a:hover, .post-author-wrapper .nav-social a:hover, .comment-reply-link:hover, .post-author-wrapper h4 a:hover {
	color: <?php echo $main_site_color; ?>; /* Option color */
}
.widget a.carousel-prev:hover, .widget a.carousel-next:hover, .post a.carousel-prev:hover, .post a.carousel-next:hover, .secondary-nav .dropdown-menu>li>a:hover, .image-post-menu:hover, .featured-image a:hover, .gallery-icon a:hover, .colored-bg:hover, .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus, .share-wrapper ul li a:hover, #submit, .justified-gallery a:hover, .gallery-item a:hover, .pagination .current, #today {
	background: <?php echo $main_site_color; ?>; /* Option color */
}
div.jp-play-bar, div.jp-volume-bar-value, .primary-nav .nav-sub-wrap .nav-sub-posts .thumb-wrap, .dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus {
	background-color: <?php echo $main_site_color; ?>;
}
.pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus, .share-wrapper ul li a:hover, .pagination .current {
	border: 1px solid <?php echo $main_site_color; ?>; /* Option color */
}


/*==========================================================
= Custom CSS 
===========================================================*/
<?php if ( $fave_option['custom_css'] != '' ):?>
<?php echo $fave_option['custom_css'];?> 
<?php endif; ?>

</style>

<?php } ?>
<?php add_action( 'wp_head', 'custom_styling' );?>