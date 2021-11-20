<?php

//database connection
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "Anulavidyalaya@96";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if (isset($_GET['submit'])) {
	
		$UserID = $_GET['userID'];
		$Password = $_GET['password'];
			
		$std_checked = "SELECT * FROM students WHERE ID_no = '$UserID' AND password = '$Password';";
		$std_checked_result = mysqli_query($conn,$std_checked);

		$tea_checked = "SELECT * FROM teachers WHERE ID_no = '$UserID' AND password = '$Password';";
		$tea_checked_result = mysqli_query($conn,$tea_checked);

        $sql_std = "SELECT  ID_no FROM students where '$UserID' like 'std%'";
		$sql_tea = "SELECT  ID_no FROM teachers where '$UserID' like 'tea%'";
		$result_std = mysqli_query($conn,$sql_std);
		$result_tea = mysqli_query($conn,$sql_tea);

		if(mysqli_num_rows($std_checked_result) > 0 || mysqli_num_rows($tea_checked_result) > 0){
			if(mysqli_num_rows($result_std) > 0){
				header("Location: student_dashboard.html");
			}
			elseif (mysqli_num_rows($result_tea) > 0) {
				header("Location: teacher_dashboard.html");
			}
		} 
		else{
			echo "<script>alert('Incorrect user ID, password or you are not a registed user.'); window.location='index.html'</script>";
		}
			
        exit();
    }

?>	