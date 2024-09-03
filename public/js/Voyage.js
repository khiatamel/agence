function openTab(tabName) {
    var i, tabcontent, tabbuttons;

    // Hide all tab content
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove active class from all buttons
    tabbuttons = document.getElementsByClassName("tab-button");
    for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
    }

    // Show the selected tab content and set the active button
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
}

// Default to showing the first tab
document.getElementById("presentation").style.display = "block";
