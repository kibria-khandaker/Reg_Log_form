<section>
    <h3> Our User List </h3>
    <?php
    
      // Function to remove the special
      function removeSpecialChar( $str ) {
        // to replace the word
        $res = str_replace( array( '"', ',', '<', '>', '\n', '\t' ), ' ', $str );
        return $res;
      }

      $fileName = "c:\\xampp\\htdocs\\ostad\\PHP_Practice\\projects\\Reg_Log_form\\data\\userData.txt";

      $fp = fopen( $fileName, "r" );
      while ( $data = fgets( $fp ) ) {
          $users = explode( ",", $data );
          printf( "<p>User ID = %s  <br>Name = %s <br>Email = %s <br>Pass = %s <br></p>", $users[0], removeSpecialChar($users[1]), $users[2],$users[3] );
      };
      fclose( $fp );
    ?>

  </section>