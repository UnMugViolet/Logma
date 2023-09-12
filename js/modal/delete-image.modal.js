document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".delete-cta");

    deleteButtons.forEach(deleteButton => {
        const imageFilename = deleteButton.getAttribute("data-image");
        const overlay = document.getElementById("overlay-" + imageFilename);
        const closeButton = overlay.querySelector(".close-delete-account");

        deleteButton.addEventListener("click", function(event) {
            event.preventDefault();
            overlay.style.display = "block";
            overlay.querySelector(".modal-delete-container").style.display = "block";
        });

        closeButton.addEventListener("click", function() {
            overlay.style.display = "none"; 
            overlay.querySelector(".modal-delete-container").style.display = "none";
        });
    });
});