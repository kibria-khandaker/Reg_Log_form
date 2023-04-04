<section>
    <hr>
    <br>
        <?php
            // Function to remove the special
            function removeSpecialChar( $str ) {
                // to replace the word
                $res = str_replace( array( '"', ',', '<', '>', '\n', '\t' ), ' ', $str );
                return $res;
            }

            $fileName = "c:\\xampp\\htdocs\\ostad\\PHP_Practice\\projects\\Reg_Log_form\\data\\blogData.txt";

            $fp = fopen( $fileName, "r" );
            while ( $data = fgets( $fp ) ) {
                $blog = explode( ",", $data );

                // printf(<<<EOD
                // <article>
                // <h4> removeSpecialChar( $blog[1] ) </h4>
                // <details>
                //     <summary> See Details </summary>
                //     <p>
                //         removeSpecialChar( $blog[4] )
                //     </p>    
                // </details>
                // </article>
                // EOD);

                // printf( "<p>Blog ID = %s  <br>Post by = %s <br>Email = %s <br>Title = %s <br>Details = %s <br></p>", $blog[0], removeSpecialChar( $blog[1] ), $blog[2], removeSpecialChar( $blog[3] ), removeSpecialChar( $blog[4] ) );

                printf( "<article> <b>%s</b> <details> <summary>Read blog</summary>  <p> Post By:<b>%s</b><br> %s</p> </details> </article><br>", removeSpecialChar( $blog[3] ), removeSpecialChar( $blog[1] ), removeSpecialChar( $blog[4] ) );

            };
            fclose( $fp );
        ?>
    <hr>
</section>