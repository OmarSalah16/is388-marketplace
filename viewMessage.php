<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/ticket.js"></script>
    <style media="screen">
      .admin{
        border-style: solid;
        border-color: red;
        margin: 3px;
        padding: 3px;
      }
      .customer{
        border-style: solid;
        margin: 3px;
        padding: 3px;
      }
      .read{
        font-style: italic;
      }
      .unread{
        text-decoration: underline;
        font-weight: bold;
      }
      textarea{
        width: 400px;
        height: 300px;
      }
    </style>
  </head>
  <body onload="displayTicket()">
    <div id="error">

    </div>
    <div id="rTable"></div>
    <textarea id="content" name="content" placeholder="Enter your message..."></textarea> <br>
    <button type="button" onclick="sendResponse()">Send</button>
  </body>
</html>

<style media="screen">
*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.3)), url(pics/message1.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}
</style>
