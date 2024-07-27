<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'trusted-by-experts-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$image = get_field( 'image' );
$row = get_field( 'row' );
?>
<section <?php echo $id; ?> class="trusted-by-experts <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/trusted-by-experts">
    <div class="container">
        <div class="row">
            <div class="grid grid-item-1">
                <div class="item">
                    <div class="header">
                        <div class="subheading" data-aos="fade-right"><?=(!empty($subheading)) ? $subheading : '';?>
                        </div>
                        <div class="heading" data-aos="fade-right" data-aos-delay="200">
                            <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                        </div>
                        <div class="text" data-aos="fade-right" data-aos-delay="300">
                            <?=(!empty($text)) ? $text : '';?>
                        </div>
                    </div>
                </div>
                <div class="item car" data-aos="fade-in" data-aos-delay="500">
                    <?php if($image):?>
                    <img src="<?=$image['url'];?>" alt="<?=$image['alt'];?>">
                    <?php endif;?>

                </div>
            </div>
            <div class="grid grid-item-2">
                <div class="item">
                    <!-- splide slider -->
                    <div class="splide experts-slider-mobile" id="trusted-by-experts-slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php if($row['items']):?>
                                <?php foreach($row['items'] as $item): ?>
                                <li class="splide__slide" data-aos="fade-down">
                                    <div class="card">
                                        <div class="header">
                                            <div class="icon">
                                                <?php if($item['icon']):?>
                                                <img src="<?=$item['icon']['url'];?>" alt="<?=$item['icon']['alt'];?>">
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="heading">
                                                <h1><?=$item['title'];?></h1>
                                            </div>
                                            <div class="text">
                                                <?=$item['content'];?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- eo slider -->
                    <div class="grid-template-columns-2 desktop-experts">
                        <?php if($row['items']):?>
                        <?php foreach($row['items'] as $item): ?>
                        <div class="card" data-aos="fade-down">
                            <div class="header">
                                <div class="icon">
                                    <?php if($item['icon']):?>
                                    <img src="<?=$item['icon']['url'];?>" alt="<?=$item['icon']['alt'];?>">
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="body">
                                <div class="heading">
                                    <h1><?=$item['title'];?></h1>
                                </div>
                                <div class="text">
                                    <?=$item['content'];?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item img-grp" data-aos="fade-down-left">
                    <div class="background-shape"></div>
                    <div class=" image-wrapper">
                        <?php if($row['image']):?>
                        <img src="<?=$row['image']['url'];?>" alt="<?=$row['image']['alt'];?>">
                        <?php endif;?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>