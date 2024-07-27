<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'services-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$image = get_field( 'image' );
$items = get_field( 'items' );

// first commit
$services = get_posts([
    'post_type' => 'services',
    'post_status' => 'publish',
    'numberposts' => -1,
    'post__in' => $items,
    'orderby' => 'post__in'
]);

$used_slider = (get_field('use_slider') == true) ? true : false;
if($used_slider){
    $style1 = 'false';
    $style2 = 'true';
}else{

    $style1 = 'true';
    $style2 = 'false';

}

?>
<section <?php echo $id; ?> class="services <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/services">
    <div class="container">
        <div class="row">
            <div class="grid">
                <div class="item header">
                    <div class="subheading" data-aos="fade-right"><?=(!empty($subheading)) ? $subheading : '';?></div>
                    <div class="heading" data-aos="fade-right" data-aos-delay="250">
                        <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                    </div>
                    <div class="text" data-aos="fade-right" data-aos-delay="250" data-aos-anchor=".services .heading">
                        <?=(!empty($text)) ? $text : '';?>
                    </div>
                </div>
                <div class="item img-grp" data-aos="fade-left">
                    <?php if(!empty($image)):?>
                    <img src="<?=$image['url'];?>" alt="<?=$image['alt'];?>">
                    <?php endif;?>

                </div>
            </div>
        </div>
        <div class="row desktop" element-active-on-mobile="<?=$style1;?>">
            <div class="grid services-cards">
                <!-- start of services  -->
                <?php foreach($services as $service):?>
                <div class="item" data-aos="fade-up">
                    <div class="card">
                        <?php
                             $image = get_the_post_thumbnail_url($service->ID);
                             $link = get_permalink( $service->ID );
                             ?>
                        <div class="card-header">
                            <a href="<?=$link;?>">
                                <img src="<?=$image;?>" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="title"><?=$service->post_title;?></div>
                            <div class="text">
                                <?=$service->post_excerpt;?>
                            </div>
                            <div class="more-btn">
                                <a href="<?=$link;?>">
                                    Learn more
                                    <span class="arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M4.16699 9.99996H15.8337M15.8337 9.99996L10.0003 4.16663M15.8337 9.99996L10.0003 15.8333"
                                                stroke="#FDCB08" stroke-width="1.66667" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- eo services -->
            </div>
        </div>
        <div class="row services-mobile" element-active-on-mobile="<?=$style2;?>">
            <div class="splide" id="services-slider">
                <div class="splide__track">
                    <ul class="splide__list" >
                        <?php foreach($services as $service):?>
                        <li class="splide__slide">
                            <div class="card">
                                <?php
                                    $image = get_the_post_thumbnail_url($service->ID);
                                    $link = get_permalink( $service->ID );
                                    $icon  = get_field('icon', $service->ID);
                                    ?>
                                <div class="card-header">
                                    <a href="<?=$link;?>">
                                        <img src="<?=$icon['url'];?>" alt="">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="title"><?=$service->post_title;?></div>
                                    <div class="text">
                                        <?=$service->post_excerpt;?>
                                    </div>
                                    <div class="more-btn">
                                        <a href="<?=$link;?>">
                                            Learn more
                                            <span class="arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M4.16699 9.99996H15.8337M15.8337 9.99996L10.0003 4.16663M15.8337 9.99996L10.0003 15.8333"
                                                        stroke="#FDCB08" stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
</section>