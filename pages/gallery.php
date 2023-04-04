<br>
<br>
<div class="blog_head_text" >
            <h2>Our Gallery </h2>
            <a href="./pages/imagesUpload.php">Add Image</a>
        </div>
<div class="gallery_box">


    <?php
// Set the path to the folder containing the images
$folderPath = "./img/";

// Get a list of all the image files in the folder
$imageFiles = glob( $folderPath . "*.{jpg,jpeg,png,gif}", GLOB_BRACE );

// Loop through the list of image files and output them as HTML
foreach ( $imageFiles as $imageFile ) {
    // Get the image file name and type (extension)
    $imageName = basename( $imageFile );
    $imageType = pathinfo( $imageFile, PATHINFO_EXTENSION );

    // Output the image as an HTML <img> tag
    echo '<img src="' . $imageFile . '" alt="' . $imageName . '" />';
}
?>




</div>