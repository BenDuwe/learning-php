<?php
include_once 'connection.php';



/* ****************************************FORM VALIDATION ********************************************** */
/* ****************************************************************************************************** */

function validate($str) {
    $str = str_split($str);
    foreach($str as &$letter){
        if (!preg_match('/^[a-zA-Z0-9\/:.=+?\-@\" \“\”]$/', $letter)){
            $letter = urlencode($letter);
        }
    }
    $str = implode("", $str);
    return trim(htmlspecialchars($str));
}
if(isset($_POST["submit"])){
    if (file_exists('connection.php')){

        $fname = urldecode(validate($_POST['firstname']));
        if (!preg_match('/^[a-zA-Z0-9\séèàç]+$/', $fname)) {
            $fnameError = 'Name can only contain letters and white spaces';
            $error = true;
        }
        $lname = urldecode(validate($_POST['lastname']));
        if (!preg_match('/^[a-zA-Z0-9\séèàç]+$/', $lname)) {
            $lnameError = 'Name can only contain letters and white spaces';
            $error = true;
        }

        $emailv = validate($_POST['email']);
        if (!filter_var($emailv, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Invalid Email';
            $error = true;
        }

        $uname = urldecode(validate($_POST['username']));
        if (!preg_match('/^[a-zA-Z0-9\séèàç]+$/', $uname)) {
            $unameError = 'Name can only contain letters, numbers and white spaces';
            $error = true;
        }

        $pass = validate($_POST['password']);
        if (strlen($pass) < 6) {
            $passError = 'Please enter a longer password, atleast 6 characters';
            $error = true;
        }

        $confpass = validate($_POST['confirmPassword']);
        if ($confpass !== $pass) {
            $confPassError = 'Passwords don\'t match';
            $error = true;
        }

        $linked = validate($_POST['linkedin']);
        if (!filter_var($linked, FILTER_VALIDATE_URL)) {
            $linkedError = 'Invalid URL';
            $error = true;
        }
        
        $git = validate($_POST['github']);
        if (!filter_var($git, FILTER_VALIDATE_URL)) {
            $gitError = 'Invalid URL';
            $error = true;
        }

        $pic = validate($_POST['avatar']);
        if (!filter_var($pic, FILTER_VALIDATE_URL)) {
            $picError = 'Invalid URL';
            $error = true;
        }

        
        $vid = validate($_POST['video']);
        if (!filter_var($vid, FILTER_VALIDATE_URL)) {
            $vidError = 'Invalid URL';
            $error = true;
        }
        
        $favQuote = validate($_POST['quote']);

        $quoteAuth = validate($_POST['author']);
/* ****************************************************************************************************** */
/* ****************************************************************************************************** */
        if(isset($error)){
            return;
        } else {
/* *************************************** SENDING DATA TO DATABASE ************************************* */
/* ****************************************************************************************************** */
        $status = "yay, connection might be possible!";
        $conn = openConnection();

        // Escape user inputs for security
        $first_name = $conn->real_escape_string($_REQUEST['firstname']);
        $last_name = $conn->real_escape_string($_REQUEST['lastname']);
        $username = $conn->real_escape_string($_REQUEST['username']);
        $pass = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $linkedin = $conn->real_escape_string($_REQUEST['linkedin']);
        $github = $conn->real_escape_string($_REQUEST['github']);
        $email = $conn->real_escape_string($_REQUEST['email']);
        $language = $conn->real_escape_string($_REQUEST['language']);
        $avatar = $conn->real_escape_string($_REQUEST['avatar']);
        $video = $conn->real_escape_string($_REQUEST['video']);
        $quote = $conn->real_escape_string($_REQUEST['quote']);
        $author = $conn->real_escape_string($_REQUEST['author']);

        
        $data = "INSERT INTO hopper_2 (first_name, last_name, username, password, linkedin, github, email, preferred_language, avatar, video, quote, quote_author) VALUES ('$first_name', '$last_name', '$username', '$pass', '$linkedin', '$github', '$email', '$language', '$avatar', '$video', '$quote', '$author')";
        if (mysqli_query($conn, $data)) {
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } else{
            echo "ERROR: Was not able to execute $data. " . $conn->error;
        }

/* ****************************************************************************************************** */
/* ****************************************************************************************************** */

        // $data .= mysqli_query($conn, "SELECT * FROM hopper_2 WHERE id=LAST_INSERT_ID()");
        // var_dump($data);
        // $row = mysqli_fetch_row($data);
        // var_dump($row);

        closeConnection($conn);
        header("Location: profile.php?user=$last_id");
        }
    } else {
            $status = "couldn't contact database..";
        };
        
}


?>