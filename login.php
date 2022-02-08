<?php require_once('connect.php'); ?>
<?php
if(isset($_SESSION['uid'])){
       $uid = $_SESSION['uid'];
	   sleep(3);
	   header("Location: user-panel.php");
   }

   ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                text-align: center;
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background:   linear-gradient(135deg ,#71b7e6, #9b59b6);
	}
    .main{
	width: 320px;
	height: 260px;
	background: red;
	overflow: hidden;
	background: linear-gradient(135deg ,#71b7e6, #9b59b6);
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
	border: 2px;
}

input{
	width: 60%;
	height: 15px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #573b8a;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
.log{
    color: #fff;
    font-weight: bold;
    font-size: 22px;

}

        </style>

        <title> Login</title>
        <body>
          
            <div class="main">
                <div class="log"><p>Login</p></div>
				<?php
				   if(isset($_SESSION['error'])){
					   $err = $_SESSION['error'];
					   unset($_POST['err']);
					   echo $err;
				   }
				?>
                
<form class="login" action="logback.php" method="post">

    <input type="text" name="userid" placeholder="user name" required="">
    <input type="Password" name="pwd" id="pwd" placeholder="Password" required="">
    <div class="submit">
        <button name="login" type="submit">Login</button>
    </div>
</form>
</div>



        </body>
    </head>
</html>