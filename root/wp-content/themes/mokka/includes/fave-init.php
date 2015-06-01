<?php
global $fave_option; 
/* --------------------------------------------------------------------------

	A FaveThemes Framework - Copyright (c) 2014

	@init - Widgets
	@init - Sidebars
	@init - Options
	@init - Custom Fields
	@init - Scripts
	@init - Functions
	@init - Widgets
	@init - Plugins

	- Waqas Riaz

 ---------------------------------------------------------------------------*/

/* --------------------------------------------------------------------------
 * [ @init - Widgets ]
 ---------------------------------------------------------------------------*/
require_once ( FAVE_PATH.'/includes/widgets/mokka-flickr-photos.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-instagram.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-most-viewed.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-latest-posts.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-latest-comments.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-featured.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-about-site.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-twitter.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-video.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-image-banner.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-code-banner.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-most-commented.php' );
require_once ( FAVE_PATH.'/includes/widgets/mokka-most-liked.php' );


/* --------------------------------------------------------------------------
 * [ @init - Sidebars ]
 ---------------------------------------------------------------------------*/
require_once ( FAVE_PATH.'/includes/sidebar.php' );


/* --------------------------------------------------------------------------
 * [ @init - Theme Options ]
 ---------------------------------------------------------------------------*/
require_once ( FAVE_PATH.'/admin/index.php' );


/* --------------------------------------------------------------------------
 * [ @init - Menu Walkers ]
 ---------------------------------------------------------------------------*/
require_once ( FAVE_PATH.'/includes/mokka-mega-menu.php' );
require_once ( FAVE_PATH.'/includes/secondary-walker.php' );


/* --------------------------------------------------------------------------
 * [ @init - Custom Fields ]
 ---------------------------------------------------------------------------*/
include_once( FAVE_PATH.'/includes/acf/acf.php' );
include_once( FAVE_PATH.'/includes/acf/acf-fields.php' );

if(!class_exists('TwitterOAuth',false)) {
	include (FAVE_PATH. '/includes/twitteroauth/twitteroauth.php');
}


/* --------------------------------------------------------------------------
 * [ @init - Scripts ]
 ---------------------------------------------------------------------------*/
 include_once( FAVE_PATH.'/includes/register-scripts.php' );

/* --------------------------------------------------------------------------
 * [@init - Plugins Required]
 ---------------------------------------------------------------------------*/
 include_once( FAVE_PATH.'/includes/class-tgm-plugin-activation.php' );
 include_once( FAVE_PATH.'/includes/register-plugins.php' );
 
 /* --------------------------------------------------------------------------
 * [@init - functions ]
 ---------------------------------------------------------------------------*/
include_once( FAVE_PATH.'/includes/styling-options.php' );
include_once( FAVE_PATH.'/includes/google-fonts.php' );

 
include_once( FAVE_PATH.'/includes/fave-views.php' ); 
include_once( FAVE_PATH.'/includes/functions/fave-functions.php' );