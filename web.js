// JavaScript code for your habit tracker web application

document.addEventListener("DOMContentLoaded", function() {
    // Get all navigation links
    var navLinks = document.querySelectorAll("nav ul li a");

    // Add click event listener to each navigation link
    navLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent default link behavior
            
            var targetId = this.getAttribute("href").substring(1); // Get the target section id
            var targetSection = document.getElementById(targetId); // Get the target section
            
            // Hide all sections except the target section
            document.querySelectorAll("main > section").forEach(function(section) {
                if (section !== targetSection) {
                    section.style.display = "none";
                }
            });
            
            // Show the target section
            targetSection.style.display = "block";
        });
    });
});
