<?php

    include "./db.php";
    $game = 1;
    if (isset($_GET['city'])){
    $city = $_GET["city"];
    } else  {
      $city = 1;
    }
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

    $sql = "SELECT * FROM game_$game WHERE `city_id` = $city";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (isset($result[0])){

  
    // echo "<pre>"; print_r($result);
    if (count(json_decode($result[0]['industry'])) > 1 ){
      echo "to many industries";
    } else {

    
    $industry_array = array(
      0 => json_decode($result[0]['industry'])[0],
    );
    $sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'industry'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $indu_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $random_indu = rand(0, count($indu_data) - 1);
    array_push($industry_array, $indu_data[$random_indu]["variable"]);
    $new_industry = json_encode($industry_array);
    $type = $result[0]["type"];
    $name = $result[0]["name"];
    $init_pop = $result[0]["initial_pop"];
    $current_pop = $result[0]["current_pop"];
    $player =  $result[0]["player_id"];
    $sql = "UPDATE game_$game 
    SET 
        type = '$type', 
        name = '$name', 
        industry = '$new_industry', 
        initial_pop = '$init_pop', 
        current_pop = '$current_pop', 
        city_id = $city, 
        player_id = '$player'
    WHERE `city_id` = $city";
    $stmt = $conn->prepare($sql);
    $stmt -> execute();

    $sql = "SELECT `industry` FROM game_$game WHERE `city_id` = $city";
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo "<pre>"; print_r($result);
    echo "<pre>"; print_r(json_decode($result[0]['industry']));
  }
  } else {
    echo "city is not initialized";
  }

?>