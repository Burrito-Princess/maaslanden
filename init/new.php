<?php
  $sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'city'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>"; print_r($result);
  $typerandom = rand(0, count($result) - 1);
  $type = $result[$typerandom]["variable"];
  $_POST['new_type'] = $type;

  echo $type . "<br>";
  if ($type == "capital"){
    $stmt = $conn->prepare("DELETE FROM game_variables WHERE variable = 'capital' AND game_id = " . intval($_GET['game']));
    $stmt->execute();
  }

  $sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'city_name'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>"; print_r($result);
  $namerandom = rand(0, count($result) - 1);
  $name = $result[$namerandom]["variable"];
  $_POST['new_name'] = $name;
  echo $name . "<br>";


  $sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'industry'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>"; print_r($result);
  $industryrandom = rand(0, count($result) - 1);
  $industry_array = array(
  0 => $result[$industryrandom]["variable"],
  );
  $industry = json_encode($industry_array);
  $_POST['new_industry'] = $industry;
  echo $industry . "<br>";
  switch ($type){
  case "village":
    $initial_pop = rand(1000, 20000);
    break;
  case "town":
    $initial_pop = rand(10000, 50000);
    break;
  case "city":
    $initial_pop = rand(50000, 200000);
    break;
  case "capital":
    $initial_pop = rand(100000, 500000);
  }

  echo $initial_pop . "<br>";
  $_POST['new_initial_pop'] = $initial_pop;
  $current_pop = $initial_pop;
  $_POST['new_current_pop'] = $current_pop;
  $city_id = intval($_GET['city']);
  $_POST['new_city_id'] = $city_id;
  echo $city_id;
  echo "<br>";

  echo "<form action='' method='POST'>";
  // here you chose  which player claims this city
  echo "<select name='player'>";
  echo "<option value='1'>Player 1</option>";
  echo "<option value='2'>Player 2</option>";
  echo "<option value='3'>Player 3</option>";
  echo "<option value='4'>Player 4</option>";
  echo "</select>";
  echo "<hr>";
  // here you choose which tiles surround the city
  for ($i = 0; $i < 6; $i++){?>
  <lable for='indu'> choose an industry for tile <?php echo $i + 1; ?></lable>
  <br>
  <select id='select' name='indu_<?php echo $i;?>'>
  <option value='empty'>Empty</option>
  <option value='fish'>Fish (blue)</option>
  <option value='wood'>Wood (green)</option>
  <option value='grain'>Grain (yellow)</option>
  <option value='iron'>Iron (grey)</option>
  <option value='tourism'>Tourism (pink)</option>
  </select>
  <br>
  <hr><?php
  };
  echo "<input type='submit' value='Submit'>";
  echo "</form>";
  if (isset($_POST['player'])){
  
    $surroundings_array = array(
      0 => $_POST['indu_0'] ?: "empty",
      1 => $_POST['indu_1'] ?: "empty",
      2 => $_POST['indu_2'] ?: "empty",
      3 => $_POST['indu_3'] ?: "empty",
      4 => $_POST['indu_4'] ?: "empty",
      5 => $_POST['indu_5'] ?: "empty",
      );
      $surroundings = json_encode($surroundings_array);
      $_POST['new_surroundings'] = $surroundings;
    
      $player = $_POST['player'];
      $player_id = $player;
      $_POST['new_player_id'] = $player_id;
      
      $sql = "INSERT INTO game_" . intval($_GET['game']) ."(type, name, industry, initial_pop, current_pop, city_id, player_id, surroundings) 
      VALUES ('$type', '$name', '$industry', '$initial_pop', '$current_pop', '$city_id', '$player_id', '$surroundings')";
    
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt = $conn->prepare("DELETE FROM game_variables WHERE variable = '$name' AND game_id = " . intval($_GET['game']));
      $stmt->execute();
    $stmt = $conn->prepare("SELECT * FROM game_" . intval($_GET['game']) . " WHERE city_id = " . intval($_GET['city']));
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }


?>