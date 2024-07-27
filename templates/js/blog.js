// document.addEventListener('DOMContentLoaded', function() {
//     var items = document.querySelectorAll('.post-categories .item');
//     items.forEach(function(item) {
//         item.addEventListener('click', function() {
//             var cat_id = this.getAttribute('data-id');
//             var ajaxurl = "/wp-json/omg/v1/blogs";
            
//             api_call(ajaxurl)
//                 .then(function(data) {
//                     console.log(data);
//                 })
//                 .catch(function(error) {
//                     console.error('Error fetching data:', error);
//                 });
//         });
//     });
// });

// function api_call(ajaxurl) {
//     return fetch(ajaxurl, {
//         method: 'GET',
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(function(response) {
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.json();
//     })
//     .catch(function(error) {
//         console.error('Fetch error:', error);
//         throw error;
//     });
// }
