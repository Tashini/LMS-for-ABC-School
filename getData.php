<?php

//database connection
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    $sql = "SELECT * FROM pdfs";
    $retval = mysqli_query($conn, $sql);

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL = 'uploads/'.$row["file_name"];
    ?>
        <img src="<?php echo $imageURL; ?>" alt="" />
    <?php }
    }else{ ?>
        <p>No image(s) found...</p>
    <?php } ?>
   