<?php include '../header.php';?>
<!-- ---------------------------->
<section class="image_upload_section">

    <h1> Add Your New image </h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <p>Try to upload square image (1:1) & size max 50 KB</p>
        <input type="submit" name="submit" value="Upload">
    </form>

</section>

<br><br>
<div class="blog_head_text" >
        <a href="../auth/reg.php"> Open Account </a>
        <a href="../auth/login.php"> Login </a>
        <a href="../index.php">Back to Home</a>
</div>
<br><br>
<!-- <?php // include './gallery.php';?> -->


<!-- ---------------------------->
<?php include '../footer.php';?>

<!-- -----------------------  -->
<!-- -----------------------  -->

<?php
    if(isset($_POST['submit'])){
        // Get file information
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        
        // Define the target directory to store the file
        $targetDir = "../img/";
        $targetFile = $targetDir . basename($fileName);
        
        // Check if the file already exists in the target directory
        if(empty($targetFile)){
            echo "<h3>Sorry, Empty file box.</h3>";
            exit();
        }

        // Check if the file already exists in the target directory
        if(file_exists($targetFile)){
            echo "<h3>Sorry, file already exists.</h3>";
            exit();
        }
        
        // Check if the file size is less than or equal to 2MB (2,000,000 bytes)
        if($fileSize > 51200){
            echo "<h3>Sorry, your file is too large.</h3>";
            exit();
        }
        
        // Check if the file is an image file (allowed types: jpg, jpeg, png, gif)
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if(!in_array($fileExtension, $allowedTypes)){
            echo "<h3>Sorry, only JPG, JPEG, PNG, and GIF files are allowed.</h3>";
            exit();
        }
        
        // Check if there were any errors during the file upload
        if($fileError !== 0){
            echo "<h3>Sorry, there was an error uploading your file.</h3>";
            exit();
        }
        
        // Move the uploaded file to the target directory
        if(move_uploaded_file($fileTmpName, $targetFile)){
            echo "The file ". basename($fileName). " has been uploaded.";
        } else {
            echo "<h3>Sorry, there was an error uploading your file.</h3>";
        }
    }
?>


