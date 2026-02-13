
// Button to show/hide chat window
const chatButton = document.getElementById("chatButton");
const chatWindow = document.getElementById("chatWindow");

// Event listener forthe button
// (e) is same as "event". Both are variable name for an event object.
chatButton.addEventListener("click", event => {

    // ClassList help
    chatWindow.classList.toggle("hidden");

});