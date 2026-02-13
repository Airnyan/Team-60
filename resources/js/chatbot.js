/////////////////////////////////////////////////////////////////////////////////////////////////////////////


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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Button to close the chat window (Inside the chat-window header)
const innerCloseChatButton = document.getElementById("innerCloseChatButton");
    // Simliar logic to previous button
    innerCloseChatButton.addEventListener("click", event =>{
        // Although toggle function is not necessary here but it works so less work for me :)
        chatWindow.classList.toggle("hidden");
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Main Chatbot Body
// Declaring variables 
const chatBody = document.getElementById("chatBody"); // Fixed the typo here
const txtInput = document.getElementById("txtInput");
const send = document.getElementById("send");

// Event listener for send message button with an function
send.addEventListener("click",()=>renderUserMessage());

// Function for rendering messages
const renderUserMessage = () =>{
    const userInput= txtInput.value;
    renderMessageEle(userInput);
};

// Function for rendering message elements
const renderMessageEle = (txt)=> {
    const messageEle = document.createElement("div");
    const txtNode=document.createTextNode(txt);
    messageEle.classList.add("user-message");
    messageEle.append(txtNode);
    chatBody.append(messageEle);
};