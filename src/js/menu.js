/**
 * Menu
 */
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.open-menu').addEventListener('click', () => {
      document.querySelector('.desktop-header').classList.toggle('active');
      document.body.classList.toggle('overflow-hidden');
    });
    document.querySelector('.close-menu').addEventListener('click', () => {
      document.body.classList.toggle('overflow-hidden');
      document.querySelector('.desktop-header').classList.toggle('active');
    });
    // Submenu dropdown
    let isClicked = false;
    document.querySelectorAll('.menu-item-has-children').forEach(menu => {
      menu.appendChild(document.createElement('span')).classList.add('submenu-toggle');
      let submenuIcon = menu.querySelector('.submenu-toggle');
      menu.querySelector('.submenu-toggle').innerHTML = '<img class="dropdown-icon" src="/wp-content/uploads/2024/07/chevron-down.svg" alt="dropdown icon" />';
      // hover effect
      submenuIcon.addEventListener('mouseover', (event) => {
        event.target.classList.toggle('active');
        closeAllSubmenu();
        // check if mobile
        if(window.innerWidth < 768) {
          // event.target.parentElement.parentElement.style.display = 'grid';
          // submenuIcon.style.display = 'none';
        }
        let parentLi = event.target.parentElement;
        let parentEl = event.target.parentElement.parentElement;
        let submenu = parentEl.querySelector('.submenu-container');
  
        if(!isClicked) {
          submenu.classList.add('active');
          parentLi.classList.add('active');
          isClicked = true;
        }else{
          submenu.classList.remove('active');
          parentLi.classList.remove('active');
          isClicked = false;
        }
      })
      // eo hover
      submenuIcon.addEventListener('click', (event) => {
        event.target.classList.toggle('active');
        closeAllSubmenu();
        // check if mobile
        if(window.innerWidth < 768) {
          // event.target.parentElement.parentElement.style.display = 'grid';
          // submenuIcon.style.display = 'none';
        }
        let parentEl = event.target.parentElement.parentElement;
        let submenu = parentEl.querySelector('.submenu-container');
      
        if(!isClicked) {
          submenu.classList.add('active');
          isClicked = true;
        }else{
          submenu.classList.remove('active');
          isClicked = false;
        }
      });
    });
    
    // Submenu
    document.querySelectorAll('.menu-item').forEach(menu => {
      menu.addEventListener('click', (event) => {;
        menu.classList.toggle('active');
        let submenu = menu.nextElementSibling;
        submenu.classList.toggle('active');
      });
    });
  });
  
  function closeAllSubmenu() {
    document.querySelectorAll('.submenu-container').forEach(submenu => {
      submenu.classList.remove('active');
    });
  
  }


  // check if scrolled down  and add class to the header

  window.addEventListener('scroll', function() {
    let header = document.querySelector('.desktop-header');
    let mobile_header = document.querySelector('.mobile-header');
    if(window.scrollY > 0) {
      header.classList.add('header-box-shadow');
      mobile_header.classList.add('header-box-shadow');
    }else{
      header.classList.remove('header-box-shadow');
      mobile_header.classList.remove('header-box-shadow');
    }
  }
  );