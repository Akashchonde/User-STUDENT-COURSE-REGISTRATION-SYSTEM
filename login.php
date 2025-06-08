<!Doctype html>
<html>
<head>
     <meta charset="uft-8">
     <meta name="viewport" content="width=device-width,initial-scale=1">
     
     <link rel="stylesheet" type="text/css"href="login-style.css"> 

     <title>Login By Cyber Warriors</title>
     </head>

    <body>
   
    <div class ="center">
        <h1> login</h1>
     <form>

        <div class ="form">
            <input type="text" name="username" class="textfiled" placeholder="username">
            <input type="password" name="password" class="textfiled" placeholder="password">
       
            <div class="forgetpass"><a href="#" class="link" onclick="message()" >Forget password ?</a></div>

            <input type="submit" name="login" value="Login" class="btn">

            <div class="signup">New Member? <a href="#" class="link">signup Here</a></div>
        </div>
    </div>
    </form>

    
    <script>
        function message()
        {
            alert("Toh password yad karo");
        }
        </script>


</body>

</html>


<?php
 include("connection.php");

 if (if ($_POST['login']))
 {
    $username=$_POST['username'];
 }
?>
