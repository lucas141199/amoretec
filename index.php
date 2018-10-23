<?php
get_header();

$img = get_custom_header();
$img = $img->url;

$additional = '';
if ( ! empty( $img ) ) : ?>
	<?php $additional = 'style="background-image:url(' . esc_url( $img ) . '"'; ?>
<?php endif; ?>

	<div class="newsmag-custom-header" <?php echo $additional; ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="page-title"><?php echo esc_html( get_option( 'blogname' ) ); ?></h1>
				</div>
			</div>
		</div>
	</div>

<?php
$breadcrumbs_enabled = get_theme_mod( 'newsmag_enable_post_breadcrumbs', true );
if ( $breadcrumbs_enabled ) {
?>
	<div class="container newsmag-breadcrumbs-container">
		<div class="row newsmag-breadcrumbs-row">
			<div class="col-xs-12">
				<?php Newsmag_Helper::add_breadcrumbs(); ?>
			</div>
		</div>
	</div>
<?php } ?>
	<div class="container">
		<div class="row">
			<?php
			$layout = get_theme_mod( 'newsmag_blog_layout', 'right-sidebar' );
			?>

			<?php if ( 'left-sidebar' === $layout ) : ?>
				<?php get_sidebar( 'sidebar' ); ?>
			<?php endif; ?>

			<div id="primary"
				class="newsmag-content newsmag-archive-page <?php echo ( 'fullwidth' === $layout ) ? '' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12">
				<main id="main" class="site-main" role="main">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;
					endif;
					?>
				</main><!-- #main -->
				<?php
				the_posts_pagination(
					array(
						'prev_text' => 'prev',
						'next_text' => 'next',
					)
				);
?>
			</div><!-- #primary -->
			<?php if ( 'right-sidebar' === $layout ) : ?>
				<?php get_sidebar( 'sidebar' ); ?>
			<?php endif; ?>

		</div>
	</div>
<?php
get_footer();

