// This file will handle respones of the chatbot for user
// Using window global variable so chatbot.js file can access it
window.responseObj = {
  hello: "Hey ! How are you doing ?",
  hey: "Hey! What's Up",
  today: new Date().toDateString(),
  time: new Date().toLocaleTimeString(),
};