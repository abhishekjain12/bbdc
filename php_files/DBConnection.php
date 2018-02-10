<?php
/**
 * Created by PhpStorm.
 * User: Abhishek Jain
 * Date: 26/1/18
 * Time: 4:21 PM
 */

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'Yard@2014';
    $dbname = 'bbdc';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$conn ) {
        die('<script>
                var $toastContent = $("<span>Could not connect '. mysqli_connect_error() .'</span>").add($("<a href=\'/\' class=\'btn-flat toast-action\'>RELOAD</a>"));
                Materialize.toast($toastContent, 10000);
            </script>
            </body></html>');
    }

?>
