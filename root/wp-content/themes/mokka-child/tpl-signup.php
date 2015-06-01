<?php 
/**
 * Template Name: Signup
 *
 * @package -
 * @since 	- 1.0
**/ 
global $fave_option;
?>
<?php
$alerts = array();
if(!isset($_SESSION)) { session_start(); }
if( isset( $_SESSION['alerts'] ) ) {
	$alerts = unserialize($_SESSION['alerts']);
	unset( $_SESSION['alerts'] );
}
if (!empty($alerts)) {
	foreach($alerts as $alert) {
		echo "<p>" . $alert . "</p>";
	}
	$alerts=array(); // Clear but keep alive
}

// Retrieve form data
if( isset( $_SESSION['post_vars'] ) ) {
	$reload = true;
	$post_vars = unserialize($_SESSION['post_vars']);
	unset( $_SESSION['post_vars'] );
}
?>
<?php get_header(); ?>
	
<div class="container home-container">
	<div class="signup-form favethemes-fadin animated">

		<div id="subscribe-block">
			<form name="subscribe-site" id="subscribe-site" method="post" action="<?php 
				$next_url = home_url(_x('/signup-exe/', 'sub', 'favethemes'), 'http');
				echo esc_url( $next_url ); ?>" >
				<input type="hidden" id="javacheck" name="javacheck" value="0" />
				<input type="hidden" name="runaction" value="user_subscribe" />
				<?php wp_nonce_field('subscribe-nonce', '_nonce', true, true); ?>
				<?php wp_referer_field( true ) ?>

				<table>

				<thead>
				</thead>

				<tbody>

				<tr>
				<th>
					<span class="sub-dashicons dashicons-admin-users"></span><label for="user_firstname"><?php _ex('Voornaam', 'sub', 'favethemes'); ?>&nbsp;(*)</label>
				</th>
				<td>
					<input type="text" class="input-l" name="user_firstname" id="user_firstname" value="<?php echo ($reload == true) ? $post_vars['user_firstname'] : ''; ?>"  />

				</td>
				</tr>

				<tr>
				<th>
					<span class="sub-dashicons dashicons-admin-users"></span><label for="user_lastname"><?php _ex('Familienaam', 'sub', 'favethemes'); ?>&nbsp;(*)</label>
				</th>
				<td>
					<input type="text" class="input-xl" name="user_lastname" id="user_lastname" value="<?php echo ($reload == true) ? $post_vars['user_lastname'] : ''; ?>"  />
				</td>
				</tr>

				<tr>
				<th>
					<span class="sub-dashicons dashicons-email-alt"></span><label for="user_email"><?php _ex('E-mail', 'sub', 'favethemes'); ?>&nbsp;(*)</label>
				</th>
				<td>
					<input type="text" class="input-xl" name="user_email" id="user_email" value="<?php echo ($reload == true) ? $post_vars['user_email'] : ''; ?>" />
				</td>
				</tr>

				<tr>
				<th>
					<span class="sub-dashicons dashicons-edit"></span><label for="user_captcha"><?php _ex('Controletekens', 'sub', 'favethemes'); ?>&nbsp;(*)</label>
				</th>
				<td>
				<?php
				require_once 'securimage/securimage.php';
				$options = array();
				$options['input_id'] = 'captcha_code';
				$options['input_name'] = 'captcha_code';
				$options['show_audio_button'] = false;
				$options['image_attributes'] = array('border: 0');
				$options['refresh_alt_text'] = _x('Andere afbeelding tonen', 'sub', 'favethemes');
				$options['refresh_title_text'] = _x('Andere afbeelding tonen', 'sub', 'favethemes');
				$options['input_text'] = _x('Type de letters en cijfers in de afbeelding :', 'sub', 'favethemes');
				$options['image_alt_text'] = _x('Controle-afbeelding', 'sub', 'favethemes');
				echo Securimage::getCaptchaHtml($options);
				?>
				</td>
				</tr>

				<tr>
				<td colspan="2">
					<span class="mandatoryfield">(*) <?php _ex('Verplicht veld', 'sub', 'favethemes'); ?></span>
					<br /><?php _ex('Je informatie wordt niet aan derden doorgegeven.', 'sub', 'favethemes'); ?>
				</td>
				</tr>
		
				</tbody>

				<tfoot>
				<tr>
				<td colspan="2">
					<span class="sub-dashicons dashicons-editor-spellcheck"></span><input type="checkbox" name="user_terms" id="user_terms" value="yes" <?php echo ( $reload == true && $post_vars['user_terms'] == '1') ? 'checked="checked"' : ''; ?> class="regular-text" />
					<label for="user_terms"><?php echo _x('Ik ga akkoord met de', 'sub', 'favethemes') . ' <a href="' . home_url(_x('/gebruiksvoorwaarden/', 'sub', 'favethemes')) . '" target="_blank">' . _x('Gebruiksvoorwaarden', 'sub', 'favethemes') . '</a> ' . _x('van deze website.', 'sub', 'favethemes') ; ?></label>
				</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="submit" id="submit-subscribe_site" name="submit-subscribe_site" class="sub-submit-button" value="<?php _ex('Hou me op de hoogte !', 'sub', 'favethemes'); ?>" />
				</td>
				</tr>
				</tfoot>

				</table>

			</form>

		</div>
	</div>
</div>
	
<?php get_footer(); ?>