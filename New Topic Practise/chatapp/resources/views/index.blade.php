<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/app.css" />
</head>
<div class="container">
<body>
    
    <div class="app">
            <header>
                <h1> Chat Application</h1>
                <input type="text" name="username" id="username" placeholder="Enter username" >
            </header>
            <div id="messages"></div>
            <form id="message_form">
                <input type="text" name="message" id="message_input" placeholder="Enter message">
                <button type="submit" id="message_send">Send</button>
            </form>
    </div>
    <script src="./js/app.js"></script>
</body>
</div>
</html>