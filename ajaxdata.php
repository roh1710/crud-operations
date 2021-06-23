<?php 
include_once 'conn.php';

if (isset($_POST['country_id'])) {
	$query1 = "SELECT * FROM state where c_id=".$_POST['country_id'];
    
	$result=mysqli_query($conn,$query1);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select State</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['state_name'].'</option>';
		 }
	}else{

		echo '<option>No State Found!</option>';
	}

}elseif (isset($_POST['state_id'])) {
	 

	$query1 = "SELECT * FROM city where s_id=".$_POST['state_id'];
	$result=mysqli_query($conn,$query1);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select City</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['city_name'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';
	}

}


?>