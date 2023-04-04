<?php include '../header.php';?>
<!-- ---------------------------->
<?php
            // Function to remove the special
            function removeSpecialChar2( $str ) {
                // to replace the word
                $res = str_replace( array( '"', ',', '<', '>', '\n', '\t' ), ' ', $str );
                return $res;
            }

    $error = '';
    $name = '';
    $email = '';
    $blogTitle = ''; 
    $blogTxt = '';

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        // Get the values submitted in the form
        $name = $_POST["name"];
        $email = $_POST["email"];
        $blogTitle = $_POST["blogTitle"];
        $blogTxt = $_POST["blogTxt"];

        // Check if all fields are filled out
        if ( empty( $name ) || empty( $email ) || empty( $blogTitle ) || empty( $blogTxt ) ) {
            echo "<p  class='errorText' >All fields are required.</p>";
        }
        // Check if the email address is valid
        elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            echo "<p class='errorText' >The email address is not valid.</p>";
        }

        // If all validation passes, display a success message
        else {
            // Open the CSV file
            $fileName = "c:\\xampp\\htdocs\\ostad\\PHP_Practice\\projects\\Reg_Log_form\\data\\blogData.txt";
        
            $file_open = fopen( $fileName, "a" );
            $no_rows = count( file( $fileName ) );
            if ( $no_rows > 1 ) {
                $no_rows = ( $no_rows - 1 ) + 1;
            }
            $form_data = array(
                'sr_no'   => $no_rows+1,
                'name'    => removeSpecialChar2($name),
                'email'   => $email,
                'blogTitle' => removeSpecialChar2($blogTitle),
                'blogTxt' => removeSpecialChar2($blogTxt),
            );
            fputcsv( $file_open, $form_data );

            $error = '<label class="text-success">Thank you for contacting us</label>';
            $name = '';
            $email = '';
            $blogTitle = '';
            $blogTxt = '';
        }
    }
?>

  <section class="reg_box">
    <br>
    <h1> New Post Form </h1>
    
    <h4><?php echo $error; ?></h4>
    
    <form  method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">

      <div class="auth_input_box">

        <label for="name"><b>Name</b>
        <input type="text" placeholder="Enter your name" name="name" id="name" required>
        </label>

        <label for="email"><b>Email</b>
        <input type="text" placeholder="Enter your email" name="email" id="email" required>
        </label>

        <label for="blogTitle"><b>Blog Title</b>
        <input type="text" placeholder="Blog title" name="blogTitle" id="blogTitle" required>
        </label>

        <label for="blogTxt"><b>Blog Text</b>
        <textarea name="blogTxt" id="blogTxt" cols="30" rows="3" placeholder="Type blog details" required></textarea>
        </label>

        <button type="submit" class="registerbtn">Submit</button>
    </div>

    <br>
    <br>

    </form>


  </section>

    <div class="blog_head_text" >
        <h2>All Blog </h2>
        <a href="../index.php">Back to Home</a>
    </div>
    <?php include './blogListShow.php';?>

<!-- ---------------------------->
<?php include '../footer.php';?>