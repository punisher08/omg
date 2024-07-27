/**
 * Accordion
 */
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.accordion').forEach(accordion => {
      accordion.querySelectorAll('._card-action').forEach(item => {
        item.addEventListener('click', () => {
          accordion.classList.toggle('active');
        });
      });
  });
});