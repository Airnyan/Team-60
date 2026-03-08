const accessibiltyButton = document.getElementById("accessibiltyButton");
const accessibiltyWindow = document.getElementById("accessibiltyWindow");
const headerCloseButton = document.getElementById("headerCloseButton");
const largeTextButton = document.getElementById("largeTextButton");
const fontChangeButton = document.getElementById("fontChangeButton");
const htmltag = document.documentElement;


// Uses the same code as the chatbutton and chatwindow
accessibiltyButton.addEventListener("click", event => {
    accessibiltyWindow.classList.toggle("hidden");
});

// To close the accessibiltyWindow (using the header button)
headerCloseButton.addEventListener("click", event =>{
    accessibiltyWindow.classList.toggle("hidden");
});


// LARGE TEXT BUTTON
// Apply tailwind class to the html tag
largeTextButton.addEventListener("click", event => {
    htmltag.classList.toggle("text-[120%]");

    // Using the localStorage JS object to store font size
    if (htmltag.classList.contains("text-[120%]")) {
        // localStorage.setItem('keyName', 'value')
        localStorage.setItem('textSize', 'large');
    } 
    // If not selected remove the key
    else {
        localStorage.removeItem('textSize');
    }

});

// Checks if the localStroage has "large" value to apply it on every page
if (localStorage.getItem('textSize') === 'large') {
    htmltag.classList.add("text-[120%]");
    largeTextButton.checked = true;
}


// FONT CHANGE BUTTON
// Apply tailwind class to the html tag
fontChangeButton.addEventListener("click", event => {
    htmltag.classList.toggle("dyslexia-font");

    // Using the localStorage JS object to store font size
    if (htmltag.classList.contains("dyslexia-font")) {
        // localStorage.setItem('keyName', 'value')
        localStorage.setItem('fontChange', 'yes');
    } 
    // If not selected remove the key
    else {
        localStorage.removeItem('fontChange');
    }

});

// Checks if the localStroage has "large" value to apply it on every page
if (localStorage.getItem('fontChange') === 'yes') {
    htmltag.classList.add("dyslexia-font");
    fontChangeButton.checked = true;
}



