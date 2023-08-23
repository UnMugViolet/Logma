import errorMessageMap from './mapping.error.js';

// Get the error parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const errorParam = urlParams.get('error');
console.log(errorParam);

// Check if the error parameter is not "none" or is not empty
if (errorParam !== 'none' && urlParams.toString() !== "") {
    // Retrieve the corresponding error message from the mapping
    const errorMessage = errorMessageMap[errorParam] || errorMessageMap.default;

    // Display the modal with the error message
    const modal = document.getElementById('errorModal');
    const modalText = document.getElementById('modalText');

    modalText.textContent = errorMessage;
    modal.style.display = 'block';

    const closeButton = modal.querySelector('.close');
    closeButton.onclick = function() {
        modal.style.display = 'none';
    };


    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
}

