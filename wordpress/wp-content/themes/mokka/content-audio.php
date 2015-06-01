<?php
/**
 * The default template for displaying content audio
 *
 * @package Mokka
 * @since Mokka 1.0
 */
?>
<!-- ============= Audio post format [SoundCloud] ============= -->
<?php if( get_field( 'select_option' ) == 'audio_url' ):?>

		<?php if ( get_field( 'add_audio_url' ) ):?>
        <div class="audio-wrapper soundcloud">
            <?php 
                $audio_embed = wp_oembed_get( get_field( 'add_audio_url' ) ); 
                echo $audio_embed;
            ?>
        </div>
        <?php endif; ?>
        
<?php elseif( get_field( 'select_option' ) == 'audio_embed_code' ):?>
		
        <?php if ( get_field( 'add_audio_embed_code' ) ):?>
        <div class="audio-wrapper soundcloud">
            <?php echo get_field( 'add_audio_embed_code' ); ?>
        </div>
        <?php endif; ?>
        
<?php elseif( get_field( 'select_option' ) == 'self_audio_url' ):?>

<?php
	$mokka_audio_title = get_field( 'self_audio_title' );
	$mokka_audio_artist = get_field( 'audio_artist' );
	$mokka_audio_format = get_field( 'audio_format' );
	$mokka_file = get_field( 'self_hosted_audio_url' );
	
?>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
				ready: function () {
					jQuery(this).jPlayer("setMedia", {
					title:"<?php echo $mokka_audio_title; ?>",
					artist:"<?php echo $mokka_audio_artist; ?>",
					free:true,
					<?php echo $mokka_audio_format; ?>: "<?php echo stripslashes(htmlspecialchars_decode($mokka_file)); ?>"
				});
				},
		swfPath: "<?php echo get_template_directory_uri(); ?>/flash",
				supplied: "mp3, wav, ogg, all",
				cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
		
				smoothPlayBar: true,
				keyEnabled: true
				
		});
		});
		</script>
        
        <?php if( has_post_thumbnail() ): ?>
        		<?php the_post_thumbnail("standard-large"); ?>
        <?php endif; ?>
        <!-- BEGIN audio -->
		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
		<div id="jp_container_<?php the_ID(); ?>" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui">
					<div class="jp-interface">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-current-time"></div>
						<div class="jp-title"><?php echo $mokka_audio_artist; ?> : <?php echo $mokka_audio_title; ?></div>
						
						<div class="jp-controls-holder">
							<ul class="jp-controls">
								<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span>Play</span></a></li>
								<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span>Pause</span></a></li>
							</ul>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
							
						</div>
					</div>
					<div class="jp-no-solution">
						<span>Update Required. </span>To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
				</div>
			</div>
		</div>
		<!-- END audio -->

<?php endif; ?>