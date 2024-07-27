<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'testimonials-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );

$testimonials = get_posts([
    'post_type' => 'testimonial',
    'numberposts' => -1,
    'orderby' => 'date',
    'order' => 'ASC'
]);

?>
<section <?php echo $id; ?> class="testimonials <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/testimonials">
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="subheading" data-aos="fade-down"><?=(!empty($subheading)) ? $subheading : '';?></div>
                <div class="heading" data-aos="fade-down" data-aos-delay="200">
                    <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                </div>
                <div class="text" data-aos="fade-down" data-aos-delay="300">
                    <?=(!empty($text)) ? $text : '';?>
                </div>
            </div>
            <div class="google-rating" data-aos="fade-down" data-aos-delay="400">
                <a href="https://www.google.com/search?q=no+limits+removalists&oq=no+limits+removalists&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTINCAEQLhivARjHARiABDINCAIQLhiDARixAxiABDINCAMQLhiDARixAxiABDINCAQQLhiDARixAxiABDIGCAUQRRg8MgYIBhBFGDwyBggHEEUYPNIBCDQ2NzNqMGoxqAIAsAIA&sourceid=chrome&ie=UTF-8#lrd=0xe7776cc1edc1d25:0xcea6f6f7828bc86f,1,,,,"
                target="_blank">
                <button class="google-button">
                    <div class="btn-content">
                        <div class="google-icon">
                            <img src="/wp-content/uploads/2024/07/Google__G__Logo-1.svg" alt="">
                        </div>
                        <div class="_des">
                            <h1>Google Ranking</h1>
                            <div class="ratings">
                                <div class="text">
                                    <h1>5.0</h1>
                                </div>
                                <div class="rate-star">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 19 19">
                                        <path fill="#FDCB08"
                                            d="M9.33 1.54c.24-.47.92-.47 1.15 0l1.93 3.87c.1.19.28.32.48.36l4.28.63c.52.08.73.71.35 1.09L14.43 10.52c-.15.15-.22.36-.18.56l.72 4.27c.09.52-.38.91-.85.69l-3.83-2c-.19-.1-.42-.1-.61 0l-3.83 2c-.47.22-1-.17-.91-.69l.72-4.27c.04-.2-.03-.41-.18-.56L2.29 7.49c-.38-.38-.17-1.01.35-1.09l4.28-.63c.2-.03.38-.17.48-.36L9.33 1.54z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 19 19">
                                        <path fill="#FDCB08"
                                            d="M9.33 1.54c.24-.47.92-.47 1.15 0l1.93 3.87c.1.19.28.32.48.36l4.28.63c.52.08.73.71.35 1.09L14.43 10.52c-.15.15-.22.36-.18.56l.72 4.27c.09.52-.38.91-.85.69l-3.83-2c-.19-.1-.42-.1-.61 0l-3.83 2c-.47.22-1-.17-.91-.69l.72-4.27c.04-.2-.03-.41-.18-.56L2.29 7.49c-.38-.38-.17-1.01.35-1.09l4.28-.63c.2-.03.38-.17.48-.36L9.33 1.54z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 19 19">
                                        <path fill="#FDCB08"
                                            d="M9.33 1.54c.24-.47.92-.47 1.15 0l1.93 3.87c.1.19.28.32.48.36l4.28.63c.52.08.73.71.35 1.09L14.43 10.52c-.15.15-.22.36-.18.56l.72 4.27c.09.52-.38.91-.85.69l-3.83-2c-.19-.1-.42-.1-.61 0l-3.83 2c-.47.22-1-.17-.91-.69l.72-4.27c.04-.2-.03-.41-.18-.56L2.29 7.49c-.38-.38-.17-1.01.35-1.09l4.28-.63c.2-.03.38-.17.48-.36L9.33 1.54z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 19 19">
                                        <path fill="#FDCB08"
                                            d="M9.33 1.54c.24-.47.92-.47 1.15 0l1.93 3.87c.1.19.28.32.48.36l4.28.63c.52.08.73.71.35 1.09L14.43 10.52c-.15.15-.22.36-.18.56l.72 4.27c.09.52-.38.91-.85.69l-3.83-2c-.19-.1-.42-.1-.61 0l-3.83 2c-.47.22-1-.17-.91-.69l.72-4.27c.04-.2-.03-.41-.18-.56L2.29 7.49c-.38-.38-.17-1.01.35-1.09l4.28-.63c.2-.03.38-.17.48-.36L9.33 1.54z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 19 19">
                                        <path fill="#FDCB08"
                                            d="M9.33 1.54c.24-.47.92-.47 1.15 0l1.93 3.87c.1.19.28.32.48.36l4.28.63c.52.08.73.71.35 1.09L14.43 10.52c-.15.15-.22.36-.18.56l.72 4.27c.09.52-.38.91-.85.69l-3.83-2c-.19-.1-.42-.1-.61 0l-3.83 2c-.47.22-1-.17-.91-.69l.72-4.27c.04-.2-.03-.41-.18-.56L2.29 7.49c-.38-.38-.17-1.01.35-1.09l4.28-.63c.2-.03.38-.17.48-.36L9.33 1.54z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="see-all">
                                <h1>See all our reviews</h1>
                            </div>
                        </div>
                    </div>
                </button>
                </a>
                <img class="arrow" src="/wp-content/uploads/2024/07/Component-11-1.svg" alt="">
            </div>
            <!-- slider -->
        </div>
    </div>
    <div class="custom-slider" data-aos="fade-down" data-aos-delay="500">
        <div class="_testimonials-slider splide testimonials-slider" id="testimonial-slider">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php if(!empty($testimonials)):?>
                    <?php foreach($testimonials as $testimonial ) :?>
                    <li class="splide__slide">
                        <div class="item">
                            <div class="card">
                                <div class="card-header">
                                    <?php
                                        $rating = get_field('rating', $testimonial->ID);
                                    ?>
                                    <div class="stars">
                                        <?php for($i = 0; $i < $rating; $i++):?>
                                            <img src="/wp-content/uploads/2024/07/Star.svg" alt="">
                                        <?php endfor;?>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <!-- < ?=$testimonial->post_content;?> -->
                                            <?=wp_trim_words(  esc_html( $testimonial->post_content ), 40);?>
                                       </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="grid">
                                            <div class="item">
                                                <div class="author"><?=$testimonial->post_title;?></div>
                                                <div class="time">a day ago</div>
                                            </div>
                                            <div class="item google-icon">
                                                <img src="/wp-content/uploads/2024/07/Google__G__Logo-1.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach;?>
                    <?php endif;?>
            </div>
        </div>
    </div>
</section>