<?php
/**
 *
 * @file ist_notice_shortcode.php IST notices will be rendered here.
 *
 * */

// Security check
if(!defined('ABSPATH')) die();
global $ist;
$events = get_posts(
	array(
		'post_type' => 'ist_event',
		'post_status' => 'publish',
	)
);
?>

<div class='<?php echo $ist->prefix;?>_event_wrapper'>
<h2>Events</h2>
<?php foreach($events as $event){ ?>
<div class='<?php echo $ist->prefix;?>_event_block'>
	<h3><?= $event->post_title ?></h3>
	<p><?= $event->post_content ?></p>
</div>
<?php } ?>
</div>
