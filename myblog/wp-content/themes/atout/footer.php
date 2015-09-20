<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div
 *
 * @package atout
 * @author Frenchtastic.eu
 */
?>
</div> <!-- #content -->

<?php if(is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3')): ?>
	<div class="widgetfooter">
		<div class="container">
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<footer class="footer">
	<div class="container text-center">
		<p class="footer-copy">&copy; <?php echo date('Y'); ?> - <b><?php echo atout_footer(); ?></b></p>
	</div>
</footer>
</div> <!-- #wrap -->

<?php wp_footer(); ?>
</body>
</html>