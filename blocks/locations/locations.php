<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'locations-block';
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

<section <?php echo $id; ?> class="locations <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/locations">
    <div class="container">
        <div class="row">
            <!-- form -->
            <form action="" class="hidden">
                <div class="group flex">
                    <div class="input">
                        <input type="text" placeholder="<?=$input_label;?>" id="wpsl-search-input" name="wpsl-search-input" value="NSW">
                    </div>
                    <div class="button">
                        <button id="wpsl-search-btn">Find</button>
                    </div>
                </div>
            </form>
            <!-- eo form -->
             <div class="header">
                <div class="subheading">DROP BY</div>
                <div class="heading">
                    <h1>Our locations</h1>
                </div>
                <div class="text">
                    <p>Come visit our friendly team at one of our offices.</p>
                </div>
             </div>
            <div class="grid">
                <?php echo do_shortcode('[wpsl]'); ?>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    let searchButton = document.getElementById('wpsl-search-btn');

    searchButton.addEventListener('click', event => {
        event.preventDefault();
        // window.location.href = "#wpsl-gmap";
        let streetIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none" style="margin-right:10px;">
        <path d="M16 2.6665C13.0836 2.66981 10.2877 3.8298 8.22548 5.89198C6.1633 7.95417 5.00331 10.7501 5 13.6665C5 23.079 15 30.1878 15.4263 30.4853C15.5944 30.603 15.7947 30.6662 16 30.6662C16.2053 30.6662 16.4056 30.603 16.5737 30.4853C17 30.1878 27 23.079 27 13.6665C26.9967 10.7501 25.8367 7.95417 23.7745 5.89198C21.7123 3.8298 18.9164 2.66981 16 2.6665ZM16 9.6665C16.7911 9.6665 17.5645 9.9011 18.2223 10.3406C18.8801 10.7802 19.3928 11.4049 19.6955 12.1358C19.9983 12.8667 20.0775 13.6709 19.9231 14.4469C19.7688 15.2228 19.3878 15.9355 18.8284 16.4949C18.269 17.0543 17.5563 17.4353 16.7804 17.5896C16.0044 17.744 15.2002 17.6648 14.4693 17.362C13.7384 17.0593 13.1136 16.5466 12.6741 15.8888C12.2346 15.231 12 14.4576 12 13.6665C12 12.6056 12.4214 11.5882 13.1716 10.8381C13.9217 10.0879 14.9391 9.6665 16 9.6665Z" fill="#D61D2D"/>
        </svg>`;
        let phone = `<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
        <path d="M28 21.8933V26.608C28.0002 26.9456 27.8723 27.2706 27.6421 27.5176C27.412 27.7646 27.0967 27.915 26.76 27.9387C26.1773 27.9787 25.7013 28 25.3333 28C13.5507 28 4 18.4493 4 6.66667C4 6.29867 4.02 5.82267 4.06133 5.24C4.08496 4.90326 4.23544 4.58801 4.4824 4.35788C4.72937 4.12774 5.05443 3.99985 5.392 4H10.1067C10.2721 3.99983 10.4316 4.06115 10.5543 4.17203C10.677 4.28291 10.7541 4.43544 10.7707 4.6C10.8013 4.90667 10.8293 5.15067 10.856 5.336C11.121 7.18523 11.664 8.98378 12.4667 10.6707C12.5933 10.9373 12.5107 11.256 12.2707 11.4267L9.39333 13.4827C11.1526 17.5819 14.4194 20.8487 18.5187 22.608L20.572 19.736C20.6559 19.6187 20.7784 19.5345 20.918 19.4982C21.0576 19.4619 21.2055 19.4757 21.336 19.5373C23.0227 20.3386 24.8208 20.8802 26.6693 21.144C26.8547 21.1707 27.0987 21.1987 27.4027 21.2293C27.567 21.2462 27.7192 21.3234 27.8298 21.4461C27.9404 21.5688 28.0002 21.7282 28 21.8933Z" fill="#D61D2D"/>
        </svg>`;
        let timeIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
        <path d="M16.0003 2.99988C14.2494 2.99988 12.5156 3.34475 10.8979 4.01482C9.2802 4.68488 7.81035 5.66701 6.57223 6.90512C4.07175 9.40561 2.66699 12.797 2.66699 16.3332C2.66699 19.8694 4.07175 23.2608 6.57223 25.7613C7.81035 26.9994 9.2802 27.9815 10.8979 28.6516C12.5156 29.3217 14.2494 29.6665 16.0003 29.6665C19.5365 29.6665 22.9279 28.2618 25.4284 25.7613C27.9289 23.2608 29.3337 19.8694 29.3337 16.3332C29.3337 14.5823 28.9888 12.8484 28.3187 11.2308C27.6487 9.61309 26.6665 8.14324 25.4284 6.90512C24.1903 5.66701 22.7204 4.68488 21.1028 4.01482C19.4851 3.34475 17.7513 2.99988 16.0003 2.99988ZM21.6003 21.9332L14.667 17.6665V9.66654H16.667V16.5999L22.667 20.1999L21.6003 21.9332Z" fill="#D61D2D"/>
        </svg>`;
        let stores = document.querySelector('#wpsl-stores');
        setTimeout(() => {
            let searchRadius = document.querySelector('#wpsl-radius-dropdown');
            searchRadius.value = "500"
            let storeLocations = document.querySelectorAll('.wpsl-store-location');
        }, 1000);
    })
    setTimeout(() => {
        searchButton.click();
    }, 100);
})
</script>