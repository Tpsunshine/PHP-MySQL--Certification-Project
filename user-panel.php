<?php require_once('Admin/php/connection.php') ?>
<?php require_once('Admin/php/session.php');  ?>
<?php
   if(isset($_SESSION['uid'])){
       $uid = $_SESSION['uid'];
   }
   else{
       header("Location: index.html");
   }
?>
<!DOCTYPE html>
<head>

    <title >Yadav & Raj Co.</title>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="userpanel.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    
            
        <body>
            <section id="banner">
                
                <div class="banner-text">
                   <h1>YADAV & RAJ CO.<br></h1>
                    <p class="cold" style="font-size: 60px; font-weight: bold;">COLD STORAGE</p>
                   <p>KEEP YOUR LIFE COOL WITH US</p>
                   <div class="banner-btn">
                       
                   </div>
                </div>
            </section>
            <div id="sideNav">
                <nav>
                    <ul>
                        <li><a href="#banner">HOME</a></li>
                         <li><a href="#feature">ABOUT US</a></li>
                          <li><a href="#service">SERVICES</a></li>
                           <li><a href="#testimonial">OUR CLIENTS</a></li>
                            <li><a href="#footer">CONTACT US</a></li>
                            <li><a href="logout.php" class="signup">Logout</a></li>
                    </ul>
                </nav>
            </div>
            
            
            <!--Features-->
            <div class="container-fluid py-2" style="background-color:lightblue">
        <section class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="app-stats text-center mt-3"
                        style="color:black;font-family: 'Times New Roman', Times, serif;">Available Storages</h2>
                    <div class=" table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead bg-dark" style="color:white;">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Cost/Item</th>
                                    <th>Available Quantity</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <?php
                       global $connection;
                       $sql="SELECT * FROM Storage";
                       $stmt=$connection->query($sql);
                       while($Datarows = $stmt->fetch_assoc())
                       {
                           $id          = $Datarows["s_id"];
                           $Sname = $Datarows['name'];
                           $storage     = $Datarows["img_path"];
                           $CostItem    = $Datarows["cost"];
                           $qty         = $Datarows["quantity"];
                           $re = $Datarows['remains'];
                           
                    ?>
                            <tbody class="tbody">
                                <tr>
                                    <td><img src="Admin/<?php  echo $storage;?>" width="150px" height="70px"></td>

                                    <td> <?php echo  $Sname;      ?></td>
                                    <td> <?php echo  $CostItem; ?></td>

                                    <td> <?php echo  $re;    ?></td>

                                    <td>
                                        <a href="bookStorage.php?sid=<?php echo $id; ?>&uid=<?php echo $uid; ?>" class="btn btn-success">Book</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
           
            
        <!--Service-->
      
         
    <div class="container-fluid py-2" style="background-color:lightcoral">
        <section class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="app-stats text-center mt-3"
                        style="color:black;font-family: 'Times New Roman', Times, serif;">My Bookings</h2>
                    <div class=" table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead bg-dark" style="color:white;">
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Storage Name</th>
                                    <th>Cost/Item</th>
                                    <th>Purchased Quantity</th>
                                    <th>Total Cost</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <?php
                       global $connection;
                       $sql="SELECT * FROM Orders WHERE u_id='$uid'";
                       $stmt=$connection->query($sql);
                       while($Datarows = $stmt->fetch_assoc())
                       {   $sid = $Datarows['s_id'];
                           $sql1="SELECT * FROM Storage WHERE s_id='$sid'";
                           $stmt1=$connection->query($sql1);
                           while($Datarows1 = $stmt1->fetch_assoc()){
                               $Sname1 = $Datarows1['name'];
                               $Scost1 = $Datarows1['cost'];
                           }
                           $bid          = $Datarows["booking_id"];
                         
                           $qty1         = $Datarows["item_quantity"];
                           $Bcost = $Scost1*$qty1;
                           $odate = $Datarows['order_date'];
                           $edate = $Datarows['end_date'];
                           
                    ?>
                            <tbody class="tbody">
                                <tr>
                                    <td> <?php echo  $bid;      ?></td>
                                    <td><a href="bookStorage.php?sid=<?php echo $sid; ?>&uid=<?php echo $uid; ?>" style="text-decoration:none;color:blue"><?php echo  $Sname1; ?></a></td>
                                    <td> <?php echo  $Scost1; ?></td>
                                    <td> <?php echo  $qty1;    ?></td>
                                    <td> <?php echo  $Bcost;    ?></td>
                                    <td> <?php echo  $odate;    ?></td>
                                    <td> <?php echo  $edate;    ?></td>

                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
                   
        </body>

        <footer class="footer">
  <div class="footer-left col-md-4 col-sm-6">
      <h3>YADAV & Raj Co.</h3> <p class="about">KEEP YOUR LIFE COOL WITH US </p>
    <div class="icons">
      <a href="https://www.facebook.com"  target="_blank"><i class="fa fa-facebook"></i></a>
      <a href="https://www.twitter.com"  target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="https://www.linkedin.com"  target="_blank"><i class="fa fa-linkedin"></i></a>
      <a href="https://www.google-plus.com"  target="_blank"><i class="fa fa-google-plus"></i></a>
      <a href="https://www.instagram.com"  target="_blank"><i class="fa fa-instagram"></i></a>
    </div>
  </div>
  <div class="footer-center col-md-4 col-sm-6">
    <div>
      <i class="fa fa-map-marker"></i>
      <p><span>91springboard, MG Road</span> Bengaluru,Karnataka, INDIA</p>
    </div>
    <div>
      <i class="fa fa-phone"></i>
      <p>+91 971600xxxx</p>
      <p>+91 827744xxxx</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="#">anish@gmail.com ,</a></p>
      <p><a href="#">shwetasuman@gmail.com</a></p>
    </div>
  </div>
  <div class="footer-right col-md-4 col-sm-6">
    <b>YADAV & RAJ</b>
    <p class="menu">
      <a href="project_constr.html"> Home</a> 
      <a href=""> About Us</a> 
      <a href="Carrier.html"> Carriers</a> 
      <a href="notices.html"> Notice</a> 
      <a href="#"> Contact</a>
    </p>
    <p class="name">YADAV & RAJ &Copyrigt: 2019</p>
  </div>
</footer>
<div class="fixed">

<span class="bn"><a href="">Notice<a></span>
    </div>

    </html>