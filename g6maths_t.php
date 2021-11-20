<?php

//database connection
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "abc_school";

	//Create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    $sql = "SELECT * FROM lessons WHERE date = date('Y-m-d')";
    $result = mysqli_query($conn, $sql);

?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Grade 06 Mathematics</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/g6mathsStyle.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 
    <!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
					</ul>
				</div>		
			</div>
		</nav>
	</header>
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Grade 06 Mathematics<span class="m_1"></span></h1>
		</div>
	</div>

    <div class="content_3" style="padding-left: 250px; align-content: center;">
        <div class="lesson" style="width: 1000px; height:auto; padding-bottom: 50px;">
            <div id="write" style="font-size: 20px;">
                <p style="font-size: 40px;"><center><b>Previously Uploaded Lessons</b></center></p>
                <h3><b>Addition</b></h3>
                <p>Addition is one of the four basic operations of arithmetic, the other three being subtraction, multiplication and division. 
                    The addition of two whole numbers results in the total amount or sum of those values combined. </p>
                <a href="uploads/01.place-value-and-names-for-whole-numbers_255cah.pdf" download="Addition Lesson 01" style="color: #00008B;">Lesson 01</a><br>
                <a href="uploads/04.spell-word-names-for-numbers-up-to-one-million_54op9m (1).pdf" download="Addition Lesson 02" style="color: #00008B;">Lesson 02</a><br><br>

                <h3><b>Subtraction</b></h3>
                <p>Subtraction is an arithmetic operation that represents the operation of removing objects from a collection. Subtraction is 
                    signified by the minus sign, −. For example, in the adjacent picture, there are 5 − 2 peaches—meaning 5 peaches with 2 taken
                     away, resulting in a total of 3 peaches.</p>
                <a href="uploads/04.spell-word-names-for-numbers-up-to-one-million_54op9m.pdf" download="Substraction Lesson 01" style="color: #00008B;">Lesson 01</a><br>
                <a href="uploads/05.roman-numerals_ft620.pdf" download="Substraction Lesson 01" style="color: #00008B;">Lesson 02</a><br><br>

            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <h3><b><?php echo $rows['name'];?></b></h3>
            <p><?php echo $rows['description'];?></p>
            <a href="#" download="Substraction Lesson 01" style="color: #00008B;"><?php echo $rows['file'];?></a><br>

            <?php
                }
             ?>
            
                <p><b>Upload New Lessons</b></p>
                <div class="lesson" style="padding-bottom: 30px; padding-left: 230px;">  
                    <form action="uploadFiles.php" method="POST" enctype="multipart/form-data">
                        <input type="text" id="lnumber" placeholder="Lesson Number" name="lno"><br><br>
                        <input type="text" id="lname" placeholder="Lesson Name" name="lname"><br><br>
                        <textarea id="ldescription" cols="44" rows="6" placeholder="Lesson Description" name="ldescription" style="border-radius: 5px;"></textarea><br><br>
                        <input type="date" id="ldate" placeholder="Date" name="ldate"><br><br>
                        Upload Notes:<br><input type="file" id="lfile" name="lfile"><br><br>
                        <input type="submit" class="upload" id="upload" value="Upload" name="upload" style="padding-bottom: 10px; background-color: #4c5a7d; ">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="mailto:#">abcschool@gmail.com</a></li>
                            <li><a href="#">www.abcschool.com</a></li>
                            <li>No.64, ABC Lane, ABC Town</li>
                            <li>+94 1 2345 6789</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
				
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
   
</body>
</html>