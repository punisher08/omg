<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'two-cols-section-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$image = get_field( 'image' );
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$steps    = get_field( 'steps' );
$cta    = get_field( 'cta' );

?>
<section <?php echo $id; ?> class="two-cols-section <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/two-cols-section">
    <div class="container">
        <div class="row">
            <div class="flex">
                <div class="item">
                    <div class="img-container" data-aos="fade-right">
                        <?php if ( $image ): ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="icon-bottom">
                        <img src="/wp-content/uploads/2024/07/illustration.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="text-container">
                        <div class="get-moving" data-aos="fade-left">
                            <h3><?=(!empty($subheading)) ? $subheading : '';?></h3>
                        </div>
                        <div data-aos="fade-left" data-aos-delay="250">
                            <h2><?=(!empty($heading)) ? $heading : '';?></h2>
                        </div>
                    </div>
                    <div class="list">
                        <ul>
                            <?php if ( $steps ): ?>
                                <?php $count = 01; ?>
                                <?php foreach ( $steps as $step ): ?>
                                    <li data-aos="fade-left" data-aos-delay="500" data-aos-anchor=".get-moving">
                                        <div class="list-one">
                                        <div class="list-count">
                                           
                                            <h1><?=($count < 10) ? '0'.$count : $count;?></h1>
                                        </div>
                                        <div class="_text">
                                            <h3><?=$step['title'];?></h3>
                                            <?=($step['content']);?>
                                        </div>
                                        </div>
                                    </li>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="request-quote" data-aos="fade-up" data-aos-delay="800" data-aos-anchor=".get-moving">
                            <div class="text-get-started">
                                <h3><?=$cta['headline'];?></h3>
                            </div>
                            <div class="btn-container primary-button-cta">
                                <a href="<?=$cta['button_url'];?>" class="">
                                    <button ><?=$cta['button_label'];?></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>