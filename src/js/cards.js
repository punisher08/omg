
/**
 * Cards
 */
if(document.querySelector('#cards-slider')) {

    var isMobile = window.innerWidth < 768;
    var cards_splide = new Splide('#cards-slider', {
      type: 'loop',
      padding   : { left: '0%', right: '15%' },
      focus: 'center',
      autoWidth: true,
      perMove: 1, 
      pagination: true,
      arrows: false,
    });
    cards_splide.mount();
  }