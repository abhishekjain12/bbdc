<?php
/**
 * Created by PhpStorm.
 * User: edu-books
 * Date: 2/2/18
 * Time: 4:02 PM
 */


// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail("abhishek.jain@edubooks.com","My subject",$msg)){
    echo ("sent.");
}
else{
    echo ("Error"); 
}

?>