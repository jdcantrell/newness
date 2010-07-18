<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$content_width = 450;

automatic_feed_links();

/*if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' =>'Bottom',
		'before_widget' => '<li id="%1$s" class="flat-list widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="grid_3 widgettitle">',
		'after_title' => '</div>',
	));
}*/

register_nav_menus( array(
	'primary' => 'Primary Navigation',
) );

function superblue_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-details">
			<div class="alignleft">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment,$size='24',$default='<path_to_url>' ); ?>
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>
			</div>
			<div class="alignright">
				<div class="comment-meta commentmetadata">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
					</a>
					<?php edit_comment_link(__('(Edit)'),'  ','') ?>
				</div>
			</div>
		</div>
		<div class="comment-body">
		<?php comment_text() ?>
		</div>
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>
	<?php
}	
?>
