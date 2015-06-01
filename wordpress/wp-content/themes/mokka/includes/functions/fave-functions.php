<?php

/* ==========================================================================

	fave Front End Function

    - General Functions - by Waqas Riaz

 ===========================================================================*/

/* --------------------------------------------------------------------------
* [ fave_navigation - Init Theme Navigation]
---------------------------------------------------------------------------*/
global $fave_option;

if ( !function_exists('fave_navigation') ) {

	function fave_navigation($nav_position, $opt = '') {

		if(has_nav_menu($nav_position)) {
			if ($nav_position == 'main_menu' && $opt == 'mega-menu') {
				wp_nav_menu(array(
					'theme_location' => $nav_position,
					'container' => '',
					'menu_class' => 'navbar-nav',
					'fallback_cb' => '',
					'walker' => new Mokka_Mega_Menu()
				));
			} else {
				// Others Navigation
				wp_nav_menu(array(
					'theme_location' => $nav_position,
					'container' => '',
					'menu_class' => 'page-nav nav nav-pills navbar-left hidden-sm hidden-xs',
					'fallback_cb' => '',
					'walker' => new Mokka_Secondary_Nav()
				));
			}
		} else {
			echo '<div class="navbar-left no-margin message warning"><i class="fa fa-exclamation-triangle"></i>' . __( ' No Menu Assigned', 'favethemes' ) . '</div>';
		}
	}
}


/* --------------------------------------------------------------------------
 * [ fave_featured_url - Featured Image URL]
 ---------------------------------------------------------------------------*/
if ( !function_exists('fave_featured_url') ) {

	function fave_featured_url( $post_id, $size ) {
		
		if (has_post_thumbnail( $post_id ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
			return $image[0];
		endif;
	}
}

/* --------------------------------------------------------------------------
 * [ fave_attachment_url - Attachment URL]
 ---------------------------------------------------------------------------*/
if ( !function_exists('fave_attachment_url') ) {

	function fave_attachment_url( $attc_id, $size ) {
		
		$image = wp_get_attachment_image_src( $attc_id, $size );
		return $image[0];
	}
}

/* --------------------------------------------------------------------------
 * [ fave_first_post_image - First Post Image]
 ---------------------------------------------------------------------------*/
if ( !function_exists('fave_first_post_image') ) {

	function fave_first_post_image() {
		
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		if( preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches ) ){
			$first_img = $matches[1][0];
			return $first_img;
		}
	}
}

/* --------------------------------------------------------------------------
 * [ fave_avatar_url - Get author avatar Url ]
 ---------------------------------------------------------------------------*/
function fave_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

/* --------------------------------------------------------------------------
 * [ fave_element_key - Generate Unique ID each elemement ]
 ---------------------------------------------------------------------------*/
if ( !function_exists('fave_element_key') ) {

	function fave_element_key(){

	    $key = uniqid();
	    return $key;
	}
}

/* --------------------------------------------------------------------------
 * [ fave_composer_posts_icons - ]
 ---------------------------------------------------------------------------*/
if ( !function_exists('fave_composer_posts_icons') ) {

	function fave_composer_posts_icons(){

		if( 'video' == get_post_format() ){ 
			echo '<i class="icon icon-multimedia-23 icon-x2"></i>';
		}elseif('audio' == get_post_format()){
			echo '<i class="icon icon-multimedia-11 icon-x2"></i>';
		}elseif('gallery' == get_post_format()){
			echo '<i class="icon icon-office-31 icon-x2"></i>';
		}elseif('link' == get_post_format()){
			echo '<i class="icon icon-office-09 icon-x2"></i>';
		}elseif('quote' == get_post_format()){
			echo '<i class="icon icon-office-41 icon-x2"></i>';
		}else{
			echo '<i class="icon icon-office-56 icon-x2"></i>';
		}
	}
}

/* --------------------------------------------------------------------------
 * [ fave_author_info - Adds user custom fields ]
 ---------------------------------------------------------------------------*/
if ( ! function_exists( 'fave_author_info' ) ) {
	function fave_author_info( $contactmethods ) {
		
		$contactmethods['fave_author_facebook']		= __( 'Facebook', 'favethemes' );
		$contactmethods['fave_author_linkedin']		= __( 'LinkedIn', 'favethemes' );
		$contactmethods['fave_author_twitter']		= __( 'Twitter', 'favethemes' );
		$contactmethods['fave_author_google_plus']	= __( 'Google Plus', 'favethemes' );
		$contactmethods['fave_author_youtube']		= __( 'Youtube', 'favethemes' );
		$contactmethods['fave_author_flickr']		= __( 'Flickr', 'favethemes' );
		$contactmethods['fave_author_pinterest']	= __( 'Pinterest', 'favethemes' );
		$contactmethods['fave_author_foursquare']	= __( 'FourSquare', 'favethemes' );
		$contactmethods['fave_author_instagram']	= __( 'Instagram', 'favethemes' );
		$contactmethods['fave_author_vimeo']		= __( 'Vimeo', 'favethemes' );
		$contactmethods['fave_author_tumblr']		= __( 'Tumblr', 'favethemes' );
		$contactmethods['fave_author_dribbble']		= __( 'Dribbble', 'favethemes' );
			
		return $contactmethods;
	}
}
add_filter( 'user_contactmethods', 'fave_author_info', 10, 1 );


if( ! function_exists( 'fave_post_meta' ) ){
	function fave_post_meta(){
	global $fave_option;
	?>
		
        <?php 
		if( 'video' == get_post_format() ){ 
        	echo '<li><i class="icon icon-multimedia-23 icon-x2"></i></li>';
		}elseif('audio' == get_post_format()){
			echo '<li><i class="icon icon-multimedia-11 icon-x2"></i></li>';
		}elseif('gallery' == get_post_format()){
			echo '<li><i class="icon icon-office-31 icon-x2"></i></li>';
		}elseif('link' == get_post_format()){
			echo '<li><i class="icon icon-office-09 icon-x2"></i></li>';
		}elseif('quote' == get_post_format()){
			echo '<li><i class="icon icon-office-41 icon-x2"></i></li>';
		}else{
			echo '<li><i class="icon icon-office-56 icon-x2"></i></li>';
		}
        ?>
        <?php if($fave_option['site_author_name']!= 0 ): ?>
        <li class="post-meta-author"><?php _e( 'by', 'favethemes' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a></li>
        <?php endif; ?>
        
        <?php if($fave_option['site_date']!= 0 ): ?>
        <li class="post-meta-date"><?php the_time(get_option('date_format')); ?></li>
        <?php endif; ?>
        
        <?php if($fave_option['site_categories']!= 0 ): ?>
        <li class="post-meta-category"><?php _e( 'in', 'favethemes' ); ?> <?php esc_attr( the_category(', ') ); ?></li>
        <?php endif; ?>
        
        <?php if($fave_option['site_tags']!= 0 ): ?>
		<?php if( has_tag() ): ?>
        <li class="post-meta-tag"><?php _e( 'tags', 'favethemes' ); ?> <?php the_tags( '', ', ', '' ); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        
        <?php if($fave_option['site_comment']!= 0 ): ?>
        <li><?php comments_number( '0', '1', '%' ); ?> <i class="icon icon-chat-messages-03"></i></li>
        <?php endif; ?>
			
<?php	
	}
}

if( ! function_exists( 'fave_post_meta_for_composer' ) ){
	function fave_post_meta_for_composer(){
	global $fave_option;
	?>
		
        <?php if($fave_option['site_author_name']!= 0 ): ?>
        <li class="post-meta-author"><?php _e( 'by', 'favethemes' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a></li>
        <?php endif; ?>
        
        <?php if($fave_option['site_date']!= 0 ): ?>
        <li class="post-meta-date"><?php the_time(get_option('date_format')); ?></li>
        <?php endif; ?>
        
        <?php if($fave_option['site_categories']!= 0 ): ?>
        <li class="post-meta-category"><?php _e( 'in', 'favethemes' ); ?> <?php esc_attr( the_category(', ') ); ?></li>
        <?php endif; ?>
        
        <?php if($fave_option['site_comment']!= 0 ): ?>
        <li><?php comments_number( '0', '1', '%' ); ?> <i class="icon icon-chat-messages-03"></i></li>
        <?php endif; ?>
			
<?php	
	}
}

if( ! function_exists( 'fave_single_post_meta' ) ){
	function fave_single_post_meta(){?>
		
        
        <li class="post-meta-author"><?php _e( 'by', 'favethemes' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a></li>
        <li class="post-meta-date"><?php the_time(get_option('date_format')); ?></li>
        <li class="post-meta-category"><?php _e( 'in', 'favethemes' ); ?> <?php esc_attr( the_category(', ') ); ?></li>
         
        <li><?php comments_number( '0', '1', '%' ); ?> <i class="icon icon-chat-messages-03"></i></li>
        <li><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
			
<?php	
	}
}

if( ! function_exists( 'fave_taxonomy' ) ){
	function fave_taxonomy($term){
		$terms = get_the_term_list( get_the_ID(), $term, '', ', ', '' ); 
		echo strip_tags( $terms );
	}
}

if( ! function_exists( 'fave_share' ) ){
	function fave_share(){ ?>
	
	<h3 class="share-title text-center"><?php _e('Share the post', 'favethemes' ); ?></h3>
	<ul class="list-inline text-center">
		<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" target="blank"><i class="icon icon-socialmedia-08"></i></a></li>
		<li><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>" target="_blank"><i class="icon icon-socialmedia-07"></i></a></li>

		<?php $pinimage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
        <li><a href="//pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php echo $pinimage[0]; ?>&amp;description=<?php the_title(); ?>" target="_blank"><i class="icon icon-socialmedia-04"></i></a></li>
        <li><a href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink() ?>" target="_blank"><i class="icon icon-socialmedia-16"></i></a></li>
		
	</ul>
	
	<?php
	}
}

if( ! function_exists( 'fave_post_author' ) ){
	function fave_post_author(){ ?> 
	
		<div class="media">
		  <a class="pull-left" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
		  	<?php echo get_avatar(get_the_author_meta( 'ID' ), 100); ?>
          </a>
		  <div class="media-body">
			<ul class="nav-social list-inline navbar-right">
				<?php 
					
					if(get_the_author_meta('fave_author_flickr')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_flickr').'"><i class="fa fa-flickr"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_pinterest')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_pinterest').'"><i class="fa fa-pinterest-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_youtube')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_youtube').'"><i class="fa fa-youtube-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_foursquare')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_foursquare').'"><i class="fa fa-foursquare"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_instagram')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_instagram').'"><i class="fa fa-instagram"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_twitter')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_twitter').'"><i class="fa fa-twitter-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_vimeo')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_vimeo').'"><i class="fa fa-vimeo-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_facebook')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_facebook').'"><i class="fa fa-facebook-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_google_plus')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_google_plus').'"><i class="fa fa-google-plus-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_linkedin')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_linkedin').'"><i class="fa fa-linkedin-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_tumblr')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_tumblr').'"><i class="fa fa-tumblr-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_dribbble')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_dribbble').'"><i class="fa fa-dribbble"></i></a></li>';
					}
					?>
			</ul><!-- .nav-social -->
			<h4 class="media-heading"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a></h4>
			<em class="author-tag-line"><?php esc_attr( the_author_meta( 'fave_author_tagline' )); ?></em>
			<p><?php esc_attr( the_author_meta( 'description' )); ?></p>
		  </div>
		</div>
	
	<?php
	}
}


if ( ! function_exists( 'fave_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Mokka 1.0
 *
 * @return void
 */
function fave_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '<i class="icon icon-arrows-03"></i>', 'favethemes' ),
		'next_text' => __( '<i class="icon icon-arrows-04"></i>', 'favethemes' ),
	) );

	if ( $links ) :

	?>
    
    <div class="pagination-wrapper">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2">
                <ul class="pagination">
                  <li><?php echo $links; ?></li>
                </ul>
            </div>
        </div>
    </div>
    
	<?php
	endif;
}
endif;


if ( ! function_exists( 'fave_paging_nav_2' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Mokka 1.0
 *
 * @return void
 */
function fave_paging_nav_2() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '<i class="icon icon-arrows-03"></i>', 'favethemes' ),
		'next_text' => __( '<i class="icon icon-arrows-04"></i>', 'favethemes' ),
	) );

	if ( $links ) :

	?>
    
    <div class="pagination-wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="pagination">
                  <li><?php echo $links; ?></li>
                </ul>
            </div>
        </div>
    </div>
    
	<?php
	endif;
}
endif;

if ( ! function_exists( 'fave_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Mokka 1.0
 *
 * @return void
 */
function fave_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
    <div class="pagination-wrapper">
 		<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="pagination post-pagination">
                <?php if ( is_attachment() ) : ?>
                        <li><?php previous_post_link( '%link', __( '<i class="icon icon-arrows-02"></i>', 'favethemes' ) ); ?></li>
                <?php else : ?>
                        <li><?php previous_post_link( '%link', __( '<i class="icon icon-arrows-02"></i>', 'favethemes' ) ); ?></li>
                        <li><?php next_post_link( '%link', __( '<i class="icon icon-arrows-01"></i>', 'favethemes' ) ); ?></li>
                <?php endif; ?>
                </ul>
           </div>
        </div>
    </div><!-- .pagination-wrapper -->
   <?php
}
endif;


if ( ! function_exists( 'fave_taxonomy_strip' ) ) {
	function fave_taxonomy_strip($term){
		$terms = get_the_term_list( get_the_ID(), $term, '', ', ', '' ); 
		echo strip_tags( $terms );
	}
}

