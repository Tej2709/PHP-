require('./bootstrap');
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
const{default:axios} = require('axios');
const message_el =document.getElementById("messages");
const username_input = document.getElementById("username");
const message_input= document.getElementById("message_input");
const message_form = document.getElementById("message_form");


message_form.addEventListener('submit', function (e)
{
    e.preventDefault();
    let has_error = false;
    if(username.value =="")
    {
        alert("Please enter a username");
        has_error = true;
    }

    if(message_input.value == "")
    {
        alert("Please enter a message");
        has_error = true;
    }

    if(has_error)
    {
        return;
    }


    const options= {
        method:'post',
        url :'send-message',
        data:{
            username: username.value,
            message:message_input.value
        }
    }

    axios(options);
});


window.Echo.channel('chat')
    .listen('.message',(e)=>{
        messages_el.innerHTML +='<div class="message"><strong>' + e.username + ':</strong>' + e.message + '</div>';

    });