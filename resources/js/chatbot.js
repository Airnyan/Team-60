
// Button to show/hide chat window
const chatButton = document.getElementById("chatButton");
const chatWindow = document.getElementById("chatWindow");

// Event listener for the button
// (e) is same as "event". Both are variable name for an event object.
chatButton.addEventListener("click", event => {
    // ClassList returns the list of classes assoicated with the element
    // Toggle is JS function. 
        // It checks if the list contains the word "hidden".
        // If yes it removes, if no it adds it.
    chatWindow.classList.toggle("hidden");
});




// Button close the chat window (Inside the chat-window header)
const innerCloseChatButton = document.getElementById("innerCloseChatButton");
    // Simliar logic to previous button
    innerCloseChatButton.addEventListener("click", event =>{
        // Although toggle is not necessary here but it works so less work for me :)
        chatWindow.classList.toggle("hidden");
});