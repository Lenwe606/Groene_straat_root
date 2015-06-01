<?php
/**
 * The default template for displaying content video
 *
 * @package Mokka
 * @since Mokka 1.0
 */
?>
<!-- ============= Video post format ============= -->

<?php
// Output the video by page url
if ( get_field( 'add_video' ) ):?>
<div class="video-wrapper">
	<?php
		$video_embed = wp_oembed_get( get_field( 'add_video' ) );
		echo $video_embed;
	?>
</div>
<?php endif; ?>
