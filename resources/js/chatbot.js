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




// Button to close the chat window (Inside the chat-window header)
const innerCloseChatButton = document.getElementById("innerCloseChatButton");
    // Simliar logic to previous button
    innerCloseChatButton.addEventListener("click", event =>{
        // Although toggle function is not necessary here but it works so less work for me :)
        chatWindow.classList.toggle("hidden");
});




// Main Chatbot Body
// Declaring variables 
const chatBody = document.getElementById("chatBody"); 
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
    renderMessageEle(userInput,"user");
    // Clear the user message after sending
    txtInput.value="";
    // Chatbot wait before responding
    setTimeout(() => {
        renderChatbotResponse(userInput,"bot");
        setScrollPosition();
    }, 600);
};

// Function for rendering chatbot messages 
const renderChatbotResponse = (userInput) => {
    const res = getChatbotResponse(userInput);
    renderMessageEle(res);
};


// Function for rendering user messages 
const renderMessageEle = (txt, type) => {
    const messageEle = document.createElement("div");

    if(type !== "user") {
        messageEle.classList.add("chat", "chat-start", "chatbot-message");
        // Html code copy pasted from the mock version
        // JS literal
        messageEle.innerHTML =`
        <div class="chat-image avatar">
            <div class="w-10 rounded-full ring-2 ring-slate-200">
                <img alt="Chatbot Avatar" src="/images/chatbot.png" />
            </div>
        </div>
        <div class="chat-bubble">${txt}</div>
        `;}

     else {
        messageEle.classList.add("chat", "chat-end", "user-message");
        // Html code copy pasted from the mock version
        // JS literal
        messageEle.innerHTML =`
        <div class="chat-image avatar">
                <div class="w-10 rounded-full ring-2 ring-slate-200">
                    <img src="/images/user.png" />
                </div>
            </div>
            <div class="chat-bubble">${txt}</div>
        `;}

        chatBody.append(messageEle);
    };


// Chatbot response functionality 
const getChatbotResponse = (userInput) => {
    return responseObj[userInput] == undefined
    ? "Please try something else"
    : responseObj[userInput];
};


// Auto scroll the chat
const setScrollPosition = () => {
    if (chatBody.scrollHeight > 0) {
        chatBody.scrollTop = chatBody.scrollHeight; 
    }
};