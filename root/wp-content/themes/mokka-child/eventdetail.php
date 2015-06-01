<?php include_once("/php/include.inc.php"); ?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Groene Straat</title>
	<link href="css/layout.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
	<div id="content">
		<?php
		if(!empty($_GET["id"])){
			$detail = get_detail_event(($_GET["id"]));
		}
		?>
		<h1 class="overview_title"><?php echo $detail[0][0][1]; ?></h1>
		<section class="info">
			<h2 class="section_name"><?php echo $detail_general; ?></h2>
			<p class="item_name"><?php echo $detail_owner; ?></p>
			<p class="item_value"><?php echo $detail[0][0][2]; ?></p>
			<p class="item_name"><?php echo $detail_start_date; ?></p>
			<p class="item_name"><?php echo $detail[0][0][3]; ?></p>
			<p class="item_name"><?php echo $detail_end_date; ?></p>
			<p class="item_name"><?php echo $detail[0][0][4]; ?></p>
			<p class="item_name"><?php echo $detail_start_time; ?></p>
			<p class="item_name"><?php echo $detail[0][0][5]; ?></p>
			<p class="item_name"><?php echo $detail_location; ?></p>
			<p class="item_name"><?php echo $detail[0][0][6]; ?></p>
			<p class="item_name"><?php echo $detail_linked; ?></p>
			<p class="item_name"></p>
			<p class="item_name"><?php echo $detail_category; ?></p>
			<p class="item_name"><?php echo $detail[0][0][7]; ?></p>
			<p class="item_name"><?php echo $detail_website; ?></p>
			<p class="item_name"><?php echo $detail[0][0][8]; ?></p>
			<p class="item_name"><?php echo $detail_description; ?></p>
			<p class="item_name"><?php echo $detail[0][0][9]; ?></p>
		</section>

		<section class="buttons">
			<?php if($project_owner) {?>
				<a href="./index.php?page=newevent&id=<?php echo $_GET["id"]; ?>"><button value="<?php echo $detail_edit; ?>"><?php echo $detail_edit; ?></button></a>
				<button value="<?php echo $detail_delete; ?>"><?php echo $detail_delete; ?></button>
			<?php } else { ?>
				<button value="<?php echo $detail_register; ?>"><.php echo $detail_register; ?></button>
			<?php } ?>
		</section>

		<section class="images">
			<h2 class="section_name"><?php echo $detail_images; ?></h2>
			<?php echo fotos($detail[1]); ?>

		</section>

		<section class="members">
			<h2 class="section_name"><?php echo $detail_members; ?></h2>
			<ul><?php print_r($detail[2]);echo members($detail[2]); ?></ul>
		</section>
		
		<section class="comments">
			<ul><?php echo comments_limited($detail[3], $detail_max_shown_comments); ?></ul>

			<?php
			if(count($detail[3]) > $detail_max_shown_comments) {
				?>
				<p class="more_items"><a href=""><?php echo $detail_more_comment; ?></a></p>
			<?php
			}
			?>
		</section>

		<section class="comment">
			<form method="post">
				<p><?php echo $detail_place_comment; ?></p>
				<<textarea></textarea>
				<input type="submit" value="<?php echo $detail_place_comment_button; ?>"/>
			</form>
		</section>

	</div>
</div>
</body>
</html>