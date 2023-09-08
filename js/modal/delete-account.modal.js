document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".trigger-click");
    
    deleteButtons.forEach(deleteButton => {
        const userId = deleteButton.getAttribute("data-userid");
        const overlay = document.querySelector("#overlay-" + userId);
        const closeButton = overlay.querySelector(".close-delete-account");
        console.log("userID :" + userId);

        deleteButton.addEventListener("click", function(event) {
            event.preventDefault(); 
            overlay.style.display = "block"; // Show the overlay
            overlay.querySelector(".modal-delete-container").style.display = "block"; // Show the modal container
            console.log("Modal shown for user ID: " + userId); // Add this line for debugging
        });

        closeButton.addEventListener("click", function() {
            overlay.style.display = "none"; // Hide the overlay
            overlay.querySelector(".modal-delete-container").style.display = "none"; // Hide the modal container
            console.log("Modal closed for user ID: " + userId); // Add this line for debugging
        });

    });
});