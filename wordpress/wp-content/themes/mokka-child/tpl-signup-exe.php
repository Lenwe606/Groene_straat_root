<?php 
/**
 * Template Name: Signup Exe
 *
 * @package -
 * @since 	- 1.0
**/ 
?>
<?php
$runaction = '';
if (isset($_POST['runaction']) or isset($_GET['runaction'])) {
	$runaction = trim ((!empty($_POST['runaction'])) ? $_POST['runaction'] : $_GET['runaction'] );
	$runaction = strip_tags($runaction);
} else {
	wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
	exit();
}

switch ($runaction) {

	case 'user_subscribe':
	
		$alerts[] = array();
		unset($alerts);
		$errorflag = 0;

/*
		if ( empty($_POST) || (!strcasecmp($_POST['_wp_http_referer'], _x('/kortrijk/doe-mee/', 'sub', 'favethemes')) == 0) ) {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}
*/

		if ( empty($_POST) || !wp_verify_nonce($_POST['_nonce'],'subscribe-nonce') ) {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}

		$alerts[] = array();
		unset($alerts);
		$errorflag = 0;	

		$javacheck = '';
		if (isset($_POST['javacheck']) or isset($_GET['javacheck'])) {
			$javacheck = trim ((!empty($_POST['javacheck'])) ? $_POST['javacheck'] : $_GET['javacheck'] );
			$javacheck = strip_tags($javacheck);
		} else {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}
		$javacheck = (int) $javacheck;

		if ($javacheck == 0) {
			$alerts[] = '<span class="sub-alert sub-fail">' . _x('JavaScript is uitgeschakeld in je web browser. Activeer Javascript om deze pagina te gebruiken.', 'sub', 'favethemes') . '</span>';
			if (!empty($alerts)) {
				if(!isset($_SESSION)) { session_start(); }
			}
			if (!empty($alerts)) {
				$_SESSION['alerts'] = serialize($alerts);
			}
			$next_url = home_url(_x('', 'sub', 'favethemes'), 'http');
			$redirect_to = wp_sanitize_redirect($next_url);
			wp_safe_redirect($redirect_to);
			die();
		}

		$user_email = '';
		if (isset($_POST['user_email']) or isset($_GET['user_email'])) {
			$user_email = trim ((!empty($_POST['user_email'])) ? $_POST['user_email'] : $_GET['user_email'] );
			$user_email = strip_tags($user_email);
		} else {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}

		if ( (strlen($user_email) == 0) || (strlen($user_email) > 100) ) {
			$alerts[] = '<span class="sub-fail sub-alert-inline sub-mail">' . __('Vul je e-mail adres in : max. 100 tekens', 'sub', 'favethemes') . '</span>';
			$errorflag = 1;
		}

		// http://php.net/manual/en/function.filter-var.php
		$user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);
		$user_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);

		$user_firstname = '';
		if (isset($_POST['user_firstname']) or isset($_GET['user_firstname'])) {
			$user_firstname = trim ((!empty($_POST['user_firstname'])) ? $_POST['user_firstname'] : $_GET['user_firstname'] );
			$user_firstname = strip_tags($user_firstname);
		} else {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}

		if ( (strlen($user_firstname) == 0) || (strlen($user_firstname) > 30) ) {
			$alerts[] = '<span class="sub-fail sub-alert-inline">' . __('Vul je voornaam in : max. 30 tekens', 'sub', 'favethemes') . '</span>';
			$errorflag = 1;
		}

		$user_lastname = '';
		if (isset($_POST['user_lastname']) or isset($_GET['user_lastname'])) {
			$user_lastname = trim ((!empty($_POST['user_lastname'])) ? $_POST['user_lastname'] : $_GET['user_lastname'] );
			$user_lastname = strip_tags($user_lastname);
		} else {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}

		if ( (strlen($user_lastname) == 0) || (strlen($user_lastname) > 100) ) {
			$alerts[] = '<span class="sub-fail sub-alert-inline">' . __('Vul je familienaam in : max. 100 tekens', 'sub', 'favethemes') . '</span>';
			$errorflag = 1;
		}

		$captcha_code = '';
		if (isset($_POST['captcha_code']) or isset($_GET['captcha_code'])) {
			$captcha_code = trim ((!empty($_POST['captcha_code'])) ? $_POST['captcha_code'] : $_GET['captcha_code'] );
			$captcha_code = strip_tags($captcha_code);
		} else {
			wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
			exit();
		}

		if ( (strlen($captcha_code) == 0) || (strlen($captcha_code) > 30) ) {
			$alerts[] = '<span class="sub-fail sub-alert-inline">' . __('Vul de controletekens in : max. 30 tekens', 'sub', 'favethemes') . '</span>';
			$errorflag = 1;
		}

		include_once 'securimage/securimage.php';
		$securimage = new Securimage();
		if ($securimage->check($captcha_code) == false) {
			$alerts[] = '<span class="sub-alert sub-fail">' . _x('De controletekens zijn fout, probeer het opnieuw : type de letters en cijfers in de afbeelding', 'sub', 'favethemes') . '</span>';
			$errorflag = 1;
		}

		/* Check if checkbox is in $_POST */
		if (!(array_key_exists("user_terms", $_POST)))
		{
			/* Means checkbox is unchecked */
			$user_terms = 0;
		}
		else
		{
			if (!strcasecmp($_POST['user_terms'], "yes"))
			{
				$user_terms = 1;
			}
			else
			{
				$user_terms = 0;
			};
		};

		if ($user_terms == 0) { 
			$alerts[] = '<span class="sub-alert sub-fail">' . _x('Gelieve akkoord te gaan met de gebruiksvoorwaarden', 'sub', 'favethemes') . '</span>';
			$errorflag = 1;
		}

		if ($errorflag == 0) {
			// Send mail
			$mailto = $user_email;
			/*
			$multiple_to_recipients = array(
   				$invite_email,
   				$sender_first_name . ' ' . $sender_last_name . ' <' . $sender_email . '>'
			);
			*/

			// Next line gets overridden by MailJet plugin
			$mailfrom = "From: groenestraat.be <info@groenestraat.be>\r\n"; // Use double quotes

			$mailcc = "Cc: groenestraat.be <" . _x('info@groenestraat.be', 'sub', 'favethemes') . ">\r\n"; // Use double quotes

			$mailreplyto = '';

			$mailsubject = html_entity_decode(_x('Je registratie op groenestraat.be !', 'sub', 'favethemes'), ENT_QUOTES | ENT_HTML5, 'UTF-8');

			$mailbody = '';
			$mailbody .= '<HTML><HEAD>';
/*
			$mailbody .= '<style type="text/css"> 
			body {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 13px;
			}
			a {
			color: #497670;
			text-decoration: none;
			}
			a:hover {
			color: #962E34;
			text-decoration: none;
			}
			strong {
			color: #914c19;
			}
			</style>';
*/
			$mailbody .= '</HEAD><BODY>';
			// $mailbody .= '<div style="width: 100%;"><div style="width: 85%; margin: 20px auto; padding: 10px; background-color:#fff; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;" >';
			$mailbody .= _x('T.a.v. ', 'sub', 'favethemes') . ($user_firstname . ' ' . $user_lastname);
			$mailbody .= '<br /><br />' . _x('Welkom', 'sub', 'favethemes') . ' ' . $user_firstname . ',';
			$mailbody .= '<br /><br />' . _x('Je registreert met volgende gegevens :', 'sub', 'favethemes');
			$mailbody .= '<br /><br />' . _x('Voornaam', 'sub', 'favethemes') . ' : ' . $user_firstname;
			$mailbody .= '<br />' . _x('Familienaam', 'sub', 'favethemes') . ' : ' . $user_lastname;
			$mailbody .= '<br />' . _x('E-mail', 'sub', 'favethemes') . ' : ' . $user_email;
			$mailbody .= '<br />[X]&nbsp;' . _x('Je gaat akkoord met de gebruiksvoorwaarden van deze website :', 'sub', 'favethemes') . ' ' . home_url(_x('/gebruiksvoorwaarden/', 'sub', 'favethemes'),'http');

			$mailbody .= '<br /><br />' . _x('groenestraat.be respecteert je persoonlijke levenssfeer : lees ons privacybeleid op', 'sub', 'favethemes') . ' ' . home_url(_x('/gebruiksvoorwaarden/', 'sub', 'favethemes'),'http');
			$mailbody .= "<br /><br />" . _x('Wens je hulp ? Je kan op deze mail rechtstreeks antwoorden. Je vindt onze volledige contactinformatie op de website', 'sub', 'favethemes') . '&nbsp;' . home_url('contact/', 'http');

			// $mailbody .= '</div></div>';
			$mailbody .= '</BODY></HTML>';
			$mailbody = wordwrap($mailbody, 70);
			
			$mailheaders = $mailfrom . $mailreplyto . $mailcc; // Use double quotes
			add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
			add_filter( 'wp_mail_from', function($name){
				return 'info@groenestraat.be';
			});
			add_filter( 'wp_mail_from_name', function($name){
				return 'groenestraat.be';
			});
			if (wp_mail($mailto, $mailsubject, $mailbody, $mailheaders) == TRUE) {
				$alerts[] = '<span class="sub-alert sub-success">' . _x('Welkom ! Je ontvangt een bevestiging via e-mail. Voeg het adres info@groenestraat.be toe aan je lijst van vertrouwde contactpersonen : zo vermijd je dat onze e-mail bij je ongewenste mails terecht komt.', 'sub', 'favethemes') . '</span>';
			} else {
				$alerts[] = '<span class="sub-alert sub-fail">' . _x('Je registratie werd niet uitgevoerd. Contacteer de systeembeheerder via info@groenestraat.be', 'sub', 'favethemes') . '</span>';
				$errorflag = 1;
			}
		}

		if(!isset($_SESSION)) { session_start(); }

		if ($errorflag == 1) {
			// Feed form data back into form
			$post_vars = array();
			unset($post_vars);
			$post_vars['user_firstname'] = $user_firstname;
			$post_vars['user_lastname'] = $user_lastname;
			$post_vars['user_username'] = $user_username;
			$post_vars['user_email'] = $user_email;
			$post_vars['user_notes'] = $user_notes;
			$post_vars['user_terms'] = $user_terms;
			$post_vars['_nonce'] = wp_create_nonce('subscribe-nonce');
			$_SESSION['post_vars'] = serialize($post_vars);
		}

		if (!empty($alerts)) {
			$_SESSION['alerts'] = serialize($alerts);
		}

		$next_url = home_url(_x('/doe-mee/', 'sub', 'favethemes'), 'http');
		$redirect_to = wp_sanitize_redirect($next_url);
		wp_safe_redirect($redirect_to);
		die();

	break;

	default:
		wp_die(_x('De gevraagde actie is geweigerd om veiligheidsredenen', 'sub', 'favethemes'));
		exit();

	break;

} // switch ($runaction)
?>