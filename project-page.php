<?php
/**
 * Template Name: Project Page
 * 
 * A custom page that will accept the metadata category and git-rss-url
 *
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
<?

$category = get_post_custom_values('category');
$feed = get_post_custom_values('git-rss-feed');

//get most recent post in category
$posts = get_posts(array('numberposts' => 1, 'category_name'=> $category[0]));
	foreach($posts as $post) {
		setup_postdata($post);
	?><div class="grid_12">
		<h2><a href="projects/<?php echo $category[0]; ?>" rel="bookmark">Recent Updates</a></h2>
		<?php the_excerpt(); ?>
	</div><?
	}


//get github status
$rss = fetch_feed($feed[0]);
echo '<div class="grid_12">';
echo '<h2>Recent Commits</h2>';
if (!is_wp_error($rss)) {
	$items = $rss->get_item_quantity(5);
	$rss_items = $rss->get_items(0, $items);
	echo '<ul>';
	foreach ($rss_items as $item) {
		?><li><a href="<?php echo $item->get_permalink(); ?>" title="<?php echo "Committed ".$item->get_date('j F Y | g:i a'); ?>">	<?php echo $item->get_title(); ?></a></li>
	<? }
	echo '</ul>';
}
echo '</div>';
?>

<?php endwhile; ?>
<?php get_footer(); ?>
