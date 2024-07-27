<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'cards-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );

$cards = get_field( 'cards' );
?>

<section <?php echo $id; ?> class="cards <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/cards">
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="heading" data-aos="fade-down">
                    <h1><?=(!empty($heading)) ? $heading : ''?></h1>
                </div>
                <div class="text">
                    <p><?=(!empty($text)) ? $text : ''?></p>
                </div>
            </div>
            <div class="grid visible-dekstop">
                <?php if ( ! empty( $cards ) ): ?>
                <?php foreach ( $cards as $card ): ?>
                <div class="item" data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".cards">
                    <div class="card">
                        <div class="icon">
                            <?php if ( ! empty( $card['icon'] ) ): ?>
                            <img decoding="async" src="<?=esc_url($card['icon']['url'])?>"
                                alt="<?=esc_attr($card['icon']['alt'])?>">
                            <?php endif; ?>
                        </div>
                        <div class="title">
                            <h1><?=esc_html($card['title'])?></h1>
                        </div>
                        <div class="text content">
                            <?=($card['content'])?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <!-- start splide -->
            <div class="cards-slider" data-aos="fade-down" data-aos-delay="500">
                <div class="cards-slider splide" id="cards-slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php if(!empty($cards)):?>
                            <?php foreach($cards as $card):?>
                            <li class="splide__slide item" data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".cards">
                                <div class="card">
                                    <div class="icon">
                                        <?php if ( ! empty( $card['icon'] ) ): ?>
                                        <img decoding="async" src="<?=esc_url($card['icon']['url'])?>"
                                            alt="<?=esc_attr($card['icon']['alt'])?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="title">
                                        <h1><?=esc_html($card['title'])?></h1>
                                    </div>
                                    <div class="text content">
                                        <?=($card['content'])?>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach;?>
                            <?php endif;?>
                    </div>
                </div>
            </div>
            <!-- eo splide -->
        </div>
    </div>
</section>