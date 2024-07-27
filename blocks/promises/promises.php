<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'promises-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$row = get_field('row');
$counter = 0;

$last_column_count = count($row['items']) % 3;
$first_three = array_slice($row['items'], 0, 3);
// 
$remaining = array_slice($row['items'], 3);



?>

<section <?php echo $id; ?> class="promises <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/promises">
    <div class="container">
        <div class="header">
            <div class="subheading" data-aos="fade-down"><?=(!empty($subheading)) ? $subheading : ''?></div>
            <div class="heading" data-aos="fade-down" data-aos-delay="200">
                <h1><?= (! empty($heading)) ? $heading : ''?></h1>
            </div>
        </div>
        <div class="row desktop">
            <div class="grid desktop">
              <?php if($row['items']) : ?>
                <?php foreach($first_three  as $item) :?>
                    
                    
                        <div class="item"  data-aos="fade-up" data-aos-anchor=".promises" data-aos-delay="400">
                            <div class="card">
                                <div class="icon">
                                    <?php if($item['icon']):?>
                                        <img src="<?=$item['icon']['url'];?>" alt="<?=$item['icon']['alt'];?>">
                                    <?php endif;?>
                                </div>
                                <div class="title">
                                    <h1><?=$item['heading'];?></h1>
                                </div>
                                <div class="text">
                                    <p><?=$item['content'];?></p>
                                </div>
                            </div>
                        </div>
                       
                  
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <!-- grid second row -->
            <div class="grid last-child">
                <?php if($remaining) : ?>
                    <?php foreach($remaining  as $item) :?>
                        <div class="item"  data-aos="fade-up" data-aos-anchor=".promises" data-aos-delay="400">
                            <div class="card">
                                <div class="icon">
                                    <?php if($item['icon']):?>
                                        <img src="<?=$item['icon']['url'];?>" alt="<?=$item['icon']['alt'];?>">
                                    <?php endif;?>
                                </div>
                                <div class="title">
                                    <h1><?=$item['heading'];?></h1>
                                </div>
                                <div class="text">
                                    <p><?=$item['content'];?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mobile">
           
                <div class="our-promises splide" id="splide-promises">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php if($row['items']) : ?>
                            <?php foreach($row['items']  as $item) :?>
                                <li class="splide__slide">
                                    <div class="card">
                                        <div class="icon">
                                            <?php if($item['icon']):?>
                                                <img src="<?=$item['icon']['url'];?>" alt="<?=$item['icon']['alt'];?>">
                                            <?php endif;?>
                                        </div>
                                        <div class="title">
                                            <h1><?=$item['heading'];?></h1>
                                        </div>
                                        <div class="text">
                                            <p><?=$item['content'];?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            <!--  -->
        </div>
    </div>
</section>