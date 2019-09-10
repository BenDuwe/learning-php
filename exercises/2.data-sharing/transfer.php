<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer page</title>
</head>
<body>
    <?php
              
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
    // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
    // Check file size
        if ($_FILES["profile_photo"]["size"] > 500000) {
            $uploadOk = 0;
        }
    // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
    // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
            } else {
            }
        }

    if (!empty($_POST)){
        $username = $_POST["username"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = substr($_POST["email"], 0, strpos($_POST["email"], "@"));
        $birthday = $_POST["birthday"];

        $older = new DateTime($birthday);
        $older->modify('-10 year');
        $older->format('D-m-y');

        $manipulate = explode("-", $birthday);
        $manipulate[0] = $manipulate[0] - 10;
        $older = implode("-", $manipulate);
        echo
        "<img src='uploads/".$_FILES["profile_photo"]["name"]."' alt='profile-pic' height='50px' weight='50px'/>
        <p>Welcome, ".$username."</p>
        <p>Firstname: ".$firstname."</p>
        <p>Lastname: ".$lastname."</p>
        <p>Email-address: ".$email."</p>
        <p>Birthday: ".$birthday."</p>
        <p>Older birthday: ".$older."</p>";
    };    
    ?>
</body>
</html>