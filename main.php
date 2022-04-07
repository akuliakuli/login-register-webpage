<?php
    include "includes/autoload.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<header>
    <h1>Register</h1>
    <ul>
        <li>SIGN UP</li>
        <li>LOGIN</li>
    </ul>
</div>
</header>
<main>
    <div class ="main-text">
    <img src ="img/some.png">
    <p class ="main-text-lorem">praesentium perspiciatis fugit dolore, magnam suscipit optio quo delectus.</p>
</div>
    <P>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos odio quod officia! Qui, quidem delectus!</P>
</main>
<div class ="signups">
    <form class ="sign" method="POST" action="includes/login.inc.php">
            <h1>SIGN UP</h1>
            <input type ="text" placeholder="type your name" name ="name">
            <input type ="password" placeholder="type password"  name ="psw">
            <button type ="submit" name = "submit" class ="submit">SUBMIT</button>
    </form>
    <form class ="sign" method = "POST" action = "main.php">
        <h1>REGISTER</h1>
        <input type ="text" placeholder="type your name"  name ="name">
        <input type ="password" placeholder="type password"  name ="psw">
        <input type ="password" placeholder="repeat password"  name ="pswrep">
        <input type ="email" placeholder="type your email"  name ="email">
        <button type ="submit" name = "submit" class ="submit">SUBMIT</button>
</form>
<?php
    $s = new Signupcontr();
    $s ->register($_POST['name'],$_POST['psw'],$_POST['email'])
?>
</div>
<footer>
        <p>Some text</p>

</footer>
</body>
</html>