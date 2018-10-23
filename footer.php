<?php


?> 
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php get_sidebar( 'footer' ); ?>

	<?php
	if ( get_theme_mod( 'newsmag_after_footer_enable', false ) ) {
		get_template_part( 'template-parts/after-footer' );
	}
	?>

	<?php $go_top_enabled = get_theme_mod( 'newsmag_enable_go_top', true ); ?>

	<?php if ( $go_top_enabled ) : ?>
		<a href="#0" id="back-to-top" class="back-to-top">
			<span class="nmicon-angle-up"></span>
		</a>
	<?php endif; ?>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
