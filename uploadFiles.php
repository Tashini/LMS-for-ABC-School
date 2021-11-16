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
    
    $lessonNo = $_POST['lno'];
    $lessonName = $_POST['lname'];
    $description = $_POST['ldescription'];
    $date = $_POST['ldate'];
    $fileName = basename($_FILES['lfile']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["upload"]) && !empty($_FILES['lfile']['name'])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES['lfile']['tmp_name'], $targetFilePath)){
                // Insert image file name into database
                $insert = "INSERT INTO lessons (lesson_no, name, description, date, file) VALUES ($lessonNo, '$lessonName', 
                    '$description', '$date', '$fileName');";
                $result_insert = mysqli_query($conn,$insert);
                
                if($insert){
                    $statusMsg = "The file ".basename($_FILES['lfile']['name']). " has been uploaded successfully.";
                }
                else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }
            else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
        else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
        }
    }
    else{
        $statusMsg = "Please select a file to upload.";
    }

    // Display status message
    echo $statusMsg;
?>