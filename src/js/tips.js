document.addEventListener('DOMContentLoaded', function() {
    var tips = document.querySelectorAll('#tips-accordion .item');
    tips.forEach(tip => {
        tip.querySelector('.toggle').addEventListener('click', function() {
            // tips.forEach(tip => {
            //     tip.classList.remove('active');
            // });
            tip.classList.toggle('active');
        });
    });
})