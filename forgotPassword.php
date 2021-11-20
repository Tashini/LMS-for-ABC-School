<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "Anulavidyalaya@96";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if (isset($_POST['save'])) {
        $Username = $_POST['userID'];
		$newPassword = $_POST['newPassword'];
		$confirmPassword = $_POST['confirmPassword'];

		$std = "SELECT * FROM students WHERE ID_no = '$Username';";
		$std_result = mysqli_query($conn,$std);
		$tea = "SELECT * FROM teachers WHERE ID_no = '$Username';";
		$tea_result = mysqli_query($conn,$tea);

		$std_check = "SELECT  ID_no FROM students where '$Username' like 'std%'";
		$tea_check = "SELECT  ID_no FROM teachers where '$Username' like 'tea%'";
		$result_std_check = mysqli_query($conn,$std_check);
		$result_tea_check = mysqli_query($conn,$tea_check);

		if(mysqli_num_rows($std_result) > 0 || mysqli_num_rows($tea_result) > 0){
			if ($newPassword === $confirmPassword) {
                if(mysqli_num_rows($result_std_check) > 0){
                    $std_update = "UPDATE students SET password = '$newPassword' WHERE ID_no = '$Username';";
                    $result_std_update = mysqli_query($conn,$std_update);

                    echo "<script>alert('Password updated Sucessfully. Please login to your account.'); window.location='index.html'</script>";
                }
                elseif(mysqli_num_rows($result_tea_check) > 0){
                    $tea_update = "UPDATE teachers SET password = '$newPassword' WHERE ID_no = '$Username';";
                    $result_tea_update = mysqli_query($conn,$tea_update);

                    echo "<script>alert('Password updated Sucessfully. Please login to your account.'); window.location='index.html'</script>"; 
                }
			}
            else {
                echo "<script>
						alert('New password and the re-enter password should same!');
					</script>";
            }
		}
        
        else{
            echo "<script>
                    alert('Incorrect user ID or you are not a registed user.');
                </script>";
        }
	}

    echo $statusMsg;
    exit();

?>    