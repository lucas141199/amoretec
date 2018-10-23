<?php

$mysidebars = array(
	'footer-1',
	'footer-2',
	'footer-3',
	'footer-4',
);

$sidebars = array();
foreach ( $mysidebars as $column ) {
	if ( is_active_sidebar( $column ) ) {
		$sidebars[] = $column;
	}
};


$count = get_theme_mod( 'newsmag_footer_columns', 4 );

$size = 12 / (int) $count;


if ( empty( $sidebars ) ) {
	$args = array(
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',
	);

	$widgets = array( 'WP_Widget_Meta', 'WP_Widget_Recent_Posts', 'WP_Widget_Tag_Cloud', 'WP_Widget_Categories' );
	$widgets = array_slice( $widgets, 0, $count );
	?>
	<div class="footer-widgets-area regular-footer-area">
		<div class="container">
			<div class="row">
				<?php foreach ( $widgets as $widget ) { ?>
					<div class="col-md-<?php echo esc_attr( $size ); ?> col-sm-6">
						<?php the_widget( $widget, array(), $args ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php
	return false;
}



$sidebars = array_slice( $sidebars, 0, $count );
?>
<div class="footer-widgets-area regular-footer-area">
	<div class="container">
		<div class="row">
			<?php foreach ( $sidebars as $sidebar ) : ?>
				<div class="col-md-<?php echo esc_attr( $size ); ?> col-sm-6">
					<?php dynamic_sidebar( $sidebar ); ?>
				</div>
			<?php endforeach; ?> 
		</div><!--.row-->
	</div>
</div>
