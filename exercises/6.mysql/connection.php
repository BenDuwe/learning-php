<?php
session_start();
function openConnection() {
    
    // Try to figure out what these should be for you
    $dbhost    = "136.144.221.129";
    $dbuser    = "genk";
    $dbpass    = "{)+O^O@iw!].zmjT";
    $db        = "becode_genk";
    // $dbhost    = "localhost";
    // $dbuser    = "becode_DB";
    // $dbpass    = "becodeTesting1!";
    // $db        = "becode_genk";
    
    // Try to understand what happens here 
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db)// create new object using mysqli class
     or die("Connect failed: %s\n". $conn->error); // die exits the function and shows error message

    // Why we do this here
    return $conn; // runs only after checking for connection fail first. And allows us to run closeConnection() after this function has finished. 
   }
   
   

   // And why would we do this here ? Connection should be closed again after the data was added to the database; this function can be run to do just that.
   function closeConnection($conn) {
       $conn->close();
   }

?>