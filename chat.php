<?php
require_once"./header.html";
if( isset($_POST['firstname'] ) && isset( $_POST['lastname'] ) )
{
    $txt= "<p>".$_POST['firstname'].':<br>'.$_POST['lastname'] . "</p>". PHP_EOL; 
    file_put_contents("./uploads/".time().".html", $txt, FILE_APPEND);
    echo "text send successfully";
}
?>