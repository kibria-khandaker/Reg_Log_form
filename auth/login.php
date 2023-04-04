<?php include '../header.php';?>
<!-- ---------------------------->
<?php
  $error = '';
  $email = '';
  $password = '';
  function function_alert( $msg ) {
      echo "<script type='text/javascript'>alert('$msg');</script>";
  }

?>

  <section class="login_box" >

    <h2>Login Form</h2>
    <i> Check bellow have some user example </i>
    <br><br><br><br>
    <?php echo $error; ?>

    <form method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">
      <div class="auth_input_box">
        <label for="email"><b>UserEmail</b>
          <input type="text" placeholder="Enter email" name="email" required>
        </label>
        <label for="password"><b>Password</b>
          <input type="password" placeholder="Enter Password" name="password" required>
        </label><br>
        <button type="submit">Submit</button>
      </div>
    </form>

<?php
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
//---
    // Retrieve data from form submission
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if all fields are filled in
    if ( empty( $email ) || empty( $password ) ) {
        echo "Both email and password are required.";
        exit();
    }

    // Open the CSV file
    $userFile = "c:\\xampp\\htdocs\\ostad\\PHP_Practice\\projects\\Reg_Log_form\\data\\userData.txt";
    $file = fopen( $userFile, 'r' );

    // Check if the data already exists in the CSV file
    $matched = false;
    while (  ( $data = fgetcsv( $file ) ) !== false ) {
        if ( $data[2] == $email && $data[3] == $password ) {
            $userName = $data[1];
            $userEmail = $data[2];
            $matched = true;
            break;
        }
    }
    // Close the file
    fclose( $file );

    if ( $matched ) {
        // Redirect to thanks.php with name
        header( "Location: ../common/thanks.php?userName=" . urlencode( $userName ) . "&userEmail=" . urlencode( $userEmail ) );
        exit;
    } else {
        // Invalid js alert SMS call from top line function
        // function_alert( " Invalid email or password. Please try again. " );
        $error = '<label class="text-success">Invalid email or password</label>';
        printf($error);
    }

//---
}
?>

    <br><div class="container register">
          <p>Already haven't an account? <a href="reg.php">Register</a>.</p>
        </div>
    <br><a href="../index.php">Back to Home</a>

  </section>


<?php include '../auth/userListShow.php';?>
<!-- ---------------------------->
<?php include '../footer.php';?>
