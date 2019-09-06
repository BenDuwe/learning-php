<?php
include 'connection.php';

$conn = openConnection();

$data = "UPDATE hopper_2 SET preferred_language='en' WHERE id=1";
if($conn->query($data) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Was not able to execute $data. " . $conn->error;
}

closeConnection($conn);
?>