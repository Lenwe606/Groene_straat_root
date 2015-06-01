<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Mokka
 * @since Mokka 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
global $fave_option;

?>
<div class="comments-wrapper">
	
    <?php if ( have_comments() ) : ?>
	<div class="comments-title-wrapper text-center">
		
        <?php
			printf( _n( __('1 Discussion on &ldquo;%2$s&rdquo;', 'favethemes'), __('<span>%1$s Discussions on</span><br> &ldquo;%2$s&rdquo;', 'favethemes'), get_comments_number(), 'favethemes' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</div>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'favethemes' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'favethemes' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'favethemes' ) ); ?></div>
    </nav><!-- #comment-nav-above -->
    <?php endif; // Check for comment navigation. ?>
	
	
	<div class="comments">
        <ul class="media-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size'=> 100,
                ) );
            ?>
        </ul><!-- .comment-list -->
    </div>
	<?php endif; ?>
	<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title"></h3>
		
        <?php
			//Custom Fields
			$fields =  array(
				'author'=> '<div class="row"><div class="form-group col-lg-4 col-md-4 col-sm-12">
								<input name="author" id="author" value="" placeholder="'.__('Name', 'favethemes' ).'" type="text" class="form-control">
							</div>',
				
				'email' => '<div class="form-group col-lg-4 col-md-4 col-sm-12">
								<input type="text" name="email" id="email" class="form-control" placeholder="'.__('Email', 'favethemes' ).'">
							</div>',
				
				'url' 	=> '<div class="form-group col-lg-4 col-md-4 col-sm-12">
								<input class="form-control"  name="url" id="url" placeholder="'.__('Website', 'favethemes' ).'" type="text">
							</div></div>',
			);
	
			//Comment Form Args
			$comments_args = array(
				'fields' => $fields,
				'title_reply'=>'<h2 class="title"><span>'. __('Leave A Comment', 'favethemes') .'</span></h2>',
				'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'favethemes' ). '</p>',
				'comment_notes_after' => '',
				'comment_field' => '<div class="row"><div class="form-group col-lg-12 col-md-12 col-sm-12"><textarea class="form-control" name="comment" id="comment"></textarea></div></div>',
				'label_submit' => __('Post Comment', 'favethemes' )
			);
			
			// Show Comment Form
			comment_form($comments_args); 
		?>
        
	</div><!-- .comment-respond -->
</div><!-- .post-author -->


