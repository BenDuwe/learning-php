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
            <legend>Joke / message:</legend>
            <div>
                <label for="joke">Insert joke / message here:</label>
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
    <p>After submiting, your text will be saved in a cookie.
    PHP will insert the saved cookie below after refresching or loading the page in another tab.
     If the cookie is not empty that is.</p>
    <?php
        if($_COOKIE["joke"]!== ""){
        echo "<h2>".$_COOKIE["joke"]."</h2>";
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