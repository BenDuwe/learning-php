<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Javascript to PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <?php
        $strings = array(
            "Kirito",
            "Erza",
            "Akatsuki",
            "Shiro",
            "Leo",
            "Rundel-Haus-Code",
            "Ken Kaneki",
            "Glenn Radars",
            "Momonga-Sama"
        );

        $pictures = array(
            "https://www.pixelstalk.net/wp-content/uploads/2016/08/HD-PC-Wallpaper-2016.jpg",
            "https://wallpaperaccess.com/full/190815.jpg",
            "https://images7.alphacoders.com/528/528418.jpg",
            "https://wallpaperaccess.com/full/300068.jpg",
            "https://www.hdwallpaper.nu/wp-content/uploads/2016/02/golden-gate_wallpaper_030.jpg"
        );
    ?>
    </head>
<body class="bg-light">
<header id="header" style="background-image: url(<?php echo $pictures[rand(0,count($pictures)-1)] ?>)">
    <div class="overlay"></div>
    <div class="overlay-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Welcome to the Javascript - PHP exercise</h1>
                    <p>Read the code of this page, understand it, then convert it to the same functionality in PHP!</p>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="exercises">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="loop-while" class="my-4 p-4 bg-white shadow-sm border">
                <?php
                    $compare = "begin";
                    $randStrings;
                
                    while ($compare !== []){
                        $randStrings[] = $strings[rand(0,count($strings)-1)];
                        $compare = array_diff($strings, $randStrings);
                    };
                    echo "<h2>Exercise 1: Loops and stuff</h2>\n";
                    echo "<ul>";
                    foreach ($randStrings as $val){ 
                        echo "<li>", $val. "</li>\n";
                        };
                    echo "</ul>";
                ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="username-generator" class="my-4 p-4 bg-white shadow-sm border">
                    <?php
                        createUsername("Ben Duwe Gert Vandormael Caroline Schevers Birthe Lambrechts");
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    function createUsername($name){
    $collection = explode(" ", $name);
    // print_r($collection);
    // echo "</br>";
    foreach ($collection as $val){
        $letters = str_split($val);
        // print_r($letters);
        // echo "</br>";
        for ($l = 0 ; $l < count($letters)/2 ; $l++){
            $x = rand(1, count($letters)-1);
            // echo $x;
            // echo "</br>";
            $letters[$x] = strtoupper($letters[$x]);
            // print_r($letters[$x]);
            // echo "</br>";
            $letters[$x] = addRandomColorSpan($letters[$x]);
        };
        $letters = implode("",$letters);
        $newCollection[] = $letters;
        // print_r($newCollection);
        // echo "</br>";
    
    };

    echo "<p>";
    echo implode(" - ", $newCollection);
    echo "</p>";
    };
    
    function addRandomColorSpan($char){
        $r = rand(0,255);
        $g = rand(0,255);
        $b = rand(0,255);
        return "<span style='color:rgb($r,$g,$b);'>$char</span>";
    };
?>

</body>
</html>