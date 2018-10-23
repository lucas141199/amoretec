<?php

get_header();
$image = get_custom_header();
$title = '';

while ( have_posts() ) :
	the_post();
	$img   = get_the_post_thumbnail_url();
	$title = get_the_title();
endwhile;

if ( empty( $img ) ) {
	$img = get_custom_header();
	$img = $img->url;
}

$additional = '';
if ( ! empty( $img ) ) : ?>
	<?php $additional = 'style="background-image:url(' . esc_url( $img ) . '"'; ?>
<?php endif; ?>

	<div class="newsmag-custom-header" <?php echo $additional; ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="page-title"><?php echo esc_html( $title ); ?></h1>
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
		<div id="primary" class="content-area">
			<main id="main" class="site-main row" role="main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
