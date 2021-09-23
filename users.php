<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</style>

</head>
<body>

<header>

</header>

<center>

<div class="row">

  <div class="content">
    <h3>Users List</h3>
    <br>
    <br>
    <table class="table table-stripped">
      <thead>
        <tr>
          <th></th>  
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Email</th>
          <th scope="col">fname</th>
          <th scope="col">phone</th>

        </tr>
      </thead>

   <?php

     
     $i=0;
     
     $all_query = mysql_query("select * from admininfo ");
     
     while ($data = mysql_fetch_array($all_query)) {
       $i++;
       $pwd = hash('sha256',$data['password']);
     ?>
  <tbody>
     <tr>
        <td></td> 
       <td><?php echo $data['username']; ?></td>
       <td><?php echo $pwd; ?></td>
       <td><?php echo $data['email']; ?></td>
       <td><?php echo $data['fname']; ?></td>
       <td><?php echo $data['phone']; ?></td>
     </tr>
  </tbody>

     <?php 
          } 
              
      ?>
      
    </table>

  </div>

</div>

</center>

</body>
</html>
