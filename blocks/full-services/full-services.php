<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'full-services-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$content_group    = get_field( 'content_group' );
$cards    = get_field( 'cards' );

if (!empty($cards) && is_array($cards)) {
    $counter = 0;
    $last_column_count = count($cards) % 3;
    $initial_items_array = count($cards) - $last_column_count;
    $items = array_slice($cards, 0, $initial_items_array);
    $remaining = array_slice($cards, $initial_items_array);
} else {
    $items = [];
    $remaining = [];
}


?>

<section <?php echo $id; ?> class="full-services <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/full-services">
    <div class="container">
        <div class="row">
            <?php if($content_group):?>
            <?php foreach($content_group as $key => $content):?>
            <div class="content-group">
                <div class="header">
                    <div class="subheading" data-aos="fade-down"><?=$content['subheading'];?></div>
                    <div class="heading" data-aos="fade-down">
                        <h1><?=$content['heading'];?></h1>
                    </div>
                </div>
                <div class="text" data-aos="fade-down">
                    <p><?=$content['text'];?></p>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>

            <!-- cards -->
            <div class="grid visible-dekstop">
                <?php if(!empty($items)):?>
                <?php foreach($items as $key => $card):?>
                <div class="item" data-aos="fade-up" data-aos-anchor=".full-services" data-aos-delay="200">
                    <div class="card">
                        <div class="icon">
                            <?php if($card['icon']):?>
                            <img src="<?=$card['icon']['url'];?>" alt="">
                            <?php endif;?>
                        </div>
                        <div class="title">
                            <h1><?=$card['title'];?></h1>
                        </div>
                        <div class="text content">
                            <p><?=$card['text'];?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
            <!-- grid second row -->
            <div class="grid last-child">
                <?php if($remaining) : ?>
                <?php foreach($remaining as $key => $card):?>
                <div class="item" data-aos="fade-up" data-aos-anchor=".full-services" data-aos-delay="200">
                    <div class="card">
                        <div class="icon">
                            <?php if($card['icon']):?>
                            <img src="<?=$card['icon']['url'];?>" alt="">
                            <?php endif;?>
                        </div>
                        <div class="title">
                            <h1><?=$card['title'];?></h1>
                        </div>
                        <div class="text content">
                            <p><?=$card['text'];?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- start splide -->
            <div class="full-services-slider" data-aos="fade-down" data-aos-delay="500">
                <div class="full-services-slider splide" id="full-services-slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php if(!empty($cards)):?>
                            <?php foreach($cards as $key => $card):?>
                            <li class="splide__slide item">
                                <div class="card">
                                    <div class="icon">
                                        <?php if($card['icon']):?>
                                        <img src="<?=$card['icon']['url'];?>" alt="">
                                        <?php endif;?>
                                    </div>
                                    <div class="title">
                                        <h1><?=$card['title'];?></h1>
                                    </div>
                                    <div class="text content">
                                        <p><?=$card['text'];?></p>
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