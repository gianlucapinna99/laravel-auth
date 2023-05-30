import './bootstrap';
import '~resources/scss/app.scss';
import "bootstrap-icons/font/bootstrap-icons.css";
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const projectForm = document.querySelector('project-form');

if (projectForm) {
    const imageRemovedInput = document.getElementById('remove-img-input');
    const imageRemovedMessage = document.getElementById('img-removed-message');
    const imageRemovedButton = document.getElementById('remove-img-btn');

    imageRemovedButton.addEventListener('click', removePreviousImage);

    function removePreviousImage() {
        imageRemovedMessage.classList.toggle('d-none', false);
        imageRemovedMessage.classList.toggle('d-block', true);

        imageRemovedButton.classList.add('d-none');

        imageRemovedInput.value = 'true';
    }
}
