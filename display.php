<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
<table class="table">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Area of interest</th>
      <th scope="col">file upload</th>
      <th scope="col"> E-mail Address</th>
      <th scope="col">country</th>
      <th scope="col">state</th>
      <th scope="col">city</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <?php
  include 'conn.php';
  $query="SELECT * FROM mumbai";
  $result=mysqli_query($conn,$query);
  while($res=mysqli_fetch_array($result)){

  ?>
  <tbody>
    <tr>
    <td><?php echo $res['ID']?></td>
      <td><?php echo $res['yourname']?></td>
      <td><?php echo $res['yourage']?></td>
      <td><?php echo $res['yourgender']?></td>
      <td><?php echo $res['yourarea']?></td>
      <td><?php echo $res['yourfile']?></td>
      <td><?php echo $res['youraddress']?></td>
      
      <td>
      <?php $query2="SELECT * FROM country WHERE id='".$res['yourcountry']."'";
      
       $result2=mysqli_query($conn,$query2);
       while($res1=mysqli_fetch_array($result2)){
       echo $res1['country_name'];
       }
      ?>
     </td>
      <td>  <?php $query4="SELECT * FROM state WHERE id='".$res['yourstate']."'";
      
      $result4=mysqli_query($conn,$query4);
      while($res3=mysqli_fetch_array($result4)){
      echo $res3['state_name'];
      }
     ?></td>
      <td>  <?php $query3="SELECT * FROM city WHERE id='".$res['yourcity']."'";
      
      $result3=mysqli_query($conn,$query3);
      while($res2=mysqli_fetch_array($result3)){
      echo $res2['city_name'];
      }
     ?></td>
      
      <td><a href="update.php?id=<?php echo $res['ID']?>"> <input="button" class="btn btn-primary" > update</a></td>
      <td><a href="delete.php?id=<?php echo $res['ID']?>"> <input="button" class="btn btn-primary" > DELETE</a></td>
    </tr>
    
  </tbody>
  <?php  } ?>
</table>
</div>
</div>
</div>
</body>
</html>