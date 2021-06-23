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
}else{
    echo "no id found";
}
?>