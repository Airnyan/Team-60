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

// Event listener for send message button
send.addEventListener("click",()=>renderUserMessage());

// Event listener for sending messages by pressing Enter key
txtInput.addEventListener("keyup",(event)=>{
    if (event.keyCode === 13){
        renderUserMessage();
    }
});


// Function for rendering messages
const renderUserMessage = () =>{
    const userInput= txtInput.value;
    renderMessageEle(userInput);
    // Clear the user message after sending
    txtInput.value="";
};

// Function for rendering message elements
const renderMessageEle = (txt)=> {
    const messageEle = document.createElement("div");
    // Adding Diasyui classes here
    messageEle.classList.add("chat", "chat-end");
    // Using innerHtml for nested html code
    messageEle.innerHTML = 
        // This code is same as the one used for the mock up earlier
       `<div class="chat-image avatar">
            <div class="w-10 rounded-full ring-2 ring-slate-200">
                <img alt="User Avatar" src="/images/user.png" />
            </div>
        </div>
        <div class="chat-bubble">${txt}</div>`;
    chatBody.append(messageEle);
};