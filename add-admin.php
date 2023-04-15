<?php
$conn = new mysqli("localhost", "root", "","onlinefoodorder");

//start session
session_start();

//define the variable
define('SITEURL','http://localhost/demo/');

?>
<html>
  <head>
    <title> NV-Add Admin</title>
    <style>
*{
margin: 0;
padding: 0;
font-family:arial,Helvelica,sans-serif; 
}

.wrapper{
padding: 1%;
width: 80%;
margin: 0 auto;
}  

.text-center{
text-align: center;
}

.clearfix{
float: none;
clear: both;
}


.btn-primary{
background-color: #ED4C67 ;
padding: 1%;
color: white;
text-decoration: none;
font-width: bold;
}

.btn-primary:hover{
background-color: #833471 ;
}

.tbl-30{
width: 30%;
}



/* css for Menu */
.menu{
border-bottom: 1px solid grey;
}

.menu ul{
list-style-type:none;
}

.menu ul li{
display: inline;
padding: 1%;
}

.menu ul li a{
text-decoration: none;
font-weight: bold;
color: #ED4C67;
}

.menu ul li a:hover{
color: #be2edd;
}

/* css for main content*/
.main-content{
background-color: #95afc0;
padding: 3% 0;
}

.col-4{
width: 18%;
background-color: white;
margin: 1%;
padding: 2%;
float: left;
}

/* css for footer */
.footer{
background-color: #ED4C67;
color: white;
}
    </style>
  </head>
 <body>
    <!--menu section starts-->
      <div class="menu text-center">
        <div class="wrapper">
          <ul>
            <li><a href="main.php">Home</a></li>
            <li><a href="manage_admin.php">Admin</a></li>
            <li><a href="manage_category.php">Category</a></li>
            <li><a href="manage_food.php">Food</a></li>
            <li><a href="manage_order.php">order</a></li>

         </div>
      </div>  
    <!--menu section ends-->



<!--main content section starts-->
      <div class="main-content">
         <div class="wrapper">
           <h1>ADD ADMIN</h1>
           </br></br>
           <?php
           if(isset($_SESSION['add'])) //checking whether the session is set or not
            {
              echo $_SESSION['add']; //displaying the session message if set
              unset($_SESSION['add']); //remove session message
            }
           ?>


           <form action= "" method="POST">
             <table class="tbl-30">
               <tr>
                 <td>Full Name: </td>
                 <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
               </tr>

               <tr>
                 <td>Username</td>
                 <td><input type="text" name="username" placeholder="Your Username">
                 </td>
               </tr>

               <tr>
                 <td>password</td>
                 <td><input type="password" name="password" placeholder="Your Password">
                 </td>
               </tr>
          
               <tr>
                 <td colspan="2">
                 <input type="submit" name="submit" value="Add Admin" class="btn-primary"></td>
               </tr>
             </table>
         </div>
      </div>





<!--footer section starts-->

      <div class="footer">
         <div class="wrapper">
           <p class="text-center">2022 All rights reserved,Developed By Nagavarshini </p>
        
         </div>
      </div>
    <!--footer section ends-->


<?php

if(isset($_POST['submit']))
{

//Get the Data from form

 $full_name = $_POST['full_name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']);//password encrypted

//SQL Query to save the data into dataBase

 $sql = "INSERT INTO tbl_admin SET
   full_name='$full_name',
   username='$username',
   password='$password'
 ";

//Executing Query and saving Data into db
 $res = mysqli_query($conn, $sql) or die(mysqli_error());

//check whether the (query is inserted)data is inserted or not and display appropriate message
if($res==TRUE)
{
//data inserted
//echo "Data inserted"; 
//create a session variable to display message
$_SESSION['add'] = "Admin Added Successfully";
//redirect page to manage admin
header("location:".SITEURL.'manage_admin.php');
}

else
{
//failed to insert data
//echo "Fail to insert data";
//create a session variable to display message
$_SESSION['add'] = "Failed to add Admin";
//redirect page to add admin
header("location:".SITEURL.'add_admin.php');

}

}


   

?>

</body>
</html>