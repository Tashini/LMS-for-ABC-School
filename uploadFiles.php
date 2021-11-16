<?php
// connect to the database
    $host = "localhost";
	$dbUsername = "root";
	$dbPassword = "Anulavidyalaya@96";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Uploads files
        if (isset($_POST['upload'])) { // if save button on the form is clicked
            // name of the uploaded file
            $LessonNo = $_FILES['lno']['lesson_no'];
            $filename = $_FILES['lname']['name'];
            $Description = $_FILES['ldescription']['description'];
            $Date = $_FILES['ldate']['date'];

            // destination of the file on the server
            $destination = 'uploads/' . $filename;

            // get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            // the physical file on a temporary uploads directory on the server
            $file = $_FILES["lfile"]['tmp_name'];

            if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                echo "You file extension must be .zip, .pdf or .docx";
            // // } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            // //     echo "File too large!";
            } 
            else {
                // move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($file, $destination)) {
                    $sql = "INSERT INTO lessons (lesson_no,name, description, date, downloads) VALUES ($LessonNo,'$filename', '$Description', $Date, 0)";
                    if (mysqli_query($conn, $sql)) {
                        echo "File uploaded successfully";
                    }
                } else {
                    echo "Failed to upload file.";
                }
            }    
    }
}

?>