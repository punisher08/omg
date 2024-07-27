/**
 * Full Services
 */
if(document.querySelector('#full-services-slider')) {
   
    var isMobile = window.innerWidth < 768;
    var full_services_splide = new Splide('#full-services-slider', {
      type: 'loop',
      padding   : { left: '0%', right: '15%' },
      focus: 'center',
      autoWidth: true,
      perMove: 1, 
      pagination: true,
      arrows: false,
    });
    full_services_splide.mount();
  }
