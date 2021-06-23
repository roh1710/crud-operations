<?php
include 'conn.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$nickname=$_POST['nickname'];
$image=$_FILES['file'];
$filename=$image['name'];
$filepath=$image['tmp_name'];
$fileerror=$image['error'];
$designation=$_POST['designation'];
$dob=$_POST['dob'];
$field=$_POST['field'];
$gender=$_POST['gender'];

if($fileerror==0){
  $dest_file='uploads/'.$filename;
  move_uploaded_file($filepath,$dest_file);


    $query="INSERT INTO `crud_php` (`id`, `username`, `nickname`, `image`, `designation`, `dob`, `field`, `gender`) VALUES (NULL, '$username', '$nickname','$dest_file', '$designation', '$dob', '$field', '$gender')";

    $sql=mysqli_query($con,$query);
}
if($sql){
  echo "done";
}
else{
  echo "failed";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  border-radius:50px;
}

input{
  border: 1px solid #ddd;
  border-radius:5px;
  padding: 2px;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

}
h1{
    text-align: center;
    margin-top: 10px;
    float:left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color:black;
    margin-left: 40%;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr{
    justify-content: space-around;
}

tr:nth-child(even){background-color: #FFFFFF;
color:black;}
tr:nth-child(odd){background-color: #100F0F;
color: #fff;
}
</style>
</head>
<body>
  <table>
    <form method="post" enctype="multipart/form-data">
      <div class="card"> 
        <div class="card-header">
            <h1> Add a new Cadet</h1>
        </div>
        <tr><th><label>Username</label></th>
        <td><input type="text" name="username" ></td></tr>
        <tr><th><label>Nickname</label></th>
        <td><input type="text" name="nickname" ></td></tr>
        <tr><th><label>Designation</label></th>
        <td><input type="text" name="designation" ></td></tr>
        <tr><th><label>Dob</label></th>
        <td><input type="date" name="dob" value="2021-05-24"
       min="1988-01-01" max="2001-12-31" ></td></tr>
       <tr><th><label>Feild</label></th>
  <td><select id="field" name="field">
    <option value="Computer Science">CSE</option>
    <option value="Electronics">ECE</option>
    <option value="Mechanical">ME</option>
    <option value="Autmobile">Automobile</option>
  </select>
</td>
  </tr>
  <tr><th><label for="profile">Upload a profile photo : </label></th>
  <td><input type="file" name="file" ></td>
  </tr>
        <tr><th><label>Gender</label></th>
        <td><input type="radio" id="male" name="gender" value="male">
       <label for="male">Male</label>
       <input type="radio" id="female" name="gender" value="female">
       <label for="female">Female</label>
       <input type="radio" id="other" name="gender" value="other">
       <label for="other">Other</label></td></tr>
      <tr><th colspan="2" style="text-align:center"><input type="submit" name="submit" value="Submit"></th></tr>
    </form>
  </table>
</body>
</html>