<?php
/**
 *
 * @file ist_notice_shortcode.php IST notices will be rendered here.
 *
 * */

// Security check
if(!defined('ABSPATH')) die();
global $ist;
$news = get_posts(
	array(
		'post_type' => 'ist_news',
		'post_status' => 'publish',
	)
);
?>
<div class='<?php echo $ist->prefix;?>_news_wrapper'>
<h2>News</h2>
<?php foreach($news as $new){ ?>
<div class='<?php echo $ist->prefix;?>_news_block'>
	<h3><?= $new->post_title ?></h3>
	<p><?= $new->post_content ?></p>
</div>
<?php } ?>
</div>
