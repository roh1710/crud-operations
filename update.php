<?php
include 'conn.php';

if(count($_POST)!=0)
{
   
    $gen=$_POST["gender"];
    $check1=implode(',',$_POST['field']);
    extract($_POST);
    extract($_GET);
    $rem=$_POST['yourcountry'];
    $old_file=$_POST['old_file'];
    $image=$_FILES['file'];
    $filename=$image['name'];
    $filepath=$image['tmp_name'];
    $fileerror=$image['error'];
    if($filepath != ''){
        if($fileerror==0){
            $path=''.$filename;
            move_uploaded_file($filepath,$path);
            $query="UPDATE  mumbai SET yourname='$name',yourage='$age',yourgender='$gen',yourarea='$check1',yourfile='$path',youraddress='$address',yourcountry='$country',yourstate='$state',yourcity='$city' WHERE ID='$id'"; 
           
        
            $result=mysqli_query($conn,$query);
        }  
    }
    else{
        $query="UPDATE  mumbai SET yourname='$name',yourage='$age',yourgender='$gen',yourarea='$check1',yourfile='$old_file',youraddress='$address',yourcountry='$country',yourstate='$state',yourcity='$city' WHERE ID='$id'"; ;
        $result=mysqli_query($conn,$query);
    }
        if($result){
            echo 'Image Updated';
            header('location:display.php');
        }
        else{
            echo 'Image Not Updated';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>crud</title>
  </head>
  <body>
<?php
  include 'conn.php';
  extract($_GET);
  $query="SELECT * FROM mumbai WHERE ID='$id'";
  $result=mysqli_query($conn,$query);
  while($res=mysqli_fetch_array($result))

  {

 ?>
 <?php
   $a=$res["yourarea"];
   $b=explode(",",$a);
  
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
            <form method="post" enctype="multipart/form-data" >
              <div class="card-header bg-dark">
                <h1 class="text-center text-white">Update Contact Form</h1>
              </div>
             
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $res['yourname'];?>" >
              
            </div>

            <div class="form-group">
                <label for="name">Age</label>
                <input type="number" class="form-control" name="age" value="<?php echo $res['yourage'];?>">

              
            </div>
           
            <div class="form-group">
              <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="male"
            <?php 
            if($res["yourgender"]=='male'){
                echo "checked";

            }
            ?>
            >
             <label for="male">Male</label><br>
             <input type="radio" id="female" name="gender" value="female"
             <?php 
            if($res["yourgender"]=='female'){
                echo "checked";

            }
            ?>>
             <label for="female">Female</label><br>
             <input type="radio" id="other" name="gender" value="other"
             <?php 
            if($res["yourgender"]=='other'){
                echo "checked";

            }
            ?>>
              <label for="other">Other</label>
              </div>
              <div class="form-group">
                <p>Area of interest</p>
                <input type="checkbox" id="vehicle1" name="field[]" value="HTML"
                <?php 
                if(in_array("HTML",$b)){
                 echo "checked";
                }
                ?>
                >
                 <label for="vehicle1"> I have interest in html</label><br>
                  <input type="checkbox" id="vehicle2" name="field[]" value="CSS"
                  <?php 
                if(in_array("CSS",$b)){
                 echo "checked";
                }
                ?>
                  >
                  <label for="vehicle2">I have interest in CSS</label><br>
                  <input type="checkbox" id="vehicle3" name="field[]" value="PHP"
                  <?php 
                if(in_array("PHP",$b)){
                 echo "checked";
                }
                ?>
                  >
                   <label for="vehicle3"> I have interest in PhP</label>
                    </div>
                    <div class=form-group>
                    <p>Select File:</p>
                 <input type="file" name="file"  />
                 <input type="hidden" name="old_file" value="<?php echo $res['yourfile'];?>">
                
                  </div>
                   
                    <div class="form-group">
                    <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $res['youraddress'];?>" >
                </div>
                <div class="form-group">
          <label for="email">Country</label>
          <select name="country" id="country" class="form-control" onchange="FetchState(this.value)"  >
           </select>
        </div>
       
        <div class="form-group">
          <label for="pwd">State</label>
          <select name="state" id="state" class="form-control" onchange="FetchCity(this.value)"  >
            <option>Select State</option>
             echo '<option value='.$row['id'].'>'.$row['country_name'].'</option>';
          </select>
        </div>

        <div class="form-group">
          <label for="pwd">City</label>
          <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
        </div>
       <?php } ?>
                <button type="submit" class="btn btn-success">Submit</button>
</div>

</form>
</div>
</div>
</div> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
  function FetchState(id){
      console.log(id);
    $('#state').html('');
    $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'ajax.php',
      data : { country_id : id},
      success : function(data){
         if(data){
            $('#state').html(data);
         }
         else{
             alert ("no data found");
         }
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
