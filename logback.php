<?php require_once('Admin/php/connection.php');  ?>
<?php require_once('Admin/php/session.php');  ?>
<?php

   
   if(isset($_POST['login'])){
       $username=$_POST['userid'];
       $pass = $_POST['pwd'];
       $sql = "SELECT * FROM Users WHERE username='$username' AND password='$pass'";
       $result = $connection->query($sql);
       $num = $result->num_rows;
       $row=$result->fetch_assoc();
       $uid = $row['u_id'];
       if($num>0){
           $_SESSION['uid'] = $uid;
            header("Location: user-panel.php");
       }
       else{
           $_SESSION['error']='Please Signup first';
           header("Location: sign1.php");
       }

   }
?>