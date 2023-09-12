document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".trigger-click");
    
    deleteButtons.forEach(deleteButton => {
        const userId = deleteButton.getAttribute("data-userid");
        const overlay = document.querySelector("#overlay-" + userId);
        const closeButton = overlay.querySelector(".close-delete-account");


        deleteButton.addEventListener("click", function(event) {
            event.preventDefault(); 
            overlay.style.display = "block"; // Show the overlay
            overlay.querySelector(".modal-delete-container").style.display = "block"; // Show the modal container
        });

        closeButton.addEventListener("click", function() {
            overlay.style.display = "none"; // Hide the overlay
            overlay.querySelector(".modal-delete-container").style.display = "none"; // Hide the modal container
        });

    });
});