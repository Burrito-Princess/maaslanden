<?php
include './db.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade - Maaslanden</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM game_1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < 8; $i++){
       if (isset($result[$i])){
        $city[$result[$i]["city_id"]] = $result[$i]["name"];
    } else {
    } 
    }
    // echo "<pre>"; print_r($city);
    

    ?>
    <form method="post" action="">
        <select name="tier">
            <option value="tier_1">Tier 1 Upgrade</option>
            <option value="tier_2">Tier 2 Upgrade</option>
            <option value="tier_3">Tier 3 Upgrade</option>
        </select>
        <select name="city">
            <?php
            for ($j = 1; $j < 9; $j++){
                if (isset($city[$j])){
                    
            ?>
            <option value="<?php echo $city[$j]; ?>"><?php echo $city[$j]; ?></option>
            <?php
            }else {
                echo "failure<br>";
            }}
            ?>
        </select>
        <input type="submit" value="Go!"></input>
    </form>
    <?php
        

        if (isset($_POST['tier'])){
            $sql = "SELECT * FROM game_1 WHERE name='" . $_POST['city'] . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_final = $stmt->fetch(PDO::FETCH_ASSOC);
            switch ($_POST['tier']){
                case "tier_1":
                    $new_pop = $result_final["current_pop"] * 1.1;
                    $new_pop = floor($new_pop);
                    echo $new_pop;
                    $sql = "UPDATE game_1 SET 
                    type='" . $result_final["type"] . "',
                    name='" . $result_final["name"] . "',
                    industry='" . $result_final["industry"] . "',
                    initial_pop=" . $result_final["initial_pop"] . ",
                    current_pop=" . $new_pop . ",
                    city_id=" . $result_final["city_id"] . ",
                    player_id='" . $result_final["player_id"] . "'
                    WHERE city_id=" . $result_final["city_id"];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    break;
                case "tier_3":
                    $new_pop = $result_final["current_pop"] * 1.25;
                    $new_pop = floor($new_pop);
                    if (count(json_decode($result_final["industry"])) < 2){
                    // echo "<pre>"; print_r (json_decode($result_final["industry"]));
                    $available_industry = array(
                        "fishing",
                        "nuclear",
                        "farming",
                        "tourism",
                        "forest",
                        "mining"
                    );
                    
                    // rand(0, count($available_industry) - 1);
                    for ($k = 0; $k < count(json_decode($result_final["industry"])); $k++){
                        if (($key = array_search(json_decode($result_final["industry"])[$k], $available_industry)) !== false) {
                            unset($available_industry[$key]);
                        }
                        // echo "<pre>"; print_r ($available_industry);
                    }

                    $random_nr = rand(0, count($available_industry));
                    $new_indu = json_decode($result_final["industry"]);
                    array_push($new_indu, $available_industry[$random_nr]);
                    $new_indu = json_encode($new_indu);
                    $sql = "UPDATE game_1 SET 
                    type='" . $result_final["type"] . "',
                    name='" . $result_final["name"] . "',
                    industry='" . $new_indu . "',
                    initial_pop=" . $result_final["initial_pop"] . ",
                    current_pop=" . $new_pop . ",
                    city_id=" . $result_final["city_id"] . ",
                    player_id='" . $result_final["player_id"] . "'
                    WHERE city_id=" . $result_final["city_id"];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    echo $_POST['city'] . " has been upgraded to " . $_POST['tier'] . "!";
                } else {
                    echo $_POST['city'] . " already has 2 industries <br>";
                    $sql = "UPDATE game_1 SET 
                    type='" . $result_final["type"] . "',
                    name='" . $result_final["name"] . "',
                    industry='" . $result_final["industry"] . "',
                    initial_pop=" . $result_final["initial_pop"] . ",
                    current_pop=" . $new_pop . ",
                    city_id=" . $result_final["city_id"] . ",
                    player_id='" . $result_final["player_id"] . "'
                    WHERE city_id=" . $result_final["city_id"];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    echo $_POST['city'] . " has been upgraded to " . $_POST['tier'] . "!";
                }
                    break;
                case "tier_2":
                    $new_pop = $result_final["current_pop"] * 1.2;
                    $new_pop = floor($new_pop);
                    echo $new_pop;
                    $sql = "UPDATE game_1 SET 
                    type='" . $result_final["type"] . "',
                    name='" . $result_final["name"] . "',
                    industry='" . $result_final["industry"] . "',
                    initial_pop=" . $result_final["initial_pop"] . ",
                    current_pop=" . $new_pop . ",
                    city_id=" . $result_final["city_id"] . ",
                    player_id='" . $result_final["player_id"] . "'
                    WHERE city_id=" . $result_final["city_id"];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    break;
            }
        }
    ?>
</body>
</html>