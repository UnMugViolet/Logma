// Hide and display on triggered 
const triggerElement = document.getElementById('trigger');
const hiddenElement = document.getElementById('hidden');

// Show the element when the trigger element is clicked
triggerElement.addEventListener('click', function() {
    if (hidden.style.display === 'none') {
        hidden.style.display = 'block';
        hidden.style.marginBottom  = '10px';
        setTimeout(() => {
            hidden.style.opacity = '1';
        }, 10);
    }
});

// Hide the element when there's a click outside
document.body.addEventListener('click', function(event) {
    if (!triggerElement.contains(event.target) && !hiddenElement.contains(event.target)) {
        hidden.style.opacity = '0';
        setTimeout(() => {
            hidden.style.display = 'none';
        }, 300);
    }
});