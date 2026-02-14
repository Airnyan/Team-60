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
    txtInput.focus();
});




// Button to close the chat window (Inside the chat-window header)
const innerCloseChatButton = document.getElementById("innerCloseChatButton");
    // Simliar logic to previous button
    innerCloseChatButton.addEventListener("click", event =>{
        // Although toggle function is not necessary here but it works so less work for me :)
        chatWindow.classList.toggle("hidden");
});




// Main Chatbot Body
const chatBody = document.getElementById("chatBody"); 
const txtInput = document.getElementById("txtInput");
const send = document.getElementById("send");
const loadIcon = document.getElementById("loadIcon");

// Event listener for send message button
send.addEventListener("click",()=>renderUserMessage());

// Event listener for sending messages by pressing Enter key
txtInput.addEventListener("keyup",(event)=>{
    if (event.code === "Enter"){
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
    // Loading Icon
    chatBody.append(loadIcon);
    toggleLoading(false);
    setTimeout(() => {
        renderChatbotResponse(userInput,"bot");
        setScrollPosition();
        toggleLoading(true);
    }, 800);
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

    const toggleLoading=(show)=>loadIcon.classList.toggle("hidden",show);
 



// Chatbot response functionality 
const getChatbotResponse = (userInput) => {
    // Filter user message
    let text = userInput.toLowerCase().replace(/[^\w\s\d]/gi, "");
    // Response logic
    if (text.includes("hello") || text.includes("hi") || text.includes("hola") || text.includes("hey") ) {
        return "Hi there!";
    }
    if (text.includes("how are you") || text.includes("how are things") ) {
        return "Pretty well, how are you?";
    }
    if (text.includes("what is going on") || text.includes("what is up") ) {
        return "Nothing much";
    }
    if (text.includes("happy") || text.includes("good") || text.includes("well") ) {
        return "Glad to hear it";
    }
    if (text.includes("bad") || text.includes("bored") || text.includes("sad") ) {
        return "Idk man, what do you want me do?";
    }
    if (text.includes("fuck") || text.includes("asshole") || text.includes("shutup")|| text.includes("clanker") ) {
        return "Bruh, what did I ever do to you????? 😭😭😭😭";
    }    
    if (text.includes("thanks") || text.includes("thank you")) {
        return "You're welcome";
    }
    if (text.includes("bye") || text.includes("good bye") || text.includes("goodbye") ) {
        return "See you later :)";
    }
    if (text.includes("contact") || text.includes("form") || text.includes("human")|| text.includes("agent")|| text.includes("support")) {
        return "Please head over to our Help page, and use the contact form to reach our customer service team.";
    }
    if (text.includes("help") ) {
        return "I would be glad to assist you with any issues you have.<br><br> Please simply type a keyword related to your problem.<br><br> If you need additional support, please reach out to our customer support team, and they will be able to help you. ";
    }    
    if (text.includes("faq") || text.includes("question") || text.includes("common") ) {
        return "Please head over to our Help page, the FAQ section covers most commonly asked questions!";
    }    
    if (text.includes("about") || text.includes("history") || text.includes("motto") ) {
        return "Please head over to our About page, to learn more about our company.";
    }
    if (text.includes("links") || text.includes("social") || text.includes("media") || text.includes("facebook")|| text.includes("tiktok")|| text.includes("instagram")) {
        return "Our social media links can accessed in the footer at the very bottom of the page.";
    }        
    if (text.includes("account") || text.includes("profile") || text.includes("personal") || text.includes("details") ) {
        return "Please head over to your Account page, to manage your profile and other related details.";
    }
    if (text.includes("order") || text.includes("status") || text.includes("track") || text.includes("history") || text.includes("shipping") || text.includes("delivery") ) {
        return "To track the status of your order or view your full order history, please head to your account page.";
    } 
     /*
    if (text.includes("") || text.includes("") || text.includes("") ) {
        return "Response Needed";
    }
    */ 
    else {
        return "Sorry, I didn't quite understand that. <br><br> Please try typing a keyword related to your problem.<br><br>If you need additional support, please reach out to our customer support team, and they will be able to help you.";
    }

};



// Auto scroll the chat
const setScrollPosition = () => {
    if (chatBody.scrollHeight > 0) {
        chatBody.scrollTop = chatBody.scrollHeight; 
    }
};