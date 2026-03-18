<?php
//$slides = get_field( 'slides' );
//
//if ( ! $slides ) {
//	echo '<p>No slides added yet.</p>';
//
//	return;
//}
//?>

<section>
    <?php if ( have_rows( 'slides' ) ): ?>
        <div class="swiper-container slider-block">
            <div class="swiper-wrapper">
                <?php while ( have_rows( 'slides' ) ): the_row(); ?>
                    <div class="swiper-slide">
                        <?php $image_id = get_sub_field( 'slide_image' );
                        $size           = 'medium';
                        if ( $image_id ) {
                            echo wp_get_attachment_image( $image_id, $size, false,
                                [
                                    'class'   => 'swiper-lazy',
                                    'loading' => 'lazy'
                                ] );
                        } ?>

                        <?php if ( $image_text = get_sub_field( 'slide_text' ) ): ?>
                            <p class="slide-text">
                                <?php echo esc_html( $image_text ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    <?php endif; ?>
</section>
