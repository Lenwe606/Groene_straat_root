<?php
/**
 * Google Fonts
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
$ft_customfont = '';

if(!empty($fave_option['google_body'])){

	$google_fonts = array( $fave_option['google_body'], $fave_option['google_font_titles'], $fave_option['google_main_nav'], $fave_option['google_secondary_nav'] );
	
	foreach( $google_fonts as $google_font ) {
		if( !is_array( $google_font ) ) {
	
			$ft_customfont = str_replace( ' ', '+', $google_font ) . ':100italic,300italic,400italic,600italic,700italic,800italic,100,400,300,600,700,800|' . $ft_customfont;
		}
	}	
}

if ( $ft_customfont != "" ) {
	function google_font() {
		global $ft_customfont;
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'google-fonts', "$protocol://fonts.googleapis.com/css?subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese&family=". substr_replace( $ft_customfont,"",-1 ) . " rel='stylesheet' type='text/css" );
	}
	add_action( 'wp_enqueue_scripts', 'google_font', 15 );
}
?>