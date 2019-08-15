<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3</title>
</head>
<body>
    <form id="register" action="" onsubmit="captureData()" method="POST">
        <fieldset id="registerField" class="field">
            <legend>Registration</legend>
            <div>
                <label for="joke">Insert joke/message here:</label>
            </div>
            <div>
                <textarea id="joke" name="joke" cols="40" rows="5"></textarea>
            </div>
            </div>
            <div class="submitbtn">
                <button name="submit" id="submit" type="submit" value ="Submit information">Submit</button>
            </div>
        </fieldset>
    </form>
    <p>PHP will insert the saved cookie below if the cookie is not empty.</p>
    <?php
        if($_COOKIE["joke"]!== ""){
        echo "<p>".$_COOKIE["joke"]."</p>";
        } else {
            echo "";
        };
    ?>

<script>
    function captureData(){
        document.cookie = "joke="+document.getElementById("joke").value;
        event.preventDefault();
    };
</script>
</body>
</html>