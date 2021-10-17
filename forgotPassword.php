<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    $Username = $_GET['username'];

    if (isset($_POST['save'])) {
		$newPassword = $_POST['newPassword'];
		$confirmPassword = $_POST['confirmPassword'];

		$std = "SELECT * FROM student WHERE ID_no = '$Username';";
		$std_result = mysqli_query($conn,$std);
		$tea = "SELECT * FROM teacher WHERE ID_no = '$Username';";
		$tea_result = mysqli_query($conn,$tea);

		$std_check = "SELECT  ID_no FROM student where '$Username' like 'std%'";
		$tea_check = "SELECT  ID_no FROM teacher where '$Username' like 'tea%'";
		$result_std_check = mysqli_query($conn,$std_check);
		$result_tea_check = mysqli_query($conn,$tea_check);

		if(mysqli_num_rows($std_result) > 0 || mysqli_num_rows($tea_result) > 0){
			if ($newPassword === $confirmPassword) {
                if(mysqli_num_rows($result_std_check) > 0){
                    $std_update = "UPDATE student SET password = '$newPassword' WHERE name = '$Username';";
                    $result_std_update = mysqli_query($conn,$std_update);
    
                    echo "<script>
                            alert('You have successfully changed the password. Please login to your account.');
                        </script>";

                }
                elseif(mysqli_num_rows($result_tea_check) > 0){
                    $tea_update = "UPDATE teacher SET password = '$newPassword' WHERE name = '$Username';";
                    $result_tea_update = mysqli_query($conn,$tea_update);
    
                    echo "<script>
                            alert('You have successfully changed the password. Please login to your account.');
                        </script>";
                    
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
                    alert('You are not a registed user.Please contact the administrator');
                </script>";
        }

        //header("Location: index.html");    

		exit();
	}

?>    