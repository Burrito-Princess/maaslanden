<?php
    $game_id = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maaslanden - dev-ross.com</title>
    <link rel="stylesheet" href="./assets/css/index.css" />
    <style>
        <?php
        include './assets/css/index.css';
        include './db.php';
        ?></>
    </style>
</head>

<body>
    <div id="flex-container">
        <!-- explaination -->
        <div class="main" id="explaination">
            <h2>Maaslanden</h2>
            <div id="explaination-text-background">
                <p>
                    This game is all about building a trade empire and collecting
                    resources. The table to the right shows the state of game <?php echo $game_id?>. When more cities are 'initialized' the table will expand.
                </p>
            </div>
            <div id="slide-show">
                <button class="slide-button" onclick="plusDivs(-1)">
                    &#10094;
                </button>
                <div id="slides">
                    <div class="slide">
                        <h3>Type</h3> <br>The type of a city decides from which range a population can be chosen. A capital has a higher range than a village and can only be chosen once.
                    </div>
                    <div class="slide">
                        <h3>Population</h3> <br> <br>The population depends on what type, a captial has a higher range of randomly generated population than a village has.
                    </div>
                    <div class="slide">
                        <h3>Industry</h3> <br> <br>The Industry is chosen from an array, this is completely random. You are also able to upgrade your city with a second industry.
                    </div>
                    <div class="slide">
                        <h3>Surroundings</h3> <br> <br>Upon initialization you can choose which tiles surround a city. This can also be changed later as the board expands.
                    </div>
                    <div class="slide">
                        <h3>Player</h3> <br> <br>Upon initialization you can choose who the city belongs to. This can be changed if done incorrectly.
                    </div>
                </div>
                <button class="slide-button" onclick="plusDivs(1)">
                    &#10095;
                </button>
            </div>




        </div>
        <!-- logo -->
        <div class="main" id="logo">
            <img src="./assets/img/logo_2.svg" id="logo-img" />
        </div>
        <!-- table -->


        <div class="main" id="table-section">
            
            <?php
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully<br>";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $sql = "SELECT * FROM game_$game_id limit 4";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table id="table">
                <tr>
                    <td><p>Name</p> </td>
                    <?php
                    foreach ($result as $city) {
                        echo "<td><p>" . $city["name"] . "</p></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td><p>Type </p></td>
                    <?php
                    foreach ($result as $city) {
                        echo "<td><p>" . $city["type"] . "</p></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td><p> Population </p></td>
                    <?php
                    foreach ($result as $city) {
                        echo "<td><p>" . $city["current_pop"] . "</p></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td><p> Industry </p></td>
                    <?php
                    foreach ($result as $city){
                        $indu_decoded = json_decode($city["industry"]);
                        echo "<td><p>";
                        foreach ($indu_decoded as $indu){ 
                            echo $indu . "<br>";
                        };
                        echo "</p></td>";
                    }
                    
                    ?>
                </tr>
                <tr>
                    <td>
                        <p>
                            Player
                        </p>
                    </td>
                    <?php
                    foreach ($result as $city) {
                        echo "<td><p>" . $city["player_id"] . "</p></td>";
                    }
                    ?>
                </tr>
            </table>
            <?php
                $table_width = 100 / (count($result) + 1) . "%";
            ?>
            <style>
                #table td{
                    width: <?php echo $table_width; ?>
                }    
            </style>
        </div>
    </div>
</body>
<script src="./assets/script.js"></script>

</html>