<?php
// connect to the database
    $host = "localhost";
	$dbUsername = "root";
	$dbPassword = "Anulavidyalaya@96";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    
    // Uploads files
    $targetDir = "uploads/";
    
    // $lessonNo = $_POST['lno'];
    // $lessonName = $_POST['lname'];
    // $description = $_POST['ldescription'];
    // $date = $_POST['ldate'];
    $fileName = $_FILES['lfile']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["upload"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES['lfile']['tmp_name'], $targetFilePath)){
                // Insert image file name into database
                $insert  = "INSERT INTO lessons (lesson_no, file) VALUES (01,'$fileName');";
                $result_insert = mysqli_query($conn,$insert);
                //echo("Error description: " . mysqli_error($conn));
                //echo("Error description: " . mysqli_errno($result_insert));
                
                if($result_insert){
                    echo "<script>alert('The file ".$fileName. " has been uploaded successfully.'); window.location='g6maths_t.html'</script>";
                }
                else{
                    echo "<script>alert('File upload failed, please try again.'); window.location='g6maths_t.html'</script>"; 
                } 
            }
            else{
                echo "<script>alert('Sorry, there was an error uploading your file.'); window.location='g6maths_t.html'</script>";
            }
        }
        else{
            echo "<script>alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'); window.location='g6maths_t.html'</script>";
        }
    }
    else{
        echo "<script>alert('Please select a file to upload.'); window.location='g6maths_t.html'</script>";
    }

    exit();
?>