<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'faq-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$text = get_field( 'text' );
$link_url = get_field( 'link_url' );
$link_label = get_field( 'link_label' );
$column = get_field( 'column' );
$counter = 0;
?>

<section <?php echo $id; ?> class="faq <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/faq">
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="subheading" data-aos="fade-down"><?=(!empty($subheading)) ? $subheading : '';?></div>
                <div class="heading" data-aos="fade-down" data-aos-delay="200">
                    <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                </div>
                <div class="text" data-aos="fade-down" data-aos-delay="300">
                    <p><?=(!empty($text)) ? $text : '';?> <span><a href="<?=(!empty($link_url)) ? $link_url : ''?>"><?=(!empty($link_label)) ? $link_label: '';?> </a></span></p>
                </div>
            </div>
            <div class="grid">
                <?php if($column['items']) :?>
                    <?php foreach($column['items'] as $item): ?>
                        <?php $class = ($counter == 0 ) ?  'active' :  ''; ?>
                        <div class="item accordion <?=$class?> " data-aos="fade-down" data-aos-delay="400" data-aos-anchor=".faq">
                            <div class="card">
                                <div class="_card-action">
                                    <div class="close hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                            <path d="M8 12.792H16M22 12.792C22 18.3148 17.5228 22.792 12 22.792C6.47715 22.792 2 18.3148 2 12.792C2 7.26914 6.47715 2.79199 12 2.79199C17.5228 2.79199 22 7.26914 22 12.792Z" stroke="#A9A29D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M12 8.67822V16.6782M8 12.6782H16M22 12.6782C22 18.2011 17.5228 22.6782 12 22.6782C6.47715 22.6782 2 18.2011 2 12.6782C2 7.15538 6.47715 2.67822 12 2.67822C17.5228 2.67822 22 7.15538 22 12.6782Z" stroke="#A9A29D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </div>
                                </div>
                                <div class="_card_content">
                                    <div class="_title"><?=$item['heading']?></div>
                                    <div class="_inner_content">
                                        <p><?=$item['content']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>