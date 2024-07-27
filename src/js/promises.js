/**
 * Our Promises
 */
if(document.querySelector('.our-promises')) {
  console.log('Our Promises');
    var isMobile = window.innerWidth < 768;
    var promises_splide = new Splide('.our-promises', {
      type: 'loop',
      padding   :  {left: '0%', right: '5%' },
      focus: 'center',
      autoWidth: true,
      perMove: 3, 
      pagination: false,
      arrows: false,
    });
    promises_splide.mount();
  }
  