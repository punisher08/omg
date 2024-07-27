document.addEventListener('DOMContentLoaded', function() {
    let form_file_upload_element = document.querySelector('#field_9_8 .ginput_container_fileupload');
    let img = form_file_upload_element.appendChild(document.createElement('img'));
    img.src = '/wp-content/uploads/2024/07/upload-01.svg';
    let title = form_file_upload_element.appendChild(document.createElement('p'));
    title.innerHTML = 'Choose a File';
})