<?php
$image_id = get_field('hero_background_image');

if ($image_id) {
	$image_url = wp_get_attachment_image_url($image_id, 'full');
}
?>

<section class="hero" style="background-image: url('<?php echo esc_url($image_url); ?>');">

	<div class="hero__content">

		<?php if ( $heading = get_field('hero_heading') ): ?>
			<h1 class="hero__title"><?php echo esc_html($heading); ?></h1>
		<?php endif; ?>

		<?php if ( $subheading = get_field('hero_subheading') ): ?>
			<p class="hero__subtitle"><?php echo esc_html($subheading); ?></p>
		<?php endif; ?>

		<?php if( $button = get_field('hero_button') ):
			$button_url = $button['url'];
			$button_title = $button['title'];
			$button_target = $button['target'] ? $button['target'] : '_self';
			?>
			<a class="hero__button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
				<?php echo esc_html( $button_title ); ?>
			</a>
		<?php endif; ?>

	</div>

</section>