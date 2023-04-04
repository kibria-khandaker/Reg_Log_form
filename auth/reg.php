<?php include '../header.php';?>
<!-- ---------------------------->
<?php

$error = '';
$name = '';
$email = '';
$password = ''; 
$confirm_password = '';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Get the values submitted in the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if all fields are filled out
    if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $confirm_password ) ) {
        echo "<p  class='errorText' >All fields are required.</p>";
    }
    // Check if the email address is valid
    elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        echo "<p class='errorText' >The email address is not valid.</p>";
    }

    // Check if the password and confirm password fields match
    elseif ( $password != $confirm_password ) {
        echo "<p class='errorText' >The Confirm Passwords & Passwords do not match.</p>";
    }

    // If all validation passes, display a success message
    else {
    // Open the CSV file
    $fileName = "c:\\xampp\\htdocs\\ostad\\PHP_Practice\\projects\\Reg_Log_form\\data\\userData.txt";
        
   
    $file_open = fopen( $fileName, "a" );
    $no_rows = count( file( $fileName ) );
    if ( $no_rows > 1 ) {
        $no_rows = ( $no_rows - 1 ) + 1;
    }
    $form_data = array(
        'sr_no'   => $no_rows+1,
        'name'    => $name,
        'email'   => $email,
        'password' => $password,
        'confirm_password' => $confirm_password,
    );
    fputcsv( $file_open, $form_data );

    $error = '<label class="text-success">Thank you for contacting us</label>';
    $name = '';
    $email = '';
    $password = '';
    $confirm_password = '';
   
   
   
   
    // $fp = fopen( $fileName, "w" );
    //     foreach ( $students as $student ) {
    //     fputcsv( $fp, $student );
    //     };
    //     fclose($fp);





        // echo "<p class='submitText' >Thank you ($name) for registering, You register by ($email) </p>";
    }

}
?>

  <section class="reg_box">

    <h1>Register</h1>
    <?php echo $error; ?>
    <form  method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">

      <div class="auth_input_box">

        <label for="name"><b>Full Name</b>
        <input type="text" placeholder="Enter Full Name" name="name" id="name" required>
        </label>

        <label for="email"><b>Email</b>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
        </label>

        <label for="password"><b>Password</b>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
        </label>

        <label for="confirm_password"><b>Repeat Password</b>
        <input type="password" placeholder="Repeat Password" name="confirm_password" id="confirm_password" required>
        </label>

        <button type="submit" class="registerbtn">Submit</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>

    </form>
    <a href="../index.php">Back to Home</a>

  </section>

<!-- ---------------------------->
<?php include '../footer.php';?>