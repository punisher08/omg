/**
 * Testimonials
 */
if(document.querySelector('#testimonial-slider')) {
    var isMobile = window.innerWidth < 768;
    var testimonials_splide = new Splide('#testimonial-slider', {
      type: 'loop',
      padding   : isMobile ? { left: '0%', right: '5%' } : { left: '10%', right: '10%' },
      focus: 'center',
      autoWidth: true,
      perMove: 1, 
      pagination: false,
      arrows: false,
    });
   
  }
  
/**
 * Services
 */
if(document.querySelector('#services-slider')) {
  var isMobile = window.innerWidth < 768;
  var services_splide = new Splide('#services-slider', {
    type: 'loop',
    padding   : { left: '0%', right: '10%' },
    focus: 'center',
    autoWidth: true,
    perMove: 1, 
    pagination: true,
    arrows: false,
  });
  services_splide.mount();
}
/**
 * Trusted Experts
 */
if(document.querySelector('#trusted-by-experts-slider')) {
  var isMobile = window.innerWidth < 768;
  var experts_splide = new Splide('#trusted-by-experts-slider', {
    type: 'loop',
    padding   : { left: '0%', right: '10%' },
    focus: 'center',
    autoWidth: true,
    perMove: 1, 
    pagination: true,
    arrows: false,
  });
 
}



try {
  testimonials_splide.sync(services_splide);
  testimonials_splide.sync(experts_splide);
  testimonials_splide.mount();
  experts_splide.mount();

} catch (error) {
  
}