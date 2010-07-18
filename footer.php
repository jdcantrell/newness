<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div id="footer" style="clear:both" role="contentinfo">
	<hr class="divder"/>
	<div class="alignleft">
		<?php bloginfo('name'); ?> is proudly powered by
		<a href="http://wordpress.org/">WordPress</a>
	</div>
	<div class="alignright">
		<a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
	</div>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
</div>
</div>
	<?php wp_footer(); ?>
</body>
</html>
