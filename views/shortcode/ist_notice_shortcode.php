<?php
/**
 *
 * @file ist_notice_shortcode.php IST notices will be rendered here.
 *
 * */

// Security check
if(!defined('ABSPATH')) die();
global $ist;
$notices = get_posts(
	array(
		'post_type' => 'ist_notice',
		'post_status' => 'publish',
	)
);

wp_enqueue_style( $ist->prefix . '_' . 'frontend_style', $ist->plugin_base_url . 'css/style.css');
?>
<div class='<?php echo $ist->prefix;?>_notice_wrapper'>
<h2>Notices</h2>
<?php foreach($notices as $notice){ ?>
<div class='<?php echo $ist->prefix;?>_notice_block'>
	<h3><?= $notice->post_title ?></h3>
	<p><?= $notice->post_content ?></p>
</div>
<?php } ?>
</div>
