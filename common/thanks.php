<?php include '../header.php'; ?>
<!-- ---------------------------->

<section class="thanks_box">

    <br><h3>Thank you For login</h3>

    <p>Hello Mr:/Mrs:  <b><?php echo $_GET['userName']; ?> </b>& your login email <b> <?php echo $_GET['userEmail']; ?></b>  </p>

    <a href="../auth/login.php">Logout</a> 
    <br>
    <br>
    <a href="../index.php">Visit Home page</a>
</section>

<!-- ---------------------------->
<?php include '../footer.php';?>