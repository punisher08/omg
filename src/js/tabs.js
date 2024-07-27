
/**
 * Tabs
 */

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.tabs-header .item').forEach(tabs => {
      tabs.addEventListener('click', () => {
        update_tab_header();
        document.querySelectorAll('.tabs-header .item').forEach(item => {
          item.classList.remove('active');
        });
        tabs.classList.add('active');
        let tabId = tabs.getAttribute('data-tab');
        document.querySelectorAll('.tabs-content .tab').forEach(tab => {
          tab.classList.remove('active');
          if(tab.getAttribute('data-tab') == tabId) {
            tab.classList.add('active');
          }
        });
  
      });
      
    });
  });
  
  function update_tab_header(){
    document.querySelectorAll('.tabs-header .item').forEach(item => {
      item.classList.remove('active');
    });
  }
  
  