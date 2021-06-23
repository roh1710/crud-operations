<?php
include 'conn.php';


  
   
    if(count($_POST)!=0)

{
 

  $check=implode(',',$_POST['field']);
  extract($_POST);
  $file=$_FILES["file"] ["name"];
  $tmp_name=$_FILES["file"] ["tmp_name"];
  $path="now/".$file;
  move_uploaded_file($tmp_name,$path);

  $new="SELECT * FROM mumbai WHERE youraddress='$address'";
  $old=mysqli_query($conn,$new);
  if(mysqli_num_rows ($old)>0){
    echo "email is already use";
  }
  else{
$query="INSERT INTO mumbai (yourname,yourage,yourgender,yourarea,yourfile,youraddress,yourcountry,yourstate,yourcity) VALUES ('$name','$age','$gender','$check','$file','$address','$country','$state','$city')";
  
  $result=mysqli_query($conn,$query);
  
  if($result==true)
  {
    echo "record inserted";
  }
  else{
    echo "failed";
  
}
  }


}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>crud</title>
    <script type="text/javascript">
function validate() {
 var name = document.forms["myform"]["name"].value;
 if(name==""){
 alert("Please enter the name");
 return false;
 }
 var address = document.forms["myform"]["address"].value;
 if(address==""){
 alert("Please enter the email");
 return false;
 }else{
 var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
 var x=re.test(address);
 if(x){
 }else{
 alert("Email id not in correct format");
 return false;
 } 
 } 

}
</script>
  </head>
  <body>
  <?php
  include_once 'conn.php';
  $query1 = "SELECT * FROM country Order by country_name";
  //$result = $db->query($query1);
  $result=mysqli_query($conn,$query1);
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP Crud</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">AboutUs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ContactForm</a>
              </li>
              
          
            </ul>
            <form class="d-flex" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
     
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto">
            <form  name="myform" onsubmit="return validate()" enctype="multipart/form-data" method="post" >
              <div class="card-header bg-dark">
                <h1 class="text-center text-white">Contact Form</h1>
              </div>
             
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
                
              
            </div>

            <div class="form-group">
                <label for="name">Age</label>
                <input type="number" class="form-control" name="age" required>

              
            </div>
           
            <div class="form-group">
              <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="male" required>
             <label for="male">Male</label><br>
             <input type="radio" id="female" name="gender" value="female" required>
             <label for="female">Female</label><br>
             <input type="radio" id="other" name="gender" value="other" required>
              <label for="other">Other</label>
              </div>
              <div class="form-group">
                <p>Area of interest</p>
                <input type="checkbox" id="vehicle1" name="field[]"  value="HTML" required>
                 <label for="vehicle1"> I have interest in html</label><br>
                  <input type="checkbox" id="vehicle2" name="field[]" value="CSS" >
                  <label for="vehicle2">I have interest in CSS</label><br>
                  <input type="checkbox" id="vehicle3" name="field[]" value="PHP" >
                   <label for="vehicle3"> I have interest in PhP</label>
                    </div>
                    <div class=form-group>
                    <p>Select File:</p>
                 <input type="file" name="file" />
                
                  </div>
                   
                    <div class="form-group">
                    <label for="address">E-mail Address</label>
                <input type="text" class="form-control" name="address" required>
              
                </div>
               
                  <div class="form-group">
          <label for="email">Country</label>
          <select name="country" id="country" class="form-control" onchange="FetchState(this.value)"  required>
          
     
          <option value="<?php echo $row['id']?>">Select Country</option>
          <?php
        
        include_once 'conn.php';
        $query1 = "SELECT * FROM country Order by country_name";
        $result=mysqli_query($conn,$query1);
      
           if ($result->num_rows > 0 ) {
              while ($row = $result->fetch_assoc()) {
                
                echo '<option value='.$row['id'].'>'.$row['country_name'].'</option>';
               }
            }
          ?>
        
          </select>
        </div>
        <div class="form-group">
          <label for="pwd">State</label>
          <select name="state" id="state" class="form-control" onchange="FetchCity(this.value)"  required>
            <option>Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="pwd">City</label>
          <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
        </div>
                   
                <button type="submit" class="btn btn-success">Submit</button>
</div>
</form>
<div class="col-lg-12 text-center">
<h5><a href="display.php"><input type="button" class="btn btn-primary" value="View User"></a></h5>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  function FetchState(id){
    console.log(id);
    $('#state').html('');
    $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { country_id : id},
      success : function(data){
         $('#state').html(data);
      }

    })
  }

  function FetchCity(id){ 
    $('#city').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { state_id : id},
      success : function(data){
         $('#city').html(data);
      }

    })
  }
  </script>



       

     
       

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

  

  

  </body>
</html>