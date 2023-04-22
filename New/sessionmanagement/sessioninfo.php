<?php

session_start();
if(isset($_SESSION['u'])){
    echo "welcome".$_SESSION['u'];
echo "<br>";
echo "your password".$_SESSION['p'];

}
else{
    echo "try again";
}
?>