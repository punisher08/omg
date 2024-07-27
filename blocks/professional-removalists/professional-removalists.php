<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'professional-removalists-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$items  = get_field( 'items' );
$image = get_field( 'image' );
?>

<section <?php echo $id; ?> class="professional-removalists <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/professional-removalists">
    <div class="container">
        <div class="row">
            <div class="grid grid-item-2">
                <div class="item">
                    <div class="header">
                        <div class="subheading" data-aos="fade-right"><?=($items) ? $items['subheading'] : ''?></div>
                        <div class="heading" data-aos="fade-right" data-aos-delay="200">
                            <h1><?=($items) ? $items['heading'] : ''?></h1>
                        </div>
                        <div class="text"  data-aos="fade-right" data-aos-delay="300" data-aos-anchor=".header .subheading">
                            <p><?=($items) ? $items['content'] : ''?></p>
                        </div>
                    </div>
                </div>
                <div class="item img-grp" data-aos="fade-left">
                    <div class="background-shape"></div>
                    <div class=" image-wrapper">
                        <?php if(!empty($image)):?>
                         <img class="main-img" src="<?=($image) ? $image['url'] : ''?>" alt="">
                        <?php endif;?>
                    </div>
                    <div class="icon-bottom">
                        <img src="/wp-content/uploads/2024/07/Mobile-1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>